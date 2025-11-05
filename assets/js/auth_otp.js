// Extracted from: auth/otp.php

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