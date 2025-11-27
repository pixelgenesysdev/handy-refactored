<?php
$page_css = 'pages_myservices.css';
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div class="topbarwithbtn">
    <h3 onclick="history.back()" style="cursor:pointer;">
        <i class="fa-solid fa-arrow-left"></i> Create Service
    </h3>
</div>

<div id="myServiceDetail">

    <!-- SEARCH SETTING -->
    <div class="section-box flex-between">
        <div class="desc">
            <strong>Search Setting*</strong>
            <p>Enable to appear in search results.</p>
        </div>
        <label class="toggle-switch">
            <input type="checkbox" id="searchToggle" checked />
            <span class="toggle-slider"></span>
        </label>
    </div>

    <!-- VISIT CHARGES -->
    <div class="section-box">
        <strong>Visit Charges*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" id="visitAmount" />

            <div class="label">Price on Profile:</div> 
            <input type="number" id="visitProfile" />

            <div class="label">Commission:</div> 
            <input type="number" id="visitCommission" />
        </div>
    </div>

    <!-- HOURLY RATE -->
    <div class="section-box">
        <strong>Hourly Rate*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" id="hourlyAmount" />

            <div class="label">Price on Profile:</div> 
            <input type="number" id="hourlyProfile" />

            <div class="label">Commission:</div> 
            <input type="number" id="hourlyCommission" />
        </div>
    </div>

    <!-- DESCRIPTION -->
    <label class="input-label">Description</label>
    <textarea id="description" placeholder="Write something..."></textarea>

    <!-- IMAGE UPLOAD -->
    <label class="input-label">Upload Images</label>
    <input type="file" id="uploadImages" accept="image/*" multiple />
    <div class="preview-images" id="previewImages"></div>

    <!-- RADIOS -->
    <label class="input-label">Radios</label>
    <input type="text" id="radios" placeholder="Enter radios" />

    <!-- CALENDAR -->
    <div class="calendar-container">
        <div class="calendar-header">
            <button class="nav-btn" id="prevMonth">❮</button>
            <div class="month-year">
                <h2 id="monthName"></h2>
                <p id="yearNum"></p>
            </div>
            <button class="nav-btn" id="nextMonth">❯</button>
        </div>

        <div class="day-names">
            <span>Mon</span><span>Tue</span><span>Wed</span>
            <span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
        </div>

        <div class="days" id="daysContainer"></div>
    </div>
    <!-- QUICK SERVICE -->
    <div class="section-box flex-between">
        <div>
            <strong>Wants To Give Quick Service?</strong>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <label class="toggle-switch">
            <input type="checkbox" id="quickServiceToggle" >
            <span class="toggle-slider"></span>
        </label>
    </div>
    <!-- BUTTON -->
    <button class="primary-btn" id="createBtn">Create</button>

</div>

<?php include '../includes/footer.php'; ?>

<script>

// =====================
// IMAGE UPLOAD PREVIEW
// =====================
document.getElementById("uploadImages").addEventListener("change", function () {
    const preview = document.getElementById("previewImages");
    preview.innerHTML = "";
    [...this.files].forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            let img = document.createElement("img");
            img.src = e.target.result;
            preview.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
});

// =====================
// CALENDAR FULL WORKING
// =====================
let year = new Date().getFullYear();
let month = new Date().getMonth();
const selectedDates = new Set();

const monthName = document.getElementById("monthName");
const yearNum = document.getElementById("yearNum");
const daysContainer = document.getElementById("daysContainer");

function renderCalendar() {
    monthName.textContent = new Date(year, month).toLocaleString("en-US", { month: "long" });
    yearNum.textContent = year;

    daysContainer.innerHTML = "";

    const firstDay = (new Date(year, month, 1).getDay()) || 7;
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const prevMonthDays = new Date(year, month, 0).getDate();

    for (let i = firstDay - 1; i > 0; i--) {
        let s = document.createElement("span");
        s.textContent = prevMonthDays - i + 1;
        s.className = "outside";
        daysContainer.appendChild(s);
    }

    for (let d = 1; d <= daysInMonth; d++) {
        let span = document.createElement("span");
        span.textContent = d;

        if (selectedDates.has(d)) span.classList.add("selected");

        span.onclick = () => {
            if (selectedDates.has(d)) {
                selectedDates.delete(d);
                span.classList.remove("selected");
            } else {
                selectedDates.add(d);
                span.classList.add("selected");
            }
        };

        daysContainer.appendChild(span);
    }
}

document.getElementById("prevMonth").onclick = () => {
    month--;
    if (month < 0) { month = 11; year--; }
    renderCalendar();
};

document.getElementById("nextMonth").onclick = () => {
    month++;
    if (month > 11) { month = 0; year++; }
    renderCalendar();
};
 
renderCalendar();

// ========================
// CREATE BUTTON ACTION
// ========================
document.getElementById("createBtn").onclick = () => {
    showPopup(
        "Service added successfully",
        "success",
        "Successfully Added",
        "OK",
        () => { window.location.href = "<?php echo SITE_URL; ?>pages/myservices.php"; }
    );
};

</script>

