 <?php include 'includes/header.php'; ?>



<div class="col-md-6 firstcol align-items-center d-flex p-0 text-center justify-content-center">
    <div class="firstcol-wrapper">
        <div class="firstcol-box">
            <img src="./assets/img/forgot-icon.png" alt="forgot-icon" class="forgot-icon">
            <h2>OTP!</h2>
             <p>Please check your email for verification code.
                Your code is 6 digit in length.</p>
             
                <form>
                <div class="otp-inputs">
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                </div>
                <div class="timer">Code expires in <strong id="timer">00:30s</strong></div>
                </form>
                <button id="continueBtn" type="submit" class="btn btn-primary" onclick="  window.location.href = 'reset-password.php'" >Continue</button>
                <div class="resend">
                Didn't get code? <a href="otp.php" class="disabled" >Resend Code</a>
                </div>


            
        </div>
    </div>
</div>

  <script>
    // Countdown timer
    let timeLeft = 30;
    const timerDisplay = document.getElementById("timer");
    const resund_button = document.querySelector('.resend a');


    
    const countdown = setInterval(() => {
      timeLeft--;
      timerDisplay.textContent = `00:${timeLeft.toString().padStart(2, '0')}s`;
      if (timeLeft <= 0) clearInterval(countdown);
    }, 1000);

    setTimeout(() => {
        resund_button.classList.remove('disabled');
        resund_button.href = "#";
    }, 30000);








       // Auto move to next input
    const inputs = document.querySelectorAll('.otp-inputs input');

    inputs.forEach((input, index) => {
      input.addEventListener('input', () => {
        const value = input.value;
        if (value.length === 1 && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === "Backspace" && input.value === "" && index > 0) {
          inputs[index - 1].focus();
        }
      });
    });
  </script>



<?php include 'includes/footer.php'; ?>







