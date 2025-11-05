<?php
$page_css = 'pages_appointment_booking.css';
$page_js = 'pages_appointment_booking.js';
 include '../includes/head.php'; ?>


    <div class="topbarwithbtn">
        <h3 onclick="history.back()" style="cursor: pointer;"><i class="fa-solid fa-arrow-left"></i>Appointment Booking</h3>
    </div>

<div class="calendar-container">
  <div class="calendar-header">
    <button class="nav-btn" id="prevMonth">❮</button>
    <div class="month-year">
      <h2 id="monthName">September</h2>
      <p id="yearNum">2021</p>
    </div>
    <button class="nav-btn" id="nextMonth">❯</button>
  </div>

  <div class="calendar">
    <div class="day-names">
      <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
    </div>
    <div class="days" id="daysContainer"></div>
  </div>

  <div class="time-of-day">
    <h3>Time Of Day</h3>
    <div class="time-slot">
      <input type="checkbox" id="morning">
      <label for="morning">Morning (8am - 12pm)</label>
    </div>
    <div class="time-slot">
      <input type="checkbox" id="afternoon">
      <label for="afternoon">Afternoon (12pm - 5pm)</label>
    </div>
    <div class="time-slot">
      <input type="checkbox" id="evening">
      <label for="evening">Evening (5pm - 9:30pm)</label>
    </div>
  </div>
</div>

<button class="btn btn-primary" onclick="window.location.href='service_selection.php'">Next</button>



<?php include '../includes/footer.php'; ?>
