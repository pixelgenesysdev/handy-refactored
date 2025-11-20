<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$page_js = 'pages_messages.js';
 include '../includes/head.php'; ?>

<div id="messagesPage">

    <div class="topbarwithbtn withbackbutton">
        <h3 onclick="history.back()" style="cursor: pointer;">
            <i class="fa-solid fa-arrow-left"></i> Messages
        </h3>
    </div>

    <div class="messaging-section">
        <div class="chat-wrapper">
            <!-- Sidebar -->
            <div class="sidebar">
                <input type="text" placeholder="Search..." class="search-bar" onkeyup="searchContacts(this.value)">
                <div class="contact-list"></div>
            </div>

            <!-- Chat Area -->
            <div class="chat-area">
                <div class="chat-header"></div>
                <div class="messages"></div>
                <div class="input-area">
                    <input type="text" placeholder="Type message..." class="message-input">
                    <button class="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- SCRIPT -->





<?php include '../includes/footer.php'; ?>
