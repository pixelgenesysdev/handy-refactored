// Extracted from: pages/allbookings.php

const bookingData = [
      {
          id: '1234567',
          date: '08/07/2022',
          status: 'pending',
          price: 10,
          user: 'John Doe',
          phone: '111-111-111',
          email: 'john@gmail.com',
          address: '123 Maple Street, Springfield',
          service: 'General Cleaning',
          hourlyRate: 5,
          serviceDate: '08/07/2022',
          serviceTime: '11:00 AM'
      },
      {
          id: '555777',
          date: '10/10/2022',
          status: 'completed',
          price: 20,
          user: 'Jane Smith',
          phone: '222-222-222',
          email: 'jane@gmail.com',
          address: '456 Oak Avenue, Riverside',
          service: 'Deep Cleaning',
          hourlyRate: 15,
          serviceDate: '10/10/2022',
          serviceTime: '12:30 PM'
      },
      {
          id: '890234',
          date: '12/05/2022',
          status: 'assigned',
          price: 30,
          user: 'Michael Johnson',
          phone: '333-333-333',
          email: 'mikej@gmail.com',
          address: '789 Pine Street, Los Angeles',
          service: 'Plumbing Service',
          hourlyRate: 10,
          serviceDate: '12/05/2022',
          serviceTime: '03:00 PM'
      },
      {
          id: '678901',
          date: '15/08/2022',
          status: 'route',
          price: 25,
          user: 'Emily Davis',
          phone: '444-444-444',
          email: 'emilyd@gmail.com',
          address: '987 Elm Road, Chicago',
          service: 'Electrical Repair',
          hourlyRate: 12,
          serviceDate: '15/08/2022',
          serviceTime: '09:45 AM'
      },
      {
          id: '567123',
          date: '20/11/2022',
          status: 'pending',
          price: 18,
          user: 'Robert Wilson',
          phone: '555-555-555',
          email: 'robertw@gmail.com',
          address: '321 Birch Street, Houston',
          service: 'Carpet Cleaning',
          hourlyRate: 8,
          serviceDate: '20/11/2022',
          serviceTime: '02:15 PM'
      },
      {
          id: '789654',
          date: '28/12/2022',
          status: 'completed',
          price: 35,
          user: 'Sophia Brown',
          phone: '666-666-666',
          email: 'sophia@gmail.com',
          address: '654 Palm Ave, Miami',
          service: 'Painting Service',
          hourlyRate: 20,
          serviceDate: '28/12/2022',
          serviceTime: '10:00 AM'
      },
      {
          id: '998877',
          date: '02/01/2023',
          status: 'assigned',
          price: 40,
          user: 'David Miller',
          phone: '777-777-777',
          email: 'davidm@gmail.com',
          address: '222 Cedar Blvd, New York',
          service: 'Gardening Service',
          hourlyRate: 25,
          serviceDate: '02/01/2023',
          serviceTime: '04:45 PM'
      }
      ];

      const statusTextMap = {
        pending: "Status: Pending",
        completed: "Status: Completed Paid",
        assigned: "Assigned",
        route: "In - Route"
      };

      const topbarwithbtn = document.getElementById('topbarwithbtn');
      const bookingListEl = document.getElementById('bookingList');
      const searchInputEl = document.getElementById('searchInput');
      const bookingDetailEl = document.getElementById('bookingDetail');
      const backBtnbookingdetail = document.querySelector('.booking-detail #backBtn h3');
        const Newreviewform = document.querySelector('#newreviewform');
        const backBtnreviewform = document.querySelector('#newreviewform #backBtn h3');
        const backBtnreviewformUser = document.querySelector('#newreviewform h3 span#providername');


      // Render booking list
      function renderBookings(filter = '') {
        bookingListEl.innerHTML = '';
        const filteredBookings = bookingData.filter(b =>
            b.id.includes(filter) || b.user.toLowerCase().includes(filter.toLowerCase())
        );

        filteredBookings.forEach(booking => {
            const item = document.createElement('div');
            item.className = 'booking-item';
            item.innerHTML = `
            <div class="booking-left">
                <div class="booking-date">${booking.date}</div>
                <div class="booking-id">Booking ID: <strong>#${booking.id}</strong></div>
            </div>
            <div class="booking-right">
                <div class="booking-status ${booking.status}">${statusTextMap[booking.status]}</div>
            </div>
            `;
            item.addEventListener('click', () => showBookingDetail(booking));
            bookingListEl.appendChild(item);
        });
      }

      // Show booking detail
      function showBookingDetail(booking) {
      bookingListEl.classList.add('hidden');
      searchInputEl.classList.add('hidden');
      bookingDetailEl.classList.remove('hidden');
      topbarwithbtn.classList.add('hidden');

      document.getElementById('detailId').textContent = `#${booking.id}`;
      document.getElementById('detailStatus').textContent = statusTextMap[booking.status];
      document.getElementById('detailStatus').className = `${booking.status}`;
      document.getElementById('detailService').textContent = booking.service;
      document.getElementById('detailCharges').textContent = `$${booking.price}`;
      document.getElementById('detailRate').textContent = `$${booking.hourlyRate}`;
      document.getElementById('detailUser').textContent = booking.user;
      document.getElementById('detailPhone').textContent = booking.phone;
      document.getElementById('detailEmail').textContent = booking.email;
      document.getElementById('detailAddress').textContent = booking.address;
      document.getElementById('detailServiceDate').textContent = booking.serviceDate;
      document.getElementById('detailServiceTime').textContent = booking.serviceTime;
      document.getElementById('detailDate').textContent = booking.date;

        function openReviewPage(bookingId) {
          const newreviewform = document.getElementById('newreviewform');
          newreviewform.classList.remove('d-none');
          bookingDetailEl.classList.add('hidden');
          // You can set provider name dynamically if needed
          backBtnreviewformUser.textContent = booking.user;

        }

        if (booking.status === 'completed') {

            // 🧹 Remove existing review button if any
            const existingBtn = bookingDetailEl.querySelector('.review-btn');
            if (existingBtn) existingBtn.remove();

            // ➕ Create and append a fresh review button
            const reviewBtn = document.createElement('button');
            reviewBtn.textContent = 'Leave a Review';
            reviewBtn.className = 'review-btn btn btn-primary';
            reviewBtn.addEventListener('click', () => {
                openReviewPage(booking.id);
            });
            bookingDetailEl.appendChild(reviewBtn);
          } else {
            // remove review button if not a completed booking
            const existingBtn = bookingDetailEl.querySelector('.review-btn');
            if (existingBtn) existingBtn.remove();
          }

        




        if (booking.status === 'completed') {
          document.getElementById('detailStatus').classList.add('completed');
        } else if (booking.status === 'pending') {
            document.getElementById('detailStatus').classList.add('pending');
        } else if (booking.status === 'assigned') {
          document.getElementById('detailStatus').classList.add('assigned');
        } else if (booking.status === 'route') {
          document.getElementById('detailStatus').classList.add('route');
        }
      }

      // Back to list view
      backBtnbookingdetail.addEventListener('click', () => {
        bookingDetailEl.classList.add('hidden');
        bookingListEl.classList.remove('hidden');
        searchInputEl.classList.remove('hidden');
        topbarwithbtn.classList.remove('hidden');
      });
      // Back to list view
      backBtnreviewform.addEventListener('click', () => {
        Newreviewform.classList.add('d-none');
        bookingDetailEl.classList.remove('hidden');
      });

      // Search functionality
      searchInputEl.addEventListener('input', (e) => {
      renderBookings(e.target.value.trim());
      });

      // Initial render
      renderBookings();