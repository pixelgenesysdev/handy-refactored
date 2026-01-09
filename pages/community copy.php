<?php
$page_js = 'pages_community.js';
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div class="community-container">
    <!-- Header -->
    <div class="community-top">
        <h3>Community</h3>
        <div>
            <button class="btn-orange" onclick="focusPost()">Add a Post</button>
            <button class="btn-dark" onclick="showMyPosts()">My Posts</button>
        </div>
    </div>

    <!-- Create Post -->
    <div class="create-post">
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
    </div>

    <!-- Posts Filter -->
    <div class="posts-filter">
        <button class="filter-btn active" onclick="showAllPosts()">All Posts</button>
        <button class="filter-btn" onclick="showTextPosts()">Text Only</button>
        <button class="filter-btn" onclick="showImagePosts()">With Images</button>
    </div>

    <!-- Feed -->
    <div id="feed"></div>

    <!-- My Posts Page -->
    <div id="myPostsPage" class="my-posts-page" style="display: none;">
        <div class="page-header">
            <button class="back-btn" onclick="backToCommunity()">← Back</button>
            <h3>My Posts</h3>
        </div>
        <div id="myPostsFeed"></div>
    </div>
</div>

<!-- Comments Modal -->
<div class="modal" id="commentModal">
    <div class="modal-box">
        <div class="modal-header">
            <h4>Comments</h4>
            <span class="close-btn" onclick="closeComments()">✕</span>
        </div>
        
        <div class="modal-content">
            <!-- Post Preview -->
            <div class="post-preview" id="modalPostPreview"></div>
            
            <!-- Comments List -->
            <div id="commentList"></div>
        </div>
        
        <!-- Fixed Comment Input -->
        <div class="fixed-comment-input">
            <div class="user-row">
                <img src="https://i.pravatar.cc/30" class="user-avatar" />
                <input id="newComment" placeholder="Write a comment..." />
                <button class="send-btn" onclick="addComment()">➤</button>
            </div>
        </div>
    </div>
</div>

