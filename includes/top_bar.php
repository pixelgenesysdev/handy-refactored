<div id="top-bar">
    <div class="logo_tpBar mobshow">
            <img src="../assets/images/logo.png" alt="Logo" />
        </div>
    <div class="inner">
            <div class="chat-icon">
                <i class="fa-regular fa-message" onclick="window.location.href='messages.php'" style="cursor: pointer;"></i>
            </div>
            <div class="mybookings-icon">
                <i class="fa-regular fa-calendar-days" onclick="window.location.href='allbookings.php'" style="cursor: pointer;"></i>
            </div>
            <div class="notification-icon">
                <i class="fa-regular fa-bell" onclick="window.location.href='notification.php'" style="cursor: pointer;"></i>
            </div>
            <div class="profile-image mobhide">
                <img src="../assets/images/avatar1.png" alt="User Profile"  onclick="window.location.href='user_setting.php'" style="cursor: pointer;" />
            </div>

            <div class="off_canvas mobshow">
                <i class="fa-solid fa-bars" id="navicon"></i>
            </div>

    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", () => {
    const navicon = document.getElementById("navicon");
    const sidebar = document.getElementById("sidebar");
    const topbar = document.getElementById("top-bar");

    if (window.matchMedia("(max-width: 768px)").matches) {
        topbar.classList.add("show");
    }

    navicon.addEventListener("click", () => {
        sidebar.classList.toggle("open");
    });
});


</script>
<!-- <div class="center-item search-bar">
            <input type="text" placeholder="Search League" id="search-input"/>
            <button id="search-icon"><i class="fa fa-search"  aria-hidden="true"></i></button>
        </div> -->   