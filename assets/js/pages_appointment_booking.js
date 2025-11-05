// Extracted from: pages/appointment_booking.php

// ==== CONFIGURATION ====
    const availableDates = {
    // YYYY-MM format: [list of active days]
    "2025-10": [2, 6, 15, 18, 24, 28],
    "2025-11": [3, 8, 14, 20, 27]
    };

    // ==== RENDER CALENDAR ====
    const daysContainer = document.getElementById('daysContainer');
    const monthName = document.getElementById('monthName');
    const yearNum = document.getElementById('yearNum');

    let currentDate = new Date(2025, 10, 1); // 1 October 2025

    function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);

    const startDay = (firstDay.getDay() + 6) % 7; // Adjust Mon=0
    const totalDays = lastDay.getDate();

    daysContainer.innerHTML = '';
    monthName.textContent = firstDay.toLocaleString('default', { month: 'long' });
    yearNum.textContent = year;

    // Days from previous month
    const prevLast = new Date(year, month, 0).getDate();
    for (let i = startDay - 1; i >= 0; i--) {
        const span = document.createElement('span');
        span.textContent = prevLast - i;
        span.classList.add('inactive');
        daysContainer.appendChild(span);
    }

    // Current month days
    const key = `${year}-${String(month + 1).padStart(2, '0')}`;
    const actives = availableDates[key] || [];
    for (let d = 1; d <= totalDays; d++) {
        const span = document.createElement('span');
        span.textContent = d;
        if (actives.includes(d)) {
        span.classList.add('active');
        span.addEventListener('click', () => selectDate(span));
        } else {
        span.classList.add('inactive');
        }
        daysContainer.appendChild(span);
    }

    // Next month filler
    const totalCells = daysContainer.children.length;
    const remaining = 42 - totalCells;
    for (let i = 1; i <= remaining; i++) {
        const span = document.createElement('span');
        span.textContent = i;
        span.classList.add('inactive');
        daysContainer.appendChild(span);
    }
    }

    // ==== DATE SELECTION ====
    function selectDate(el) {
    document.querySelectorAll('.days span.active').forEach(d => d.classList.remove('selected'));
    el.classList.add('selected');
    }

    // ==== MONTH NAVIGATION ====
    document.getElementById('prevMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
    });

    // ==== ONE TIME SLOT SELECTION ====
    const checkboxes = document.querySelectorAll('.time-slot input[type="checkbox"]');
    checkboxes.forEach(box => {
    box.addEventListener('change', () => {
        if (box.checked) {
        checkboxes.forEach(b => { if (b !== box) b.checked = false; });
        }
    });
    });

    renderCalendar();