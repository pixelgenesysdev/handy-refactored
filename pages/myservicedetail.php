<?php
$page_js = 'pages_myservices.js';
include '../includes/head.php';
?>

<div class="topbarwithbtn">
    <h3 onclick="history.back()" style="cursor:pointer;">
        <i class="fa-solid fa-arrow-left"></i> Services A
    </h3>
</div>

<!-- OUTER WRAPPER -->
<div id="myServiceDetail">

    <!-- EDIT / SAVE BUTTON -->
    <div style="display:flex; gap:10px; margin-bottom:16px;">
        <button id="editBtn" class="primary-btn">Edit</button>
        <button id="saveBtn" class="primary-btn" style="display:none;">Save</button>
    </div> 

    <!-- SEARCH SETTING -->
    <div class="section-box flex-between">
        <div class="desc">
            <strong>Search Setting*</strong>
            <p>If you want to appear in search results, keep the toggle on. If you want to take a break from offering the service, toggle it off.</p>
        </div>
        <label class="toggle-switch">
            <input type="checkbox" id="searchToggle" checked disabled />
            <span class="toggle-slider"></span>
        </label>
    </div>

    <!-- VISIT CHARGES -->
    <div class="section-box">
        <strong>Visit Charges*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" class="value" id="visitAmount" value="10" disabled />
            <div class="label">Price on Profile:</div> 
            <input type="number" class="value" id="visitProfile" value="10" disabled />
            <div class="label">Commission:</div> 
            <input type="number" class="value" id="visitCommission" value="0" disabled />
        </div>
    </div>

    <!-- HOURLY RATE -->
    <div class="section-box">
        <strong>Hourly Rate*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" class="value" id="hourlyAmount" value="10" disabled />
            <div class="label">Price on Profile:</div> 
            <input type="number" class="value" id="hourlyProfile" value="10" disabled />
            <div class="label">Commission:</div> 
            <input type="number" class="value" id="hourlyCommission" value="0" disabled />
        </div>
    </div>

    <!-- DESCRIPTION -->
    <label class="input-label">Description</label>
    <textarea id="description" disabled>Say Something...</textarea>

    <!-- UPLOAD IMAGES -->
    <div class="upload-images-container">
        <label class="input-label">Upload Images</label>
        <div class="upload-wrapper">
            <input type="file" id="uploadImages" accept="image/*" multiple disabled />
            <svg class="upload-icon" viewBox="0 0 24 24"><path d="M19 15v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-4M12 3v12m0 0l-4-4m4 4l4-4"/></svg>
        </div>
        <div class="preview-images" id="previewImages"></div>
    </div>

    <!-- RADIOS -->
    <label class="input-label">Radios</label>
    <input type="text" id="radios" placeholder="Enter radio's" disabled />

    <!-- CALENDAR -->
    <div class="calendar-container">
        <div class="calendar-header">
            <button class="nav-btn" id="prevMonth" disabled>❮</button>
            <div class="month-year">
                <h2 id="monthName">September</h2>
                <p id="yearNum">2021</p>
            </div>
            <button class="nav-btn" id="nextMonth" disabled>❯</button>
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
            <input type="checkbox" id="quickServiceToggle" disabled>
            <span class="toggle-slider"></span>
        </label>
    </div>

</div>

<?php include '../includes/footer.php'; ?>

