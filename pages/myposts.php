<?php
    $page_js = 'pages_community.js';  
    include '../includes/head.php'; 
    include '../includes/bothpage.php';
?>


<div id="createpostPage" class="provider-profile">

    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>My Posts</h3>
    </div>

    <div id="mypostfeed" class="feed-container w-50"></div>
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

