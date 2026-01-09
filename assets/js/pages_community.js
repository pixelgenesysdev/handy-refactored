const FeedsContainer = document.getElementById("feedmaincontainer");
const Mypostfeed = document.getElementById("mypostfeed");

let activePostIndex = null;
let replyCommentIndex = null;


const feedData = [
  {
    id: 1,
    avatar: "https://i.pravatar.cc/40?img=13",
    user: "Tom Usher",
    time: "yesterday",
    text: "Gaming session was epic! 🎮",
    image: "https://i.pravatar.cc/800?img=13",
    likes: 173,
    dislikes: 14,
    userLiked: false,
Edit: true,
    userDisliked: true,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=63",
        user: "Mia Nelson",
        time: "5 minutes ago",
        text: "Great post!",
        likes: 20,
        dislikes: 3,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=39",
        user: "Bob Johnson",
        time: "30 minutes ago",
        text: "Great post!",
        likes: 19,
        dislikes: 2,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 2,
    avatar: "https://i.pravatar.cc/40?img=64",
    user: "Bob Johnson",
    time: "1 day ago",
    text: "Book recommendations anyone? 📚",
    image: "https://i.pravatar.cc/800?img=64",
    likes: 18,
    dislikes: 19,
    userLiked: true,
    userDisliked: false,
    comments: [],
  },
  {
    id: 3,
    avatar: "https://i.pravatar.cc/40?img=47",
    user: "Tom Usher",
    time: "2 days ago",
    text: "Travel goals! ✈️",
    image: "https://i.pravatar.cc/800?img=47",
    likes: 131,
    dislikes: 18,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=63",
        user: "Kara Lee",
        time: "3 hours ago",
        text: "This is gold!",
        likes: 20,
        dislikes: 5,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=18",
        user: "Leo Martin",
        time: "5 minutes ago",
        text: "Totally agree!",
        likes: 8,
        dislikes: 4,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=38",
        user: "Mia Nelson",
        time: "just now",
        text: "Awesome! 🔥",
        likes: 0,
        dislikes: 2,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 4,
        avatar: "https://i.pravatar.cc/30?img=42",
        user: "Alice Brown",
        time: "yesterday",
        text: "Couldn't agree more.",
        likes: 6,
        dislikes: 3,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 5,
        avatar: "https://i.pravatar.cc/30?img=42",
        user: "Jack King",
        time: "30 minutes ago",
        text: "Love this! ❤️",
        likes: 4,
        dislikes: 5,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 6,
        avatar: "https://i.pravatar.cc/30?img=20",
        user: "Jack King",
        time: "1 hour ago",
        text: "Thanks for sharing!",
        likes: 15,
        dislikes: 0,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 4,
    avatar: "https://i.pravatar.cc/40?img=37",
    user: "Leo Martin",
    time: "1 hour ago",
    text: "Morning vibes! 🌞",
    image: "",
    likes: 10,
    dislikes: 16,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=4",
        user: "Paul Quinn",
        time: "1 day ago",
        text: "Wow!",
        likes: 8,
        dislikes: 1,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=15",
        user: "Kara Lee",
        time: "5 minutes ago",
        text: "Totally agree!",
        likes: 15,
        dislikes: 5,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 5,
    avatar: "https://i.pravatar.cc/40?img=44",
    user: "Bob Johnson",
    time: "just now",
    text: "Loving the weather today! ☀️",
    image: "",
    likes: 122,
    dislikes: 14,
    userLiked: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=39",
        user: "Henry Ives",
        time: "just now",
        text: "This is gold!",
        likes: 17,
        dislikes: 1,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=14",
        user: "Alice Brown",
        time: "5 minutes ago",
        text: "Love this! ❤️",
        likes: 15,
        dislikes: 0,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=58",
        user: "Uma Vance",
        time: "just now",
        text: "Love this! ❤️",
        likes: 1,
        dislikes: 5,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 4,
        avatar: "https://i.pravatar.cc/30?img=16",
        user: "Mia Nelson",
        time: "yesterday",
        text: "Thanks for sharing!",
        likes: 3,
        dislikes: 3,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 5,
        avatar: "https://i.pravatar.cc/30?img=56",
        user: "Leo Martin",
        time: "5 minutes ago",
        text: "Haha so true!",
        likes: 4,
        dislikes: 5,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 6,
    avatar: "https://i.pravatar.cc/40?img=1",
    user: "Tom Usher",
    time: "3 hours ago",
    text: "Travel goals! ✈️",
    image: "https://i.pravatar.cc/800?img=1",
    likes: 115,
    dislikes: 4,
    userLiked: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=50",
        user: "Quinn Ross",
        time: "5 minutes ago",
        text: "Wow!",
        likes: 6,
        dislikes: 4,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=22",
        user: "Diana Evans",
        time: "30 minutes ago",
        text: "Love this! ❤️",
        likes: 20,
        dislikes: 1,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=29",
        user: "Uma Vance",
        time: "2 days ago",
        text: "Love this! ❤️",
        likes: 7,
        dislikes: 5,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 4,
        avatar: "https://i.pravatar.cc/30?img=47",
        user: "Jack King",
        time: "just now",
        text: "Nice one!",
        likes: 0,
        dislikes: 4,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 5,
        avatar: "https://i.pravatar.cc/30?img=29",
        user: "Olivia Parker",
        time: "30 minutes ago",
        text: "Awesome! 🔥",
        likes: 22,
        dislikes: 4,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 6,
        avatar: "https://i.pravatar.cc/30?img=33",
        user: "Rose Scott",
        time: "1 hour ago",
        text: "Thanks for sharing!",
        likes: 0,
        dislikes: 5,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 7,
    avatar: "https://i.pravatar.cc/40?img=11",
    user: "Diana Evans",
    time: "5 minutes ago",
    text: "Inspiration struck! 💡",
    image: "https://i.pravatar.cc/800?img=11",
    likes: 7,
    dislikes: 2,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=45",
        user: "Quinn Ross",
        time: "30 minutes ago",
        text: "Totally agree!",
        likes: 22,
        dislikes: 5,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=61",
        user: "Jack King",
        time: "2 days ago",
        text: "Couldn't agree more.",
        likes: 22,
        dislikes: 3,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=70",
        user: "Noah Oliver",
        time: "2 days ago",
        text: "Awesome! 🔥",
        likes: 0,
        dislikes: 1,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 4,
        avatar: "https://i.pravatar.cc/30?img=53",
        user: "Olivia Parker",
        time: "3 hours ago",
        text: "Wow!",
        likes: 19,
        dislikes: 2,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 8,
    avatar: "https://i.pravatar.cc/40?img=40",
    user: "Tom Usher",
    time: "3 hours ago",
    text: "Inspiration struck! 💡",
    image: "https://i.pravatar.cc/800?img=40",
    likes: 182,
    dislikes: 7,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=48",
        user: "Noah Oliver",
        time: "just now",
        text: "Couldn't agree more.",
        likes: 6,
        dislikes: 5,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=63",
        user: "Ivy Jones",
        time: "1 day ago",
        text: "Thanks for sharing!",
        likes: 16,
        dislikes: 2,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=57",
        user: "Sam Taylor",
        time: "2 days ago",
        text: "This is gold!",
        likes: 8,
        dislikes: 1,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 9,
    avatar: "https://i.pravatar.cc/40?img=49",
    user: "Frank Green",
    time: "30 minutes ago",
    text: "Nature walk was refreshing. 🌳",
    image: "https://i.pravatar.cc/800?img=49",
    likes: 16,
    dislikes: 20,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=14",
        user: "Paul Quinn",
        time: "yesterday",
        text: "Haha so true!",
        likes: 26,
        dislikes: 4,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 2,
        avatar: "https://i.pravatar.cc/30?img=67",
        user: "Charlie Davis",
        time: "30 minutes ago",
        text: "This is gold!",
        likes: 11,
        dislikes: 3,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 3,
        avatar: "https://i.pravatar.cc/30?img=59",
        user: "Ivy Jones",
        time: "30 minutes ago",
        text: "Great post!",
        likes: 23,
        dislikes: 3,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 4,
        avatar: "https://i.pravatar.cc/30?img=61",
        user: "Tom Usher",
        time: "yesterday",
        text: "Great post!",
        likes: 16,
        dislikes: 3,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 5,
        avatar: "https://i.pravatar.cc/30?img=18",
        user: "Tom Usher",
        time: "3 hours ago",
        text: "Totally agree!",
        likes: 27,
        dislikes: 0,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
      {
        id: 6,
        avatar: "https://i.pravatar.cc/30?img=18",
        user: "Leo Martin",
        time: "1 day ago",
        text: "Couldn't agree more.",
        likes: 8,
        dislikes: 0,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 10,
    avatar: "https://i.pravatar.cc/40?img=29",
    user: "Kara Lee",
    time: "1 day ago",
    text: "Nature walk was refreshing. 🌳",
    image: "https://i.pravatar.cc/800?img=29",
    likes: 11,
    dislikes: 14,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=41",
        user: "Henry Ives",
        time: "1 day ago",
        text: "Love this! ❤️",
        likes: 26,
        dislikes: 3,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  // ... (baqi 90 posts yahan hain, full JSON upar se copy kar lo kyunki bohot lamba hai)
];


const myPostsData = [
  {
    id: 101,
    avatar: "https://i.pravatar.cc/40?img=12",
    user: "John",
    time: "just now",
    text: "Working on something exciting! 🚀",
    image: "https://i.pravatar.cc/800?img=12",
    likes: 45,
    dislikes: 2,
    userLiked: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=33",
        user: "Leo Martin",
        time: "5 minutes ago",
        text: "Looks awesome!",
        likes: 6,
        dislikes: 0,
        userLiked: false,
Edit: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 102,
    avatar: "https://i.pravatar.cc/40?img=12",
    user: "John",
    time: "1 hour ago",
    text: "Coffee + code = perfect combo ☕💻",
    image: "",
    likes: 62,
    dislikes: 4,
    userLiked: true,
    userDisliked: false,
    comments: [],
  },
  {
    id: 103,
    avatar: "https://i.pravatar.cc/40?img=12",
    user: "John",
    time: "yesterday",
    text: "Weekend vibes 😌",
    image: "https://i.pravatar.cc/800?img=21",
    likes: 98,
    dislikes: 6,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=41",
        user: "Kara Lee",
        time: "2 hours ago",
        text: "Love this!",
        likes: 10,
        dislikes: 1,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
  {
    id: 104,
    avatar: "https://i.pravatar.cc/40?img=12",
    user: "John",
    time: "2 days ago",
    text: "Learning never stops 📚",
    image: "",
    likes: 34,
    dislikes: 1,
    userLiked: false,
Edit: true,
    userDisliked: false,
    comments: [],
  },
  {
    id: 105,
    avatar: "https://i.pravatar.cc/40?img=12",
    user: "John",
    time: "3 days ago",
    text: "Small progress is still progress 💪",
    image: "https://i.pravatar.cc/800?img=35",
    likes: 120,
    dislikes: 3,
    userLiked: true,
    userDisliked: false,
    comments: [
      {
        id: 1,
        avatar: "https://i.pravatar.cc/30?img=18",
        user: "Tom Usher",
        time: "1 day ago",
        text: "So true!",
        likes: 14,
        dislikes: 0,
        userLiked: true,
        userDisliked: false,
        replies: [],
      },
    ],
  },
];



function showMyPosts() {
    window.location.href = `${SITE_URL}pages/myposts.php`;
}

function createPost() {
  window.location.href = `${SITE_URL}pages/createpost.php`;
}

function AskPro() {
  showPopup(
    "Get expert help instantly.Make a payment to ask a Pro.",
    "pro",
    "$4.99/ 5 text messages",
    "Continue",
    () => {
      window.location.href = `${SITE_URL}pages/payment_methods.php`;
    }
  );
}



if (Mypostfeed) {


      
  function showPostMenu(postId) {
    const postMenu = document.getElementById(`post-menu-${postId}`);

    if (postMenu.classList.contains("d-none")) {
      postMenu.classList.remove("d-none");
    } else {
      postMenu.classList.add("d-none");
    }
  }

  function deletePost(postId) {

    showPopup("Are you sure you want to delete this post?", "delete","Delete Post",  "Yes, Delete",
      
      () => {
        setTimeout(() => {
          showPopup("Post deleted successfully!", "success","Delete Post",  "Ok",() => {
              const postElement = document.getElementById(`post${postId}`);
              postElement.remove();
            });
        }, 500);
      }

  )

  }

  function editPost(postId) {
    window.location.href = `${SITE_URL}pages/editpost.php?id=${postId}`;
  }



}




function renderPost(p, i) {
  return `
            <div class="card mb-3 border-2 border-gray-200 px-4 py-3 post card${i} " id="post${i}" style="border-radius: 20px;">

                <div class="post-header d-flex gap-2 align-items-center justify-content-between flex-col">
                    <div class="d-flex align-items-center flex-col gap-3">
                        <img src="${
                          p.avatar
                        }" class="user-avatar" width="65" style="border-radius: 500px;object-fit: cover;">
                        <div class="post-user-info">
                            <h4 class="user-name transform-capitalize mb-1" style="font-weight: bold;font-size: 25px;">${
                              p.user
                            }</h4>
                            <span class="time  mb-0">${p.time}</span>
                        </div>
                    </div>
                    <div class="relative" id="post-menu-actions-header">
                        <span>
                          <i class="fa-solid fa-ellipsis-vertical" style="cursor: pointer;" onclick="showPostMenu(${i})"></i>
                        </span>
                        <div id="post-menu-${i}" class="post-menu d-none">
                            <ul class="post-menu-list" style="display: flex;margin: 0; list-style: none; background: white;position: absolute; width: max-content;padding: 13px 20px;flex-direction: column;gap: 12px;border-radius: 14px;right: 34px;top: 64px;box-shadow: 0px 0px 13px 1px #56555570;">
                                <li onclick="editPost(${i})"  style="font-size: 16px;gap: 8px;display: flex;justify-content: flex-start; align-content: flex-start;align-items: center;cursor: pointer;"><i class="fa-solid fa-pen-to-square" style="font-size: 16px;"></i>Edit</li>
                                <li onclick="deletePost(${i})"  style="font-size: 16px;gap: 8px;display: flex;justify-content: flex-start; align-content: flex-start;align-items: center;cursor: pointer;"><i class="fa-solid fa-trash" style="font-size: 16px;"></i>Delete</li>
                            </ul>
                        </div>    
                    </div>
                </div>
                <div class="post-body pt-3">
                    <div class="post-actions d-flex flex-column gap-1">
                        <p class="post-text mb-1 mt-1" style="font-weight: bold;font-size: 20px;">${
                          p.text
                        }</p>
                        ${
                          p.image
                            ? `<img class="post-img mt-3 w-100" src="${p.image}" style="cursor: pointer;border-radius: 20px;" onclick="viewImage('${p.image}')">`
                            : ""
                        }
                    </div>
                    <div class="post-stats d-flex justify-content-between align-items-center mt-3 mb-1">
                            <span class="stat-item d-flex gap-1 align-items-center">
                                <img src="${SITE_URL}assets/images/posticonlikes.png" width="50">
                                <span id="likeCount${i}" style="font-weight:400;font-size:14px">
                                    ${p.likes}
                                </span>
                            </span>
                            <span class="stat-item d-flex gap-1 align-items-center" style="font-weight: bold;font-size: 20px;">
                                <span class="comment-count" style="font-weight:400;font-size:14px">${
                                  p.comments.length
                                } Comments</span>
                            </span>

                    </div>
                </div>
                <div class="post-footer border-top border-2 border-gray-200  pt-3">
                    <div class="post-stats d-flex justify-content-between align-items-center">
                        <div class="post-stats-header d-flex gap-3 align-items-center">
                            <span class="stat-item d-flex gap-1 align-items-center" style="font-weight: bold;font-size: 20px;">
                                <i class="fa-regular fa-thumbs-up ${
                                  p.userLiked ? "likeddone" : ""
                                }" id="likeIcon${i}" onclick="likePost(${i})"  aria-hidden="true" style="cursor: pointer; color: transparent;-webkit-text-stroke: 1px black;"></i>
                            </span>
                            <span class="stat-item d-flex gap-1 align-items-center" style="font-weight: bold;font-size: 20px;">
                                <i class="fa fa-thumbs-down ${
                                  p.userDisliked ? "likeddone" : ""
                                }"    id="dislikeIcon${i}"    onclick="dislikePost(${i})"  aria-hidden="true" style="cursor: pointer; color: transparent;-webkit-text-stroke: 1px black;"></i>
                            </span>
                            
                        </div>
                        <div class="post-actions d-flex gap-3">
                        <span class="stat-item d-flex gap-1 align-items-center" style="font-weight: bold;font-size: 20px;">
                                <i class="fa fa-comment-dots" aria-hidden="true" onclick="openComments(${i})" style="cursor: pointer; color: transparent;-webkit-text-stroke: 1px black;"></i>
                                <span class="comment-count" style="font-weight:400;font-size:16px">Comments</span>
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
            `;
}

function LikePost(i) {
  if (feedData[i].userLiked) {
    feedData[i].likes--;
    feedData[i].userLiked = false;
  }
}

function viewImage(imageUrl) {
  window.open(imageUrl, "_blank");
}

function likePost(i) {
  const post = feedData[i];
  const likeCount = document.getElementById(`likeCount${i}`);
  const likeIcon = document.getElementById(`likeIcon${i}`);
  const dislikeIcon = document.getElementById(`dislikeIcon${i}`);

  if (post.userLiked) {
    post.likes--;
    post.userLiked = false;
    likeIcon.classList.remove("likeddone");
  } else {
    post.likes++;
    post.userLiked = true;
    likeIcon.classList.add("likeddone");

    if (post.userDisliked) {
      post.dislikes--;
      post.userDisliked = false;
      dislikeIcon.classList.remove("likeddone");
    }
  }

  likeCount.innerText = post.likes;
}

function dislikePost(i) {
  const post = feedData[i];

  const likeIcon = document.getElementById(`likeIcon${i}`);
  const dislikeIcon = document.getElementById(`dislikeIcon${i}`);
  const likeCount = document.getElementById(`likeCount${i}`);

  if (post.userDisliked) {
    post.dislikes--;
    post.userDisliked = false;
    dislikeIcon.classList.remove("likeddone");
  } else {
    post.dislikes++;
    post.userDisliked = true;
    dislikeIcon.classList.add("likeddone");

    if (post.userLiked) {
      post.likes--;
      post.userLiked = false;
      likeIcon.classList.remove("likeddone");
      likeCount.innerText = post.likes;
    }
  }
}



function openComments(postIndex) {
  activePostIndex = postIndex;
  renderComments();
  new bootstrap.Modal(document.getElementById("commentModal")).show();
}



function likeComment(ci) {
  const comment = feedData[activePostIndex].comments[ci];

  if (comment.userLiked) {
    comment.likes--;
    comment.userLiked = false;
  } else {
    comment.likes++;
    comment.userLiked = true;

    if (comment.userDisliked) {
      comment.dislikes--;
      comment.userDisliked = false;
    }
  }
  renderComments();
}

function dislikeComment(ci) {
  const comment = feedData[activePostIndex].comments[ci];

  if (comment.userDisliked) {
    comment.dislikes--;
    comment.userDisliked = false;
  } else {
    comment.dislikes++;
    comment.userDisliked = true;

    if (comment.userLiked) {
      comment.likes--;
      comment.userLiked = false;
    }
  }
  renderComments();
}

function replyToComment(ci, username) {
  replyCommentIndex = ci;
  const input = document.getElementById("commentInput");
  input.placeholder = `Reply to ${username}...`;
  input.focus();
}

function addComment() {
  const input = document.getElementById("commentInput");
  if (!input.value.trim()) return;

  const newComment = {
    avatar: "https://i.pravatar.cc/30",
    user: "You",
    text: input.value,
    likes: 0,
    dislikes: 0,
    userLiked: false,
Edit: true,
    userDisliked: false,
    replies: [],
  };

  if (replyCommentIndex !== null) {
    // ADD AS CHILD REPLY
    feedData[activePostIndex].comments[replyCommentIndex].replies.push(
      newComment
    );

    replyCommentIndex = null;
    input.placeholder = "Write comment...";
  } else {
    // ADD AS NORMAL COMMENT
    feedData[activePostIndex].comments.unshift(newComment);
  }

  input.value = "";
  renderComments();
}




function showAllPosts(container, data) {
  container.innerHTML = data
    .map((p, i) => renderPost(p, i))
    .join("");
}


function myPostsDatafunc(container, data) {
  container.innerHTML = data
                  .map((p, i) => renderPost(p, i))
                  .join("");
}


function renderComments() {
  const list = document.getElementById("commentList");
  list.innerHTML = "";

  feedData[activePostIndex].comments.forEach((c, ci) => {
    list.innerHTML += `
                <div class="card mb-2 border-0 shadow-sm" style="border-radius:16px;">
                    <div class="card-body p-3">

                        <div class="d-flex gap-2">
                            <img src="${c.avatar}" width="40" height="40"
                                class="rounded-circle">

                            <div class="w-100">
                                <strong>${c.user}</strong>
                                <p class="mb-1 text-muted" style="font-size:14px;">
                                    ${c.text}
                                </p>

                                <div class="d-flex gap-4" style="font-size:13px;">
                                    <span onclick="likeComment(${ci})"
                                        style="cursor:pointer;">
                                        👍 ${c.likes}
                                    </span>

                                    <span onclick="dislikeComment(${ci})"
                                        style="cursor:pointer;">
                                        👎 ${c.dislikes}
                                    </span>

                                    <span onclick="replyToComment(${ci}, '${
      c.user
    }')"
                                        class="text-muted"
                                        style="cursor:pointer;">
                                        Reply
                                    </span>
                                </div>

                                <!-- REPLIES -->
                                ${c.replies
                                  .map(
                                    (r) => `
                                    <div class="d-flex gap-2 mt-3 ms-4">
                                        <img src="${r.avatar}" width="32" height="32"
                                            class="rounded-circle">
                                        <div>
                                            <strong>${r.user}</strong>
                                            <p class="mb-0 text-muted"
                                            style="font-size:13px;">
                                            ${r.text}
                                            </p>
                                        </div>
                                    </div>
                                `
                                  )
                                  .join("")}
                            </div>
                        </div>

                    </div>
                </div>
                `;
  });
}

if (FeedsContainer) {
  showAllPosts(FeedsContainer, feedData);
      const postmenuactionsheader = document.querySelectorAll('#post-menu-actions-header')
        postmenuactionsheader.forEach(el => {
        el.classList.add("d-none");
      });

}

if (Mypostfeed) {
  myPostsDatafunc(Mypostfeed, myPostsData);
}

