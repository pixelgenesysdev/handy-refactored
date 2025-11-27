// Extracted from: pages/affiliate.php

// Sample data object (you can replace with your own data)
  const affiliateData = {
    referralCode: "300FFDEC10BI",
    earnings: [
      { id: 1, name: "Smith Roy", description: "Lorem Lipsum", amount: 15, avatar: "https://randomuser.me/api/portraits/men/1.jpg" },
      { id: 2, name: "Smith Roy", description: "Lorem Lipsum", amount: 25, avatar: "https://randomuser.me/api/portraits/men/2.jpg" },
      { id: 3, name: "Smith Roy", description: "Lorem Lipsum", amount: 10, avatar: "https://randomuser.me/api/portraits/men/3.jpg" },
      { id: 4, name: "Smith Roy", description: "Lorem Lipsum", amount: 18, avatar: "https://randomuser.me/api/portraits/men/4.jpg" },
      { id: 5, name: "Smith Roy", description: "Lorem Lipsum", amount: 12, avatar: "https://randomuser.me/api/portraits/men/5.jpg" },
      { id: 6, name: "Smith Roy", description: "Lorem Lipsum", amount: 15, avatar: "https://randomuser.me/api/portraits/men/6.jpg" },
      { id: 7, name: "Smith Roy", description: "Lorem Lipsum", amount: 15, avatar: "https://randomuser.me/api/portraits/men/7.jpg" },
    ]
  };

  // Set referral code and total earnings
  const referralCodeEl = document.getElementById('referralCode');
  const totalEarningsEl = document.getElementById('totalEarnings');
  const earningsListEl = document.getElementById('earningsList');

  referralCodeEl.textContent = affiliateData.referralCode;

  const total = affiliateData.earnings.reduce((sum, e) => sum + e.amount, 0);
  totalEarningsEl.textContent = `$${total.toFixed(2)} Total Earnings`;

  // Render earnings list
  function renderEarnings() {
    earningsListEl.innerHTML = ''; // clear previous

    affiliateData.earnings.forEach(item => {
      const earningItem = document.createElement('div');
      earningItem.className = 'earning-item';

      earningItem.innerHTML = `
        <div class="avatar"><img src="${item.avatar}" alt="${item.name}" /></div>
        <div class="earning-info">
          <p class="earning-name">${item.name}</p>
          <p class="earning-desc">${item.description}</p>
        </div>
        <div class="earning-amount">$${item.amount}</div>
      `;

      earningsListEl.appendChild(earningItem);
    });
  }

  renderEarnings();

  // Copy referral code function
  function copyReferralCode() {
    const code = affiliateData.referralCode;
    navigator.clipboard.writeText(code).then(() => {
      alert('Referral code copied to clipboard!');
    }).catch(() => {
      alert('Failed to copy referral code.');
    });
  }

  // Example back arrow functionality (just alert here, you can replace with your logic)
  function goBack() {
    alert('Go back clicked!');
  }

  const withdrawButton = document.getElementById('withdrawButton');
  withdrawButton.addEventListener('click', () => {
    showPopup(
      'Withdrawal successful!',
      'delete',
      'Withdrawal',
      'OK',
      () => {
        window.location.reload();
      }
    );
  });