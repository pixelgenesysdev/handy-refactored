<?php
$page_js = 'auth_indextest.php.js';
 include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <h2>Connect with Music Lovers <br>Around You!</h2>
            <h3>Select One</h3>
            <p>Are you a league owner? Then click “League Owner”.<br>
                If you’re a user then click “User”</p>
            <div class="options">
                <div class="option" onclick="selectOption('league')" id="leagueOption">
                <img src="./assets/img/owner-icon.png" alt="League Owner">
                <span>League Owner</span>
                </div>
                <div class="option" onclick="selectOption('user')" id="userOption">
                <img src="./assets/img/user-icon.png" alt="User">
                <span>User</span>
                </div>
            </div>

            <button id="continueBtn" disabled class="btn btn-primary" onclick="  window.location.href = 'welcome.php'">Continue</button>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>