<!-- Reply Modal -->
<div class="modal" id="replyModal">
    <div class="modal-box reply-modal">
        <div class="modal-header">
            <h5>Reply to Comment</h5>
            <span class="close-btn" onclick="closeReply()">✕</span>
        </div>
        <div class="modal-content">
            <div class="comment-preview" id="replyToComment"></div>
            <div class="reply-input-section">
                <div class="user-row">
                    <img src="https://i.pravatar.cc/30" class="user-avatar" />
                    <input id="replyText" placeholder="Write your reply..." />
                </div>
                <button class="btn-orange" onclick="submitReply()">Reply</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentUser = "Justin Edward";
    let activePostIndex = null;
    let activeCommentIndex = null;
    let currentPage = 'community';

    // Sample posts data
    let posts = [
        {
            id: 1,
            user: "User Name",
            avatar: "https://i.pravatar.cc/40?u=1",
            time: "2 days ago",
            text: "This space is your go-to for finding Black-centered events happening near you—markets, panels, pop-ups...",
            image: "",
            likes: 3500,
            dislikes: 20,
            userLiked: false,
            userDisliked: false,
            comments: [
                {
                    id: 1,
                    user: "Justin Edward",
                    avatar: "https://i.pravatar.cc/30?u=justin",
                    time: "3.24",
                    text: "This space is your group for finding Black centered events happening near you—markets, panels, pop-ups...",
                    likes: 5,
                    dislikes: 2,
                    userLiked: false,
                    userDisliked: false,
                    replies: []
                },
                {
                    id: 2,
                    user: "Justin Edward",
                    avatar: "https://i.pravatar.cc/30?u=justin2",
                    time: "3.34",
                    text: "This space is your group for finding Black centered events happening near you—markets, panels, pop-ups...",
                    likes: 3,
                    dislikes: 1,
                    userLiked: false,
                    userDisliked: false,
                    replies: []
                }
            ]
        },
        {
            id: 2,
            user: "User Name",
            avatar: "https://i.pravatar.cc/40?u=2",
            time: "1 day ago",
            text: "This space is your go-to for finding Black-centered events happening near you—markets.",
            image: "https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&h=400&fit=crop",
            likes: 1200,
            dislikes: 12,
            userLiked: true,
            userDisliked: false,
            comments: []
        },
        {
            id: 3,
            user: "Alex Johnson",
            avatar: "https://i.pravatar.cc/40?u=3",
            time: "5 hours ago",
            text: "Just discovered this amazing Black-owned bookstore downtown! Highly recommended for their curated selection.",
            image: "https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=600&h=400&fit=crop",
            likes: 890,
            dislikes: 3,
            userLiked: false,
            userDisliked: false,
            comments: [
                {
                    id: 1,
                    user: "Maria Garcia",
                    avatar: "https://i.pravatar.cc/30?u=maria",
                    time: "2.15",
                    text: "Where exactly is this? I'd love to visit!",
                    likes: 12,
                    dislikes: 0,
                    userLiked: false,
                    userDisliked: false,
                    replies: [
                        {
                            id: 1,
                            user: "Alex Johnson",
                            avatar: "https://i.pravatar.cc/25?u=alexreply",
                            time: "1.30",
                            text: "It's on 5th Avenue, next to the coffee shop!",
                            likes: 3,
                            dislikes: 0
                        }
                    ]
                }
            ]
        }
    ];

    // Initialize from localStorage if available
    function initializeData() {
        const savedPosts = localStorage.getItem('communityPosts');
        if (savedPosts) {
            posts = JSON.parse(savedPosts);
        }
        renderFeed();
    }

    function saveToLocalStorage() {
        localStorage.setItem('communityPosts', JSON.stringify(posts));
    }

    function renderFeed(list = posts) {
        if (currentPage === 'myposts') return;
        
        let feed = document.getElementById("feed");
        feed.innerHTML = "";

        if (list.length === 0) {
            feed.innerHTML = '<div class="empty-state">No posts yet. Be the first to post!</div>';
            return;
        }

        list.forEach((p, i) => {
            const likeIcon = p.userLiked ? '👍🏻' : '👍';
            const dislikeIcon = p.userDisliked ? '👎🏻' : '👎';
            
            feed.innerHTML += `
            <div class="post-card" data-id="${p.id}">
                <div class="post-header">
                    <img src="${p.avatar}" class="user-avatar">
                    <div class="post-user-info">
                        <b>${p.user}</b>
                        <div class="time">${p.time}</div>
                    </div>
                    <div class="post-stats-header">
                        <span class="stat-item">3%</span>
                        <span class="stat-item">Use</span>
                    </div>
                </div>

                <p class="post-text">${p.text}</p>
                ${p.image ? `<img class="post-img" src="${p.image}" onclick="viewImage('${p.image}')">` : ""}

                <div class="post-stats">
                    <span>👍 ${p.likes} &nbsp; 👎 ${p.dislikes} &nbsp; 💬 ${p.comments.length} Comments</span>
                </div>

                <div class="post-interaction">
                    <div class="reaction-buttons">
                        <button class="reaction-btn ${p.userLiked ? 'active' : ''}" onclick="likePost(${i})">
                            ${likeIcon} Like
                        </button>
                        <button class="reaction-btn ${p.userDisliked ? 'active' : ''}" onclick="dislikePost(${i})">
                            ${dislikeIcon} Dislike
                        </button>
                        <button class="comment-btn" onclick="openComments(${i})">
                            💬 Comment
                        </button>
                    </div>
                </div>
            </div>`;
        });
        saveToLocalStorage();
    }

    function renderMyPosts() {
        let feed = document.getElementById("myPostsFeed");
        const myPosts = posts.filter(p => p.user === currentUser);
        
        if (myPosts.length === 0) {
            feed.innerHTML = '<div class="empty-state">You haven\'t created any posts yet.</div>';
            return;
        }
        
        feed.innerHTML = "";
        myPosts.forEach((p, i) => {
            const originalIndex = posts.findIndex(post => post.id === p.id);
            feed.innerHTML += `
            <div class="post-card my-post">
                <div class="post-header">
                    <img src="${p.avatar}" class="user-avatar">
                    <div class="post-user-info">
                        <b>${p.user}</b>
                        <div class="time">${p.time}</div>
                    </div>
                    <div class="post-actions-menu">
                        <button class="menu-btn" onclick="editPost(${originalIndex})">✏️</button>
                        <button class="menu-btn delete" onclick="deletePost(${originalIndex})">🗑️</button>
                    </div>
                </div>
                <p class="post-text">${p.text}</p>
                ${p.image ? `<img class="post-img" src="${p.image}">` : ""}
                <div class="post-stats">
                    👍 ${p.likes} &nbsp; 👎 ${p.dislikes} &nbsp; 💬 ${p.comments.length} Comments
                </div>
            </div>`;
        });
    }

    function addPost() {
        let text = document.getElementById("postText").value.trim();
        let file = document.getElementById("postImage").files[0];

        if (!text) {
            alert("Please write something to post!");
            return;
        }

        const newPost = {
            id: Date.now(),
            user: currentUser,
            avatar: "https://i.pravatar.cc/40?u=" + Date.now(),
            time: "Just now",
            text: text,
            image: "",
            likes: 0,
            dislikes: 0,
            userLiked: false,
            userDisliked: false,
            comments: []
        };

        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                alert("Image size should be less than 5MB");
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                newPost.image = e.target.result;
                posts.unshift(newPost);
                document.getElementById("postText").value = "";
                document.getElementById("postImage").value = "";
                renderFeed();
                showAllPosts();
            };
            reader.readAsDataURL(file);
        } else {
            posts.unshift(newPost);
            document.getElementById("postText").value = "";
            renderFeed();
            showAllPosts();
        }
    }

    function likePost(i) {
        if (posts[i].userLiked) {
            posts[i].likes--;
            posts[i].userLiked = false;
        } else {
            posts[i].likes++;
            if (posts[i].userDisliked) {
                posts[i].dislikes--;
                posts[i].userDisliked = false;
            }
            posts[i].userLiked = true;
        }
        renderFeed();
        saveToLocalStorage();
    }

    function dislikePost(i) {
        if (posts[i].userDisliked) {
            posts[i].dislikes--;
            posts[i].userDisliked = false;
        } else {
            posts[i].dislikes++;
            if (posts[i].userLiked) {
                posts[i].likes--;
                posts[i].userLiked = false;
            }
            posts[i].userDisliked = true;
        }
        renderFeed();
        saveToLocalStorage();
    }

    /* ---------- COMMENTS ---------- */

    function openComments(index) {
        activePostIndex = index;
        const post = posts[index];
        
        // Update modal post preview
        document.getElementById("modalPostPreview").innerHTML = `
            <div class="post-header">
                <img src="${post.avatar}" class="user-avatar">
                <div class="post-user-info">
                    <b>${post.user}</b>
                    <div class="time">${post.time}</div>
                </div>
            </div>
            <p class="post-text">${post.text}</p>
            ${post.image ? `<img class="post-img-preview" src="${post.image}">` : ""}
        `;
        
        renderComments();
        document.getElementById("commentModal").style.display = "flex";
        document.getElementById("newComment").focus();
    }

    function closeComments() {
        document.getElementById("commentModal").style.display = "none";
        activePostIndex = null;
    }

    function renderComments() {
        let list = document.getElementById("commentList");
        list.innerHTML = "";

        const postComments = posts[activePostIndex].comments;
        
        if (postComments.length === 0) {
            list.innerHTML = '<div class="no-comments">No comments yet. Be the first to comment!</div>';
            return;
        }

        postComments.forEach((c, ci) => {
            const likeIcon = c.userLiked ? '👍🏻' : '👍';
            const dislikeIcon = c.userDisliked ? '👎🏻' : '👎';
            
            list.innerHTML += `
            <div class="comment-box">
                <div class="comment-header">
                    <img src="${c.avatar}" class="comment-avatar">
                    <div>
                        <b>${c.user}</b>
                        <div class="comment-time">${c.time}</div>
                    </div>
                </div>
                <p class="comment-text">${c.text}</p>
                <div class="comment-actions">
                    <button class="comment-action-btn ${c.userLiked ? 'active' : ''}" onclick="likeComment(${ci})">
                        ${likeIcon} ${c.likes}
                    </button>
                    <button class="comment-action-btn ${c.userDisliked ? 'active' : ''}" onclick="dislikeComment(${ci})">
                        ${dislikeIcon} ${c.dislikes}
                    </button>
                    <button class="comment-action-btn" onclick="openReplyModal(${ci})">
                        ↪️ Reply
                    </button>
                    <span class="moon-icon">🌒️</span>
                    <span class="comment-time">${c.time}</span>
                </div>
                
                <!-- Replies -->
                ${c.replies && c.replies.length > 0 ? c.replies.map((r, ri) => `
                    <div class="reply-box">
                        <div class="reply-header">
                            <img src="${r.avatar}" class="reply-avatar">
                            <div>
                                <b>${r.user}</b>
                                <div class="reply-time">${r.time}</div>
                            </div>
                        </div>
                        <p class="reply-text">${r.text}</p>
                        <div class="reply-actions">
                            <button class="reply-action-btn" onclick="likeReply(${ci}, ${ri})">
                                👍 ${r.likes || 0}
                            </button>
                        </div>
                    </div>
                `).join('') : ''}
            </div>`;
        });
        
        // Scroll to bottom of comments
        list.scrollTop = list.scrollHeight;
    }

    function addComment() {
        let text = document.getElementById("newComment").value.trim();
        if (!text) {
            alert("Please write a comment!");
            return;
        }

        const newComment = {
            id: Date.now(),
            user: currentUser,
            avatar: "https://i.pravatar.cc/30?u=" + Date.now(),
            time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}),
            text: text,
            likes: 0,
            dislikes: 0,
            userLiked: false,
            userDisliked: false,
            replies: []
        };

        posts[activePostIndex].comments.push(newComment);
        document.getElementById("newComment").value = "";
        renderComments();
        renderFeed();
        saveToLocalStorage();
    }

    function likeComment(commentIndex) {
        const comment = posts[activePostIndex].comments[commentIndex];
        if (comment.userLiked) {
            comment.likes--;
            comment.userLiked = false;
        } else {
            comment.likes++;
            if (comment.userDisliked) {
                comment.dislikes--;
                comment.userDisliked = false;
            }
            comment.userLiked = true;
        }
        renderComments();
        saveToLocalStorage();
    }

    function dislikeComment(commentIndex) {
        const comment = posts[activePostIndex].comments[commentIndex];
        if (comment.userDisliked) {
            comment.dislikes--;
            comment.userDisliked = false;
        } else {
            comment.dislikes++;
            if (comment.userLiked) {
                comment.likes--;
                comment.userLiked = false;
            }
            comment.userDisliked = true;
        }
        renderComments();
        saveToLocalStorage();
    }

    function likeReply(commentIndex, replyIndex) {
        const reply = posts[activePostIndex].comments[commentIndex].replies[replyIndex];
        reply.likes = (reply.likes || 0) + 1;
        renderComments();
        saveToLocalStorage();
    }

    function openReplyModal(commentIndex) {
        activeCommentIndex = commentIndex;
        const comment = posts[activePostIndex].comments[commentIndex];
        
        document.getElementById("replyToComment").innerHTML = `
            <div class="comment-header">
                <img src="${comment.avatar}" class="comment-avatar">
                <div>
                    <b>${comment.user}</b>
                    <div class="comment-time">${comment.time}</div>
                </div>
            </div>
            <p class="comment-text">${comment.text}</p>
        `;
        
        document.getElementById("replyModal").style.display = "flex";
        document.getElementById("replyText").focus();
    }

    function closeReply() {
        document.getElementById("replyModal").style.display = "none";
        activeCommentIndex = null;
    }

    function submitReply() {
        let text = document.getElementById("replyText").value.trim();
        if (!text) {
            alert("Please write a reply!");
            return;
        }

        const newReply = {
            id: Date.now(),
            user: currentUser,
            avatar: "https://i.pravatar.cc/25?u=reply" + Date.now(),
            time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}),
            text: text,
            likes: 0
        };

        posts[activePostIndex].comments[activeCommentIndex].replies.push(newReply);
        document.getElementById("replyText").value = "";
        closeReply();
        renderComments();
        saveToLocalStorage();
    }

    function showMyPosts() {
        document.getElementById("feed").style.display = "none";
        document.getElementById("myPostsPage").style.display = "block";
        document.querySelector(".create-post").style.display = "none";
        document.querySelector(".posts-filter").style.display = "none";
        currentPage = 'myposts';
        renderMyPosts();
    }

    function backToCommunity() {
        document.getElementById("myPostsPage").style.display = "none";
        document.getElementById("feed").style.display = "block";
        document.querySelector(".create-post").style.display = "block";
        document.querySelector(".posts-filter").style.display = "flex";
        currentPage = 'community';
        renderFeed();
    }

    function focusPost() {
        document.getElementById("postText").focus();
    }

    function showAllPosts() {
        renderFeed(posts);
        updateFilterButtons('all');
    }

    function showTextPosts() {
        const textPosts = posts.filter(p => !p.image);
        renderFeed(textPosts);
        updateFilterButtons('text');
    }

    function showImagePosts() {
        const imagePosts = posts.filter(p => p.image);
        renderFeed(imagePosts);
        updateFilterButtons('image');
    }

    function updateFilterButtons(activeFilter) {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
    }

    function viewImage(imageUrl) {
        window.open(imageUrl, '_blank');
    }

    function editPost(index) {
        const post = posts[index];
        document.getElementById("postText").value = post.text;
        focusPost();
        
        if (confirm("Edit this post? The old post will be removed and replaced with your edited version.")) {
            posts.splice(index, 1);
            renderFeed();
            renderMyPosts();
            saveToLocalStorage();
        }
    }

    function deletePost(index) {
        if (confirm("Are you sure you want to delete this post?")) {
            posts.splice(index, 1);
            renderFeed();
            renderMyPosts();
            saveToLocalStorage();
        }
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', function() {
        initializeData();
        
        // Handle Enter key in comment input
        document.getElementById('newComment').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                addComment();
            }
        });
        
        // Handle Enter key in post input
        document.getElementById('postText').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && (e.ctrlKey || e.metaKey)) {
                addPost();
            }
        });
        
        // Handle Enter key in reply input
        document.getElementById('replyText').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                submitReply();
            }
        });
    });