<script>
    // =====================
    // EDIT / SAVE TOGGLE
    // =====================
    function setEditable(isEdit) {
        // Enable/disable all inputs and textarea and buttons inside #myServiceDetail except edit/save buttons
        const inputs = document.querySelectorAll("#myServiceDetail input:not(#editBtn):not(#saveBtn), #myServiceDetail textarea, #myServiceDetail button.nav-btn");
        inputs.forEach(el => el.disabled = !isEdit);
    }

    // Disable inputs on page load
    window.onload = () => {
        setEditable(false);
    };

    document.getElementById("editBtn").onclick = () => {
        document.getElementById("editBtn").style.display = "none";
        document.getElementById("saveBtn").style.display = "block";
        setEditable(true);
    };

    document.getElementById("saveBtn").onclick = () => {
        document.getElementById("editBtn").style.display = "block";
        document.getElementById("saveBtn").style.display = "none";
        setEditable(false);
        alert("Changes Saved!");
    };

    // =====================
    // IMAGE PREVIEW
    // =====================
    const uploadInput = document.getElementById("uploadImages");
    const previewContainer = document.getElementById("previewImages");

    uploadInput.addEventListener("change", function() {
        previewContainer.innerHTML = "";
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement("img");
                img.src = e.target.result;
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // =====================
    // CALENDAR LOGIC
    // =====================
    const daysContainer = document.getElementById("daysContainer");
    const monthName = document.getElementById("monthName");
    const yearNum = document.getElementById("yearNum");

    let year = 2021;
    let month = 8; // 0-based (8=September)
    const selectedDates = new Set([2, 6, 15, 18, 24, 28]);

    function renderCalendar() {
        daysContainer.innerHTML = "";
        monthName.textContent = new Date(year, month).toLocaleString("en-US", { month: "long" });
        yearNum.textContent = year;

        const firstDay = new Date(year, month, 1).getDay() || 7;
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const prevMonthDays = new Date(year, month, 0).getDate();

        // Previous month's days
        for (let i = firstDay - 1; i > 0; i--) {
            const d = document.createElement("span");
            d.className = "outside";
            d.textContent = prevMonthDays - i + 1;
            daysContainer.appendChild(d);
        }

        // Current month
        for (let d = 1; d <= daysInMonth; d++) {
            const span = document.createElement("span");
            span.textContent = d;
            if (selectedDates.has(d)) span.classList.add("selected");
            daysContainer.appendChild(span);
        }
    }

    document.getElementById("prevMonth").onclick = () => {
        if (document.getElementById("prevMonth").disabled) return;
        month--;
        if (month < 0) { month = 11; year--; }
        renderCalendar();
    };
    document.getElementById("nextMonth").onclick = () => {
        if (document.getElementById("nextMonth").disabled) return;
        month++;
        if (month > 11) { month = 0; year++; }
        renderCalendar();
    };
    daysContainer.onclick = (e) => {
        if (e.target.classList.contains("outside")) return;
        if (document.getElementById("daysContainer").closest("#myServiceDetail").querySelector("input,textarea").disabled) return; // prevent clicking if disabled
        const day = Number(e.target.textContent);
        if (selectedDates.has(day)) {
            selectedDates.delete(day);
            e.target.classList.remove("selected");
        } else {
            selectedDates.add(day);
            e.target.classList.add("selected");
        }
    };

    renderCalendar();

</script>

<style>
    /* RESPONSIVE STYLING */
    #myServiceDetail {
        font-family: Inter, sans-serif;
        color: #222;
        padding: 20px;
        max-width: 100%;
        width: 100%;
        min-width: 300px;
    }

    .primary-btn {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        background: #fa7026;
        color: #fff;
        font-weight: 700;
        border: none;
        cursor: pointer;
        margin: 10px 0;
    }

    .section-box {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 12px 16px;
        margin-bottom: 16px;
    }

    .flex-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .desc {
        width: 85%;
    }

    .input-label {
        font-weight: 600;
        margin: 30px 0px 7px;
        display: block;
    }

    #myServiceDetail textarea, #myServiceDetail input[type="text"], #myServiceDetail input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background-color: #fff;
        color: #222;
        transition: background-color 0.3s;
    }

    /* Disable inputs have a subtle grey background */
    #myServiceDetail input:disabled, #myServiceDetail textarea:disabled {
        background-color: #f9f9f9;
        color: #777;
        cursor: not-allowed;
    }

    .toggle-switch {
        position: relative;
        width: 42px;
        height: 22px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        border-radius: 20px;
        background: #ccc;
        transition: 0.3s;
    }

    .toggle-slider::before {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        left: 2px;
        top: 2px;
        border-radius: 50%;
        background: white;
        transition: 0.3s;
    }

    input:checked + .toggle-slider {
        background: #fa7026;
    }

    input:checked + .toggle-slider::before {
        transform: translateX(20px);
    }

    .charges-grid {
        display: grid;
        grid-template-columns: 120px 70px;
        gap: 4px;
        margin-top: 8px;
        align-items: center;
        justify-content: space-between;
    }

    .charges-grid .value {
        color: #fa7026;
        font-weight: 700;
        width: 70px !important;
        padding: 8px 6px !important;
        text-align: center;
        border-radius: 8px;
    }

    .upload-wrapper {
        position: relative;
    }

    .upload-icon {
        width: 20px;
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        fill: #fa7026;
        pointer-events: none;
    }

    .preview-images {
        display: flex;
        gap: 10px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .preview-images img {
        width: auto;
        height: 170px;
        border-radius: 6px;
        object-fit: cover;
    }

    .calendar-header {
        text-align: center;
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .nav-btn {
        border: 1px solid #fa7026;
        color: #fa7026;
        background: none;
        border-radius: 6px;
        width: 32px;
        height: 32px;
        cursor: pointer;
    }

    .nav-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .day-names, .days {
        display: grid;
        grid-template-columns: repeat(7,1fr);
        text-align: center;
        gap: 6px;
    }

    .days span {
        padding: 10px;
        border-radius: 6px;
        cursor: pointer;
    }

    .days span.selected {
        background: #fa7026;
        color: #fff;
    }

    .days span.outside {
        color: #aaa;
        pointer-events: none;
    }

    @media(max-width: 480px) {
        .flex-between {
            flex-direction:column;
            align-items: flex-start;
        }
    }

       .calendar-container {
        margin: 30px 0px;
        max-width: 510px;
        min-width: 300px;
        width: 100%;
    }
</style>


