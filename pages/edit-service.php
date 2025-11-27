<?php
$page_css = 'pages_myservices.css';
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div class="topbarwithbtn">
    <h3 onclick="history.back()" style="cursor:pointer;">
        <i class="fa-solid fa-arrow-left"></i> Edit Service
    </h3>
</div>

<div id="myServiceDetail">

    <!-- SEARCH SETTING -->
    <div class="section-box flex-between">
        <div class="desc">
            <strong>Search Setting*</strong>
            <p>If you want to appear in search results, keep the toggle on.</p>
        </div>
        <label class="toggle-switch">
            <input type="checkbox" id="searchToggle" checked  />
            <span class="toggle-slider"></span>
        </label>
    </div>

    <!-- VISIT CHARGES -->
    <div class="section-box">
        <strong>Visit Charges*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" id="visitAmount" value="10"  />

            <div class="label">Price on Profile:</div> 
            <input type="number" id="visitProfile" value="10"  />

            <div class="label">Commission:</div> 
            <input type="number" id="visitCommission" value="1"  />
        </div>
    </div>

    <!-- HOURLY RATE -->
    <div class="section-box">
        <strong>Hourly Rate*</strong>
        <div class="charges-grid">
            <div class="label">Amount:</div> 
            <input type="number" id="hourlyAmount" value="20"  />

            <div class="label">Price on Profile:</div> 
            <input type="number" id="hourlyProfile" value="20"  />

            <div class="label">Commission:</div> 
            <input type="number" id="hourlyCommission" value="2"  />
        </div>
    </div>

    <!-- DESCRIPTION -->
    <label class="input-label">Description</label>
    <textarea id="description" >My existing description...</textarea>

    <!-- IMAGE UPLOAD -->
    <label class="input-label">Upload Images</label>
    <input type="file" id="uploadImages" accept="image/*" multiple  />
    <div class="preview-images" id="previewImages">
        <img src="https://via.placeholder.com/150" />
        <img src="https://via.placeholder.com/150" />
    </div>

    <!-- RADIOS -->
    <label class="input-label">Radios</label>
    <input type="text" id="radios" value="Radio 1, Radio 2"  />

    <!-- CALENDAR -->
    <div class="calendar-container">
        <div class="calendar-header">
            <button class="nav-btn" id="prevMonth" >❮</button>
            <div class="month-year">
                <h2 id="monthName"></h2>
                <p id="yearNum"></p>
            </div>
            <button class="nav-btn" id="nextMonth" >❯</button>
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
    <!-- BUTTONS -->
    <div style="display:flex; gap:10px; margin-bottom:16px;">
        <button id="editBtn" class="primary-btn"  style="display:none;" >Edit</button>
        <button id="saveBtn" class="primary-btn">Save</button>
    </div> 

</div>

<?php include '../includes/footer.php'; ?>

<script>

// =========================
// DISABLE / ENABLE TOGGLE
// =========================
function setEditable(state) {
    const fields = document.querySelectorAll("#myServiceDetail input, #myServiceDetail textarea, #myServiceDetail button.nav-btn");

    fields.forEach(el => {
        if (!el.closest("div").contains(document.getElementById("editBtn"))) {
            el.disabled = !state;
        }
    });
}

window.onload = () => {
    setEditable(true);
};

document.getElementById("editBtn").onclick = () => {
    setEditable(true);
    document.getElementById("editBtn").style.display = "none";
    document.getElementById("saveBtn").style.display = "block";
};

document.getElementById("saveBtn").onclick = () => {
    setEditable(false);
    document.getElementById("editBtn").style.display = "block";
    document.getElementById("saveBtn").style.display = "none";
    showPopup(
        "Your changes have been saved successfully.",
        "success",
        "Changes Saved!",
        "Ok",
        () => {
            window.location.reload();
        }
       
        
    );
};

// =========================
// IMAGE PREVIEW
// =========================
document.getElementById("uploadImages").addEventListener("change", function () {
    const preview = document.getElementById("previewImages");
    preview.innerHTML = "";
    [...this.files].forEach(file => {
        let reader = new FileReader();
        reader.onload = e => {
            let img = document.createElement("img");
            img.src = e.target.result;
            preview.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
});

// =========================
// CALENDAR (EDIT VERSION)
// =========================
let year = new Date().getFullYear();
let month = new Date().getMonth();

let selectedDates = new Set([3, 7, 12, 19]); // example pre-selected

function renderCalendar() {
    const monthName = document.getElementById("monthName");
    const yearNum = document.getElementById("yearNum");
    const daysContainer = document.getElementById("daysContainer");

    monthName.textContent = new Date(year, month).toLocaleString("en-US", { month: "long" });
    yearNum.textContent = year;

    daysContainer.innerHTML = "";

    const firstDay = new Date(year, month, 1).getDay() || 7;
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const prevMonthDays = new Date(year, month, 0).getDate();

    for (let i = firstDay - 1; i > 0; i--) {
        const d = document.createElement("span");
        d.className = "outside";
        d.textContent = prevMonthDays - i + 1;
        daysContainer.appendChild(d);
    }

    for (let d = 1; d <= daysInMonth; d++) {
        const span = document.createElement("span");
        span.textContent = d;

        if (selectedDates.has(d)) span.classList.add("selected");

        span.onclick = () => {
            if (document.getElementById("uploadImages").disabled) return;

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

renderCalendar();

</script>


