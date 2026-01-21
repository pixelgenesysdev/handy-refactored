<?php
$page_js = 'pages_community.js';
include '../includes/head.php';
include '../includes/bothpage.php';
?>



<div class="community-container">
    <!-- Header -->
    <div class="topbarwithbtn mb-4 items-center">
        <h3 class="mb-0">Community</h3>
       <div>
            <button class="btn btn-primary" id="createPostsBtn" onclick="createPost()">Create Post</button>
            <button class="btn btn-primary black" onclick="AskPro()" id="askProBtn">
            Ask A Pro
            </button>

            <script>
            const AskProBtn = document.getElementById('askProBtn');

            if (loginUser.role !== 'customer') {
                AskProBtn.remove();
            }
            </script>
             <button class="btn btn-primary" id="myPostsBtn"  onclick="showMyPosts()">My Posts</button>
        </div>
    </div>



    <!-- Create Post -->
    <!-- <div class="create-post">
        <div class="user-row">
            <img src="https://i.pravatar.cc/40" class="user-avatar" />
            <div class="post-input-container">
                <input id="postText" placeholder="Share something with the community..." />
                <div class="post-options">
                    <label for="postImage" class="image-upload-btn">
                        📷 Add Image
                    </label>
                    <input type="file" id="postImage" accept="image/*" style="display: none;" />
                    <button class="btn-post" onclick="addPost()">Post</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Posts Filter -->
    <!-- <div class="posts-filter">
        <button class="filter-btn active" onclick="showAllPosts()">All Posts</button>
        <button class="filter-btn" onclick="showTextPosts()">Text Only</button>
        <button class="filter-btn" onclick="showImagePosts()">With Images</button>
    </div> -->

    <!-- Feed -->
    <div id="feedmaincontainer" class="feed-container " style="max-width: 800px; min-width: 250px;"></div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:20px; background:#fff7f2;">
      
      <!-- Header -->
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Comments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body" style="max-height:400px; overflow-y:auto;" id="commentList">
        <!-- comments JS se aayenge -->
      </div>

      <!-- Footer / Input -->
      <div class="modal-footer border-0 pt-0">
        <div class="d-flex align-items-center w-100 gap-2">
          <input type="text" id="commentInput" class="form-control"
                 placeholder="Write comment..."
                 style="border-radius:20px;">
          <button class="btn text-white"
                  style="border-radius:50%; background:#f16622;"
                  onclick="addComment()">
            <i class="fa fa-paper-plane"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</div>








<style>
    .likeddone {
        color: #f16622 !important;
        -webkit-text-stroke: 0px black !important;
        transform: scale(1.2);
        animation: myAnim 1s ease 0s 1 normal forwards;
    }
    @keyframes myAnim {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.5);
        }

        100% {
            transform: scale(1.2);
        }
    }
</style>



<?php include '../includes/footer.php'; ?>



