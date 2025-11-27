<?php include '../includes/head.php'; ?>
<?php include '../includes/providerpage.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

.topbarwithbtn {
    display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;
}
.topbarwithbtn h3 { margin: 0; font-size: 22px; font-weight: 600; }
.topbarwithbtn .btn-primary {
    background: #ff6b2f; border-color: #ff6b2f; color: #fff;
    padding: 10px 18px; border-radius: 8px; font-weight: 600;
}

/* GRID CARDS */
.pastwork-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
}
.pastwork-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    border: 1px solid #eee; box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.pastwork-card img { width: 100%; height: 220px; object-fit: cover; margin-bottom: 5px; }
.pastwork-card-content { padding: 15px; }
.pastwork-title { font-size: 18px; font-weight: 600; }
.pastwork-desc { font-size: 14px; color: #666; margin: 5px 0; }

.card-actions { display: flex; justify-content: flex-end; gap: 15px; padding: 12px 15px; }
.card-actions i { cursor: pointer; font-size: 18px; }

/* POPUP FORM */
#popupOverlay {
    position: fixed; inset: 0; background: rgba(0,0,0,0.45);
    display: none; justify-content: center; align-items: center; z-index: 999;
}
#popupForm {
    width: 550px; background: #fff; padding: 25px; border-radius: 12px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.16);
    max-height: 90vh; overflow-y: auto;
}
.popup-title { font-size: 20px; font-weight: 600; margin-bottom: 15px; }

.input-group { margin-bottom: 15px; }
.input-group label { font-weight: 600; margin-bottom: 5px; display: block; }
.input-group input, .input-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; }

.submit-btn {
    background: #ff6b2f; color: white; padding: 12px; width: 100%;
    border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer;
}
.close-btn {
    background: #bbb; color: #333; padding: 10px; width: 100%;
    border: none; border-radius: 8px; margin-top: 10px; cursor: pointer;
}

/* MULTI IMAGE BOXES */
.image-group { display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap; }
.image-box {
    width: 48%; text-align: center; border: 1px dashed #ccc; padding: 10px;
    border-radius: 8px; position: relative; min-height: 110px;
}
.image-box img { width: 100%; height: 100px; object-fit: cover; border-radius: 5px; margin-bottom: 5px; }
.image-box input { display: none; }
.image-box label {
    cursor: pointer; display: block; color: #666; font-size: 14px;
}
.remove-image {
    position: absolute; top: 5px; right: 5px; background: #ff6b2f; color: #fff;
    border-radius: 50%; width: 20px; height: 20px; font-size: 12px; line-height: 20px;
    text-align: center; cursor: pointer; display: none;
}
.add-more {
    display: flex; justify-content: center; align-items: center;
    border: 1px dashed #ccc; border-radius: 8px; cursor: pointer;
    width: 48%; height: 100px; font-size: 24px; color: #666;
}
</style>

<div id="pagebox">
    <div class="topbarwithbtn">
        <h3>My Past Work</h3>
        <button class="btn btn-primary" id="createjob">Add Past Work</button>
    </div>

    <div class="pastwork-grid" id="pastWorkGrid"></div>

    <!-- POPUP FORM -->
    <div id="popupOverlay">
        <div id="popupForm">
            <div class="popup-title" id="formTitle">Create Past Work</div>

            <div class="input-group">
                <label>Work Name</label>
                <input type="text" id="pwName">
            </div>

            <div class="input-group">
                <label>Description</label>
                <textarea id="pwDesc" rows="3"></textarea>
            </div>

            <div>
                <label>Before Images (at least 1 required)</label>
                <div class="image-group" id="beforeImagesContainer">
                    <div class="add-more" id="addBefore">+</div>
                </div>
            </div>

            <div>
                <label>After Images (at least 1 required)</label>
                <div class="image-group" id="afterImagesContainer">
                    <div class="add-more" id="addAfter">+</div>
                </div>
            </div>

            <button class="submit-btn" onclick="saveWork()">Save</button>
            <button class="close-btn" onclick="closeForm()">Cancel</button>
        </div>
    </div>
</div>

<script>
let pastWorkData = [
    {id:1, title:'Past Work 1', description:'Description 1', beforeImages:['cleaning_service_image.webp'], afterImages:['cleaning_service_image.webp','cleaning_service_image.webp']},
];
let editingId = null;

