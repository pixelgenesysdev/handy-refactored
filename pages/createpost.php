<?php
 include '../includes/head.php'; 
 include '../includes/bothpage.php';
?>

<div class="container mt-4" id="createpostPage">


    <div class="topbarwithbtn mb-4 items-center">
        <h3 class="mb-0"><i onclick="history.back()" class="fa-solid fa-arrow-left fs-5" style="cursor:pointer;"></i> Create a New Post</h3>
    </div>

    <!-- Post Card -->
    <div class="card shadow-sm border-0 rounded-4 p-3">

        <!-- User + Textarea -->
        <div class="d-flex gap-3">
            <img src="<?php echo SITE_URL; ?>assets/images/avatar1.png"
                 class="rounded-circle"
                 width="55"
                 height="55"
                 style="object-fit:cover;">

            <textarea class="form-control border-0 p-3"
                      rows="4"
                      placeholder="What's on your mind?"
                      id="postText"
                      required
                      style="resize:none;background-color:#F3F3F9;"></textarea>
        </div>

        <hr>

        <!-- Image Preview -->
        <div class="mb-3 d-none" id="imagePreview">
            <img id="previewImg" class="img-fluid rounded-3" style="object-fit: cover; width: 100%; max-width: 200px; min-width: 250px;height: 250px;object-position: center;">
        </div>

        <!-- Actions -->
        <div class="d-flex justify-content-between align-items-center">

            <label class="btn btn-light border rounded-pill px-3 mb-0">
                <i class="fa-regular fa-image me-2"></i>Upload image(s)
                <input type="file" hidden accept="image/*"
                       onchange="
                        const file = this.files[0];
                        if(file){
                            const reader = new FileReader();
                            reader.onload = () => {
                                document.getElementById('previewImg').src = reader.result;
                                document.getElementById('imagePreview').classList.remove('d-none');
                            }
                            reader.readAsDataURL(file);
                        }
                       ">
            </label>

            <button class="btn btn-primary" onclick="addPost()">
                Post
            </button>
        </div>

    </div>
</div>

<script>

    function addPost() {
        showPopup(
            'Post has been created successfully.',
            'success',
            'Successfully Created',
            'Ok',
            () => {
                window.location.href = '<?php echo SITE_URL; ?>pages/community.php';
            }
        
        );
    }


</script>
<?php include '../includes/footer.php'; ?>
