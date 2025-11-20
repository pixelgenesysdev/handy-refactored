// Extracted from: auth/indextest.php

function selectOption(role) {

    const ProviderOption =document.getElementById('ProviderOption')
    const userOption =document.getElementById('userOption')
    const buttoncont = document.getElementById('continueBtn')

    let selectedRole = null;

    selectedRole = role;
    ProviderOption.classList.remove('selected');
    userOption.classList.remove('selected');

    if (role === 'Provider') {
      ProviderOption.classList.add('selected');
      buttoncont.addEventListener('click', () => {
        window.location.href = 'sign-up_provider.php'
      })
    } 
    else if (role === 'user') {
      userOption.classList.add('selected');
      buttoncont.addEventListener('click', () => {
        window.location.href = 'sign-up.php'
      })
    }

    buttoncont.disabled = false;
  }