// Helpers
function createImageInput(containerId){
    const container = document.getElementById(containerId);
    const wrapper = document.createElement('div');
    wrapper.className = 'image-box';

    const input = document.createElement('input');
    input.type='file'; input.accept='image/*';

    const img = document.createElement('img');
    img.style.display='none';

    const remove = document.createElement('div');
    remove.className='remove-image';
    remove.innerHTML='&times;';
    remove.onclick = ()=>{ wrapper.remove(); };

    input.onchange = e=>{
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(ev){
                img.src = ev.target.result;
                img.style.display='block';
                remove.style.display='block';
            }
            reader.readAsDataURL(file);
        }
    }

    const label = document.createElement('label');
    label.textContent = 'Choose Image';
    label.onclick = ()=>input.click();

    wrapper.appendChild(img);
    wrapper.appendChild(remove);
    wrapper.appendChild(input);
    wrapper.appendChild(label);

    container.insertBefore(wrapper, container.querySelector('.add-more'));
}

// Add more buttons
document.getElementById('addBefore').addEventListener('click',()=>createImageInput('beforeImagesContainer'));
document.getElementById('addAfter').addEventListener('click',()=>createImageInput('afterImagesContainer'));

// Open/Close form
function openForm(isEdit=false, item=null){
    document.getElementById('popupOverlay').style.display='flex';
    const beforeContainer = document.getElementById('beforeImagesContainer');
    const afterContainer = document.getElementById('afterImagesContainer');
    beforeContainer.querySelectorAll('.image-box').forEach(e=>{if(!e.classList.contains('add-more')) e.remove();});
    afterContainer.querySelectorAll('.image-box').forEach(e=>{if(!e.classList.contains('add-more')) e.remove();});

    if(isEdit){
        document.getElementById('formTitle').innerText = 'Edit Past Work';
        document.getElementById('pwName').value = item.title;
        document.getElementById('pwDesc').value = item.description;
        editingId = item.id;

        item.beforeImages.forEach(src=>{
            createImageInput('beforeImagesContainer');
            const imgs = beforeContainer.querySelectorAll('img');
            imgs[imgs.length-1].src = src; imgs[imgs.length-1].style.display='block';
            beforeContainer.querySelectorAll('.remove-image')[imgs.length-1].style.display='block';
        });
        item.afterImages.forEach(src=>{
            createImageInput('afterImagesContainer');
            const imgs = afterContainer.querySelectorAll('img');
            imgs[imgs.length-1].src = src; imgs[imgs.length-1].style.display='block';
            afterContainer.querySelectorAll('.remove-image')[imgs.length-1].style.display='block';
        });
    }else{
        document.getElementById('formTitle').innerText = 'Create Past Work';
        document.getElementById('pwName').value='';
        document.getElementById('pwDesc').value='';
        editingId=null;
    }
}

function closeForm(){ document.getElementById('popupOverlay').style.display='none'; }

// Save Work
function saveWork(){
    const name = pwName.value.trim();
    const desc = pwDesc.value.trim();

    const beforeImgs = Array.from(document.querySelectorAll('#beforeImagesContainer .image-box img')).map(img=>img.src).filter(Boolean);
    const afterImgs = Array.from(document.querySelectorAll('#afterImagesContainer .image-box img')).map(img=>img.src).filter(Boolean);

    if(!name || !desc || beforeImgs.length<1 || afterImgs.length<1){
        showPopup('Please fill all fields and add at least 1 image for Before and After.','error','Missing Info','OK',()=>{});
        return;
    }

    if(editingId){
        let item = pastWorkData.find(x=>x.id===editingId);
        item.title=name; item.description=desc; item.beforeImages=beforeImgs; item.afterImages=afterImgs;
    }else{
        pastWorkData.push({id:Date.now(), title:name, description:desc, beforeImages:beforeImgs, afterImages:afterImgs});
    }

    showPopup('Past work saved successfully!','success','Saved','OK',()=>{
        closeForm();
        renderPastWork();
    });
}

// Delete
function deleteWork(id){
    const item = pastWorkData.find(x=>x.id===id);
    showPopup(`Are you sure you want to delete "${item.title}"?`,'delete','Delete Work','Delete',()=>{
        pastWorkData = pastWorkData.filter(x=>x.id!==id);
        renderPastWork();
    });
}

// Render Grid
function renderPastWork(){
    const box = document.getElementById('pastWorkGrid');
    box.innerHTML='';
    pastWorkData.forEach(item=>{

        box.innerHTML+=`
            <div class="pastwork-card">
                <img src="${SITE_URL}assets/images/services-images/${item.beforeImages[0]}">
                <div class="pastwork-card-content">
                    <div class="pastwork-title">${item.title}</div>
                    <div class="pastwork-desc">${item.description}</div>
                </div>
                <div class="card-actions">
                    <i class="fa-solid fa-pen-to-square" onclick='openForm(true, ${JSON.stringify(item)})'></i>
                    <i class="fa-solid fa-trash" onclick='deleteWork(${item.id})'></i>
                </div>
            </div>
        `;
    });
}

document.getElementById('createjob').addEventListener('click',()=>openForm(false));

renderPastWork();
</script>

<?php include '../includes/footer.php'; ?>
