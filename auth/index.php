<?php

$page_js = 'auth_indextest.js';
 include 'includes/header.php'; ?>


<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <h2>Connect with Us if you are Looking for Services Providers <br> and you are want to sell your Services</h2>
            <h3>Select One</h3>
            <div class="options">
                <div class="option" onclick="selectOption('Provider')" id="ProviderOption">
                <img src="./assets/img/owner-icon.png" alt="League Owner">
                <span>Service Provider</span>
                </div>
                <div class="option" onclick="selectOption('user')" id="userOption">
                <img src="./assets/img/user-icon.png" alt="User">
                <span>User</span>
                </div>
            </div>

            <button id="continueBtn" disabled class="btn btn-primary">Continue</button>
            <p class="bottom-link-txt">Already have an account! <a href="login.php">Sign In</a></p>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>
