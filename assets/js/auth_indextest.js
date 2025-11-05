// Extracted from: auth/indextest.php

function selectOption(role) {
    let selectedRole = null;
    selectedRole = role;
    document.getElementById('leagueOption').classList.remove('selected');
    document.getElementById('userOption').classList.remove('selected');

    if (role === 'league') {
      document.getElementById('leagueOption').classList.add('selected');
    } else {
      document.getElementById('userOption').classList.add('selected');
    }
    const button = document.getElementById('continueBtn')
    button.disabled = false;
  }