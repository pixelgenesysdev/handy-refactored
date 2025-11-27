// Extracted from: pages/notification.php

const notificationsData = [
    {
        id: 1,
        type: "star",  // or "info"
        title: "Lorem Ipsum Dolor",
        description: "Lorem Ipsum is simply dummy text of the printing and typesetting",
        timestamp: "29 Dec 2023 - 16:45 PM",
        status: "Read"
    },
    {
        id: 2,
        type: "info",
        title: "Lorem Ipsum Dolor Sit Amet",
        description: "Lorem Ipsum is simply dummy text of the printing and typesetting",
        timestamp: "29 Dec 2023 - 16:45 PM",
        status: "Read"
    },
    {
        id: 3,
        type: "info",
        title: "Lorem Ipsum Dolor Sit Amet",
        description: "Lorem Ipsum is simply dummy text of the printing and typesetting",
        timestamp: "29 Dec 2023 - 16:45 PM",
        status: "Unread"
    },
    {
        id: 4,
        type: "star",
        title: "Lorem Ipsum Dolor",
        description: "Lorem Ipsum is simply dummy text of the printing and typesetting",
        timestamp: "29 Dec 2023 - 16:45 PM",
        status: "Read"
    },
    {
        id: 5,
        type: "info",
        title: "Lorem Ipsum Dolor Sit Amet",
        description: "Lorem Ipsum is simply dummy text of the printing and typesetting",
        timestamp: "29 Dec 2023 - 16:45 PM",
        status: "Read"
    }
    ];

    const notificationsListEl = document.getElementById('notificationsList');
    const statusFilterEl = document.getElementById('statusFilter');

    function renderNotifications(filter = 'all') {
    notificationsListEl.innerHTML = '';

    const filteredNotifications = filter === 'all' ? notificationsData : notificationsData.filter(n => n.status === filter);

    filteredNotifications.forEach(notification => {
        const item = document.createElement('div');
        item.className = 'notification-item';
        item.dataset.id = notification.id;

        // Icon class based on type
        const iconClass = notification.type === 'star' ? 'star' : 'info';

        item.innerHTML = `
        <div class="notificationbox-icon ${iconClass}">
            ${notification.type === 'star' ? '★' : 'i'}
        </div>
        <h4 class="notification-title">${notification.title}</h4>
        <p class="notification-desc">${notification.description}</p>
        <div class="notification-timestamp">${notification.timestamp}</div>
        <div class="notification-delete" title="Delete Notification"><i class="fa fa-trash"></i></div>
        `;

        // Toggle delete button visibility on click
        item.addEventListener('click', () => {
        const currentlyRead = item.classList.contains('show-delete');
        // Hide all other delete buttons
        document.querySelectorAll('.notification-item.show-delete').forEach(el => el.classList.remove('show-delete'));
        // Toggle this one
        if (!currentlyRead) item.classList.add('show-delete');
        else item.classList.remove('show-delete');
        });

        // Delete notification on clicking trash icon
        item.querySelector('.notification-delete').addEventListener('click', (e) => {
            showPopup('Are you sure you want to delete this notification?', 'delete', 'Delete Notification', 'Yes', 
                () => {
                    const id = notification.id;
                    const idx = notificationsData.findIndex(n => n.id === id);
                    if (idx > -1) {
                        notificationsData.splice(idx, 1);
                        renderNotifications(statusFilterEl.value);
                    }
                }
            );
            e.stopPropagation(); // prevent toggle
            
        });

        notificationsListEl.appendChild(item);
    });

    }

    // Initial render
    renderNotifications();

    // Filter change
    statusFilterEl.addEventListener('change', (e) => {
    renderNotifications(e.target.value);
    });