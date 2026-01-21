<?php
$page_js = 'pages_messages.js';
 include '../includes/head.php'; 
 include '../includes/bothpage.php';
?>





<div id="messagesPage">

    <div class="topbarwithbtn withbackbutton">
        <h3 onclick="">
           Messages
        </h3>
        <button class="btn btn-primary black" onclick="window.location.href='<?php echo SITE_URL; ?>pages/pro-chats.php'">
           Pro Chats
        </button>
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



<?php include '../includes/footer.php'; ?>
