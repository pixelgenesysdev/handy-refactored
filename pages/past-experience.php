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
    transition: transform 0.2s; cursor: pointer;
}
.pastwork-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}
.pastwork-card img { width: 100%; height: 220px; object-fit: cover; margin-bottom: 5px; }
.pastwork-card-content { padding: 15px; }
.pastwork-title { font-size: 18px; font-weight: 600; }
.pastwork-desc { font-size: 14px; color: #666; margin: 5px 0; }

.card-actions { display: flex; justify-content: flex-end; gap: 15px; padding: 12px 15px; }
.card-actions i { cursor: pointer; font-size: 18px; transition: color 0.2s; z-index: 10; position: relative; }
.card-actions i.fa-pen-to-square { color: #4CAF50; }
.card-actions i.fa-pen-to-square:hover { color: #45a049; }
.card-actions i.fa-trash { color: #f44336; }
.card-actions i.fa-trash:hover { color: #da190b; }

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
.submit-btn:hover { background: #ff5517; }
.close-btn {
    background: #bbb; color: #333; padding: 10px; width: 100%;
    border: none; border-radius: 8px; margin-top: 10px; cursor: pointer;
}
.close-btn:hover { background: #999; }

/* MULTI IMAGE BOXES */
.image-group { display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap; }
.image-box {
    width: 48%; text-align: center; border: 1px dashed #ccc; padding: 10px;
    border-radius: 8px; position: relative; min-height: 110px; background: #fafafa;
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
    width: 48%; height: 100px; font-size: 24px; color: #666; background: #fafafa;
}
.add-more:hover { background: #f0f0f0; border-color: #999; }

/* DETAIL VIEW */
#detailOverlay {
    position: fixed; inset: 0; background: rgba(0,0,0,0.5);
    display: none; justify-content: center; align-items: center; z-index: 998;
}
#detailView {
    width: 90%; max-width: 900px; background: #fff; padding: 30px; border-radius: 12px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.2);
    max-height: 90vh; overflow-y: auto; position: relative;
}
.detail-close {
    position: absolute; top: 15px; right: 15px; font-size: 28px;
    cursor: pointer; color: #666; width: 35px; height: 35px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 50%; background: #f5f5f5;
}
.detail-close:hover { background: #e0e0e0; color: #333; }
.detail-header { margin-bottom: 20px; }
.detail-header h2 { font-size: 28px; font-weight: 600; margin: 0 0 10px 0; }
.detail-header p { font-size: 16px; color: #666; margin: 0; line-height: 1.6; }

.detail-section { margin: 30px 0; }
.detail-section h3 { font-size: 20px; font-weight: 600; margin-bottom: 15px; color: #333; }
.detail-images {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}
.detail-images img {
    width: 100%; height: 200px; object-fit: cover; border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;
    transition: transform 0.2s;
}
.detail-images img:hover { transform: scale(1.05); }

.detail-actions {
    display: flex; gap: 15px; margin-top: 25px; justify-content: flex-end;
}
.detail-actions button {
    padding: 10px 20px; border-radius: 8px; font-weight: 600;
    cursor: pointer; border: none; font-size: 15px;
}
.detail-edit-btn { background: #4CAF50; color: white; }
.detail-edit-btn:hover { background: #45a049; }
.detail-delete-btn { background: #f44336; color: white; }
.detail-delete-btn:hover { background: #da190b; }

</style>

<div id="pagebox">
    <div class="topbarwithbtn">
        <h3 class="page-title" style="cursor: pointer;" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i> My Past Work</h3>
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

    <!-- DETAIL VIEW -->
    <div id="detailOverlay">
        <div id="detailView">
            <div class="detail-close" onclick="closeDetailView()">&times;</div>
            <div class="detail-header">
                <h2 id="detailTitle"></h2>
                <p id="detailDescription"></p>
            </div>

            <div class="detail-section">
                <h3><i class="fa-solid fa-image"></i> Before Images</h3>
                <div class="detail-images" id="detailBeforeImages"></div>
            </div>

            <div class="detail-section">
                <h3><i class="fa-solid fa-image"></i> After Images</h3>
                <div class="detail-images" id="detailAfterImages"></div>
            </div>

            <div class="detail-actions">
                <button class="detail-edit-btn" onclick="editFromDetail()">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </button>
                <button class="detail-delete-btn" onclick="deleteFromDetail()">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const IMAGE_BASE_PATH = SITE_URL + 'assets/images/services-images/';

let pastWorkData = [
    {
        id: 1, 
        title: 'Kitchen Deep Cleaning', 
        description: 'Complete kitchen transformation with deep cleaning of cabinets, appliances, and countertops. Removed years of built-up grease and grime, sanitized all surfaces, and made everything sparkle like new.', 
        beforeImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp'], 
        afterImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp']
    },
    {
        id: 2, 
        title: 'Bathroom Renovation Cleaning', 
        description: 'Post-renovation cleaning service for a newly renovated bathroom, removing all construction dust and debris. Detailed cleaning of tiles, fixtures, mirrors, and floors to reveal the beautiful new design.', 
        beforeImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp'], 
        afterImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp']
    },
    {
        id: 3, 
        title: 'Living Room Carpet Cleaning', 
        description: 'Professional carpet steam cleaning with stain removal and deodorizing treatment. Eliminated pet stains, food spills, and years of dirt accumulation to restore the carpet to like-new condition.', 
        beforeImages: ['cleaning_service_image.webp'], 
        afterImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp']
    },
    {
        id: 4, 
        title: 'Office Space Sanitization', 
        description: 'Complete office cleaning and sanitization including desks, floors, and common areas. Deep cleaned all work stations, conference rooms, and break areas with professional-grade equipment and eco-friendly products.', 
        beforeImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp'], 
        afterImages: ['cleaning_service_image.webp', 'cleaning_service_image.webp', 'cleaning_service_image.webp']
    },
];
let editingId = null;
let currentDetailId = null;

// Helpers
function createImageInput(containerId, existingImagePath = null){
    const container = document.getElementById(containerId);
    const wrapper = document.createElement('div');
    wrapper.className = 'image-box';

    const input = document.createElement('input');
    input.type='file'; 
    input.accept='image/*';
    input.dataset.isNewUpload = 'true';

    const img = document.createElement('img');
    img.style.display='none';

    const remove = document.createElement('div');
    remove.className='remove-image';
    remove.innerHTML='&times;';
    remove.onclick = ()=>{ wrapper.remove(); };

    // If there's an existing image, display it
    if(existingImagePath) {
        img.src = existingImagePath;
        img.style.display='block';
        remove.style.display='block';
        input.dataset.existingPath = existingImagePath;
        input.dataset.isNewUpload = 'false';
    }

    input.onchange = e=>{
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(ev){
                img.src = ev.target.result;
                img.style.display='block';
                remove.style.display='block';
                input.dataset.isNewUpload = 'true';
            }
            reader.readAsDataURL(file);
        }
    }

    const label = document.createElement('label');
    label.textContent = existingImagePath ? 'Change Image' : 'Choose Image';
    label.onclick = ()=>input.click();

    wrapper.appendChild(img);
    wrapper.appendChild(remove);
    wrapper.appendChild(input);
    wrapper.appendChild(label);

    container.insertBefore(wrapper, container.querySelector('.add-more'));
    return wrapper;
}

// Add more buttons
document.getElementById('addBefore').addEventListener('click',()=>createImageInput('beforeImagesContainer'));
document.getElementById('addAfter').addEventListener('click',()=>createImageInput('afterImagesContainer'));

// Open/Close form
function openForm(isEdit=false, item=null){
    document.getElementById('popupOverlay').style.display='flex';
    const beforeContainer = document.getElementById('beforeImagesContainer');
    const afterContainer = document.getElementById('afterImagesContainer');
    
    // Clear existing image boxes
    beforeContainer.querySelectorAll('.image-box').forEach(e=>e.remove());
    afterContainer.querySelectorAll('.image-box').forEach(e=>e.remove());

    if(isEdit){
        document.getElementById('formTitle').innerText = 'Edit Past Work';
        document.getElementById('pwName').value = item.title;
        document.getElementById('pwDesc').value = item.description;
        editingId = item.id;

        // Load before images with proper paths
        item.beforeImages.forEach(imageName => {
            const fullPath = IMAGE_BASE_PATH + imageName;
            createImageInput('beforeImagesContainer', fullPath);
        });

        // Load after images with proper paths
        item.afterImages.forEach(imageName => {
            const fullPath = IMAGE_BASE_PATH + imageName;
            createImageInput('afterImagesContainer', fullPath);
        });
    }else{
        document.getElementById('formTitle').innerText = 'Create Past Work';
        document.getElementById('pwName').value='';
        document.getElementById('pwDesc').value='';
        editingId=null;
    }
}

function closeForm(){ 
    document.getElementById('popupOverlay').style.display='none'; 
}

// Detail View Functions
function showDetailView(id){
    const item = pastWorkData.find(x => x.id === id);
    if(!item) return;

    currentDetailId = id;
    document.getElementById('detailTitle').textContent = item.title;
    document.getElementById('detailDescription').textContent = item.description;

    // Load before images
    const beforeContainer = document.getElementById('detailBeforeImages');
    beforeContainer.innerHTML = '';
    item.beforeImages.forEach(imageName => {
        const img = document.createElement('img');
        img.src = imageName.startsWith('data:') ? imageName : IMAGE_BASE_PATH + imageName;
        img.alt = 'Before Image';
        beforeContainer.appendChild(img);
    });

    // Load after images
    const afterContainer = document.getElementById('detailAfterImages');
    afterContainer.innerHTML = '';
    item.afterImages.forEach(imageName => {
        const img = document.createElement('img');
        img.src = imageName.startsWith('data:') ? imageName : IMAGE_BASE_PATH + imageName;
        img.alt = 'After Image';
        afterContainer.appendChild(img);
    });

    document.getElementById('detailOverlay').style.display = 'flex';
}

function closeDetailView(){
    document.getElementById('detailOverlay').style.display = 'none';
    currentDetailId = null;
}

function editFromDetail(){
    const item = pastWorkData.find(x => x.id === currentDetailId);
    closeDetailView();
    openForm(true, item);
}

function deleteFromDetail(){
    deleteWork(currentDetailId);
    closeDetailView();
}

// Save Work
function saveWork(){
    const name = document.getElementById('pwName').value.trim();
    const desc = document.getElementById('pwDesc').value.trim();

    // Get image sources - extract just the filename from full paths
    const beforeImgs = Array.from(document.querySelectorAll('#beforeImagesContainer .image-box img'))
        .filter(img => img.style.display !== 'none')
        .map(img => {
            const src = img.src;
            // If it's a base64 data URL (new upload), keep as is
            if(src.startsWith('data:')) return src;
            // If it's a full URL, extract just the filename
            return src.split('/').pop();
        });
    
    const afterImgs = Array.from(document.querySelectorAll('#afterImagesContainer .image-box img'))
        .filter(img => img.style.display !== 'none')
        .map(img => {
            const src = img.src;
            if(src.startsWith('data:')) return src;
            return src.split('/').pop();
        });

    if(!name || !desc || beforeImgs.length<1 || afterImgs.length<1){
        showPopup('Please fill all fields and add at least 1 image for Before and After.','error','Missing Info','OK',()=>{});
        return;
    }

    if(editingId){
        let item = pastWorkData.find(x=>x.id===editingId);
        item.title=name; 
        item.description=desc; 
        item.beforeImages=beforeImgs; 
        item.afterImages=afterImgs;
    }else{
        pastWorkData.push({
            id:Date.now(), 
            title:name, 
            description:desc, 
            beforeImages:beforeImgs, 
            afterImages:afterImgs
        });
    }

    showPopup('Past work saved successfully!','success','Saved','OK',()=>{
        closeForm();
        renderPastWork();
    });
}

// Delete
function deleteWork(id){
    const item = pastWorkData.find(x=>x.id===id);
    showPopup(`Are you sure you want to delete "${item.title}"?`,'delete','Delete Work','Yes',()=>{
        pastWorkData = pastWorkData.filter(x=>x.id!==id);
        renderPastWork();
    });
}

// Render Grid
function renderPastWork(){
    const box = document.getElementById('pastWorkGrid');
    box.innerHTML='';
    
    pastWorkData.forEach(item=>{
        const firstImage = item.beforeImages[0];
        const imageSrc = firstImage.startsWith('data:') ? firstImage : IMAGE_BASE_PATH + firstImage;
        
        const card = document.createElement('div');
        card.className = 'pastwork-card';
        card.innerHTML = `
            <img src="${imageSrc}" alt="${item.title}">
            <div class="pastwork-card-content">
                <div class="pastwork-title">${item.title}</div>
                <div class="pastwork-desc">${item.description.substring(0, 80)}${item.description.length > 80 ? '...' : ''}</div>
            </div>
            <div class="card-actions">
                <i class="fa-solid fa-pen-to-square" onclick='editItem(${item.id}); event.stopPropagation();'></i>
                <i class="fa-solid fa-trash" onclick='deleteWork(${item.id}); event.stopPropagation();'></i>
            </div>
        `;
        
        // Add click event to card (not on action buttons)
        card.addEventListener('click', function(e){
            if(!e.target.closest('.card-actions')){
                showDetailView(item.id);
            }
        });
        
        box.appendChild(card);
    });
}

function editItem(id){
    const item = pastWorkData.find(x => x.id === id);
    openForm(true, item);
}

document.getElementById('createjob').addEventListener('click',()=>openForm(false));

// Close popup when clicking outside
document.getElementById('popupOverlay').addEventListener('click', function(e){
    if(e.target === this){
        closeForm();
    }
});

document.getElementById('detailOverlay').addEventListener('click', function(e){
    if(e.target === this){
        closeDetailView();
    }
});

renderPastWork();
</script>

<?php include '../includes/footer.php'; ?>