</script>

<style>
    .community-container {
        max-width: 100%;
        margin: 30px auto;
        padding: 0 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .community-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .community-top h3 {
        font-size: 28px;
        font-weight: 700;
        color: #000;
        margin: 0;
    }

    .btn-orange, .btn-dark, .btn-post {
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 10px;
        font-size: 14px;
    }

    .btn-orange {
        background: #ff6b2c;
        color: white;
    }

    .btn-orange:hover {
        background: #e55a20;
    }

    .btn-dark {
        background: #000;
        color: white;
    }

    .btn-dark:hover {
        background: #333;
    }

    .btn-post {
        background: #ff6b2c;
        color: white;
        padding: 8px 20px;
    }

    .create-post {
        background: #fff;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid #eaeaea;
    }

    .user-row {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .post-input-container {
        flex: 1;
    }

    .post-input-container input {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .post-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .image-upload-btn {
        background: #f5f5f5;
        padding: 8px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 14px;
        color: #666;
        transition: all 0.3s ease;
    }

    .image-upload-btn:hover {
        background: #e8e8e8;
    }

    .posts-filter {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .filter-btn {
        background: #f5f5f5;
        border: none;
        padding: 8px 20px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 14px;
        color: #666;
        transition: all 0.3s ease;
    }

    .filter-btn.active {
        background: #ff6b2c;
        color: white;
    }

    .post-card {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid #eaeaea;
        transition: transform 0.2s ease;
    }

    .post-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .post-user-info {
        flex: 1;
        margin-left: 12px;
    }

    .post-user-info b {
        display: block;
        font-size: 16px;
        margin-bottom: 4px;
    }

    .time {
        font-size: 12px;
        color: #888;
    }

    .post-stats-header {
        display: flex;
        gap: 15px;
        font-size: 14px;
        color: #ff6b2c;
        font-weight: 600;
    }

    .post-text {
        font-size: 15px;
        line-height: 1.5;
        color: #333;
        margin-bottom: 15px;
    }

    .post-img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        max-height: 400px;
        object-fit: cover;
        cursor: pointer;
    }

    .post-img-preview {
        width: 100%;
        border-radius: 10px;
        margin-top: 10px;
        max-height: 200px;
        object-fit: cover;
    }

    .post-stats {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .post-interaction {
        padding-top: 10px;
    }

    .reaction-buttons {
        display: flex;
        gap: 15px;
    }

    .reaction-btn, .comment-btn {
        background: none;
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 14px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
    }

    .reaction-btn:hover, .comment-btn:hover {
        background: #f5f5f5;
    }

    .reaction-btn.active {
        background: #ffece5;
        color: #ff6b2c;
        border-color: #ff6b2c;
    }

    .comment-btn.active {
        background: #e8f4ff;
        color: #0077cc;
        border-color: #0077cc;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-box {
        background: #fff;
        width: 500px;
        max-width: 90%;
        height: 80vh;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #eee;
        background: #fff;
        flex-shrink: 0;
    }

    .modal-header h4 {
        margin: 0;
        font-size: 18px;
    }

    .close-btn {
        cursor: pointer;
        font-size: 24px;
        color: #999;
        padding: 5px;
        line-height: 1;
    }

    .close-btn:hover {
        color: #666;
    }

    .modal-content {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
    }

    .post-preview {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Fixed Comment Input */
    .fixed-comment-input {
        border-top: 1px solid #eee;
        padding: 15px;
        background: #fff;
        flex-shrink: 0;
    }

    .fixed-comment-input .user-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .fixed-comment-input input {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 25px;
        font-size: 14px;
        outline: none;
    }

    .fixed-comment-input input:focus {
        border-color: #ff6b2c;
    }

    .send-btn {
        background: #ff6b2c;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .send-btn:hover {
        background: #e55a20;
    }

    /* Comment Styles */
    .comment-box {
        background: #f8f8f8;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .comment-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }

    .comment-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }

    .comment-header b {
        font-size: 14px;
    }

    .comment-text {
        font-size: 14px;
        line-height: 1.5;
        color: #333;
        margin-bottom: 10px;
        padding-left: 42px;
    }

    .comment-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 12px;
        color: #888;
        padding-left: 42px;
    }

    .comment-action-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 12px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 4px 8px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .comment-action-btn:hover {
        background: #f0f0f0;
    }

    .comment-action-btn.active {
        background: #ffece5;
        color: #ff6b2c;
    }

    .moon-icon {
        margin-left: auto;
        font-size: 14px;
    }

    .comment-time {
        font-size: 11px;
        color: #999;
    }

    .reply-box {
        background: #fff;
        padding: 12px;
        border-radius: 8px;
        margin: 10px 0 10px 42px;
        border-left: 3px solid #ff6b2c;
    }

    .reply-header {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }

    .reply-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reply-header b {
        font-size: 13px;
    }

    .reply-text {
        font-size: 13px;
        line-height: 1.4;
        color: #333;
        margin-bottom: 5px;
        padding-left: 32px;
    }

    .reply-actions {
        padding-left: 32px;
    }

    .reply-action-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 11px;
        color: #666;
        padding: 2px 6px;
        border-radius: 10px;
    }

    .reply-action-btn:hover {
        background: #f5f5f5;
    }

    .reply-modal {
        width: 400px;
        height: auto;
    }

    .reply-input-section {
        margin-top: 15px;
    }

    .reply-input-section input {
        flex: 1;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        font-size: 14px;
    }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #888;
        font-size: 16px;
        background: #f9f9f9;
        border-radius: 10px;
    }

    .page-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .back-btn {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #666;
        padding: 5px;
    }

    .back-btn:hover {
        color: #ff6b2c;
    }

    .post-actions-menu {
        display: flex;
        gap: 5px;
    }

    .menu-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        padding: 5px 8px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .menu-btn:hover {
        background: #f5f5f5;
    }

    .menu-btn.delete:hover {
        background: #ffe6e6;
        color: #ff0000;
    }

    .my-post {
        border-left: 4px solid #ff6b2c;
    }

    .no-comments {
        text-align: center;
        padding: 30px;
        color: #888;
        font-style: italic;
        background: #f9f9f9;
        border-radius: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .community-container {
            padding: 0 15px;
        }
        
        .community-top {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .modal-box {
            width: 95%;
            height: 90vh;
        }
        
        .post-stats-header {
            display: none;
        }
        
        .reaction-buttons {
            justify-content: space-between;
        }
        
        .reaction-btn, .comment-btn {
            flex: 1;
            justify-content: center;
        }
    }
</style>

<?php include '../includes/footer.php'; ?>