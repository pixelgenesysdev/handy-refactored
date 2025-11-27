<?php
include '../includes/head.php';
include '../includes/providerpage.php';
?>

<div class="logsbox">

    <div class="topbarInfo">
        <h2>Payment Log</h2>
        <div class="total-box">Total Earning $100</div>
    </div>

    <!-- Payment Card -->
    <div class="card">
        <div class="row"><span>Booking ID:</span> <b>#1234567</b></div>
        <div class="row"><span>Booking Date:</span> 08/07/2025</div>
        <div class="row"><span>Payment Date:</span> 08/07/2025</div>
        <div class="row"><span>Visit Amount:</span> $20.00</div>
        <div class="row"><span>Additional:</span> $20.00</div>
        <div class="row"><span>Commission:</span> $0.00</div>
        <div class="row"><span>Payment Amount:</span> <b>$40.00</b></div>
    </div>

    <div class="card">
        <div class="row"><span>Booking ID:</span> <b>#1234567</b></div>
        <div class="row"><span>Booking Date:</span> 08/07/2025</div>
        <div class="row"><span>Payment Date:</span> 08/07/2025</div>
        <div class="row"><span>Visit Amount:</span> $20.00</div>
        <div class="row"><span>Additional:</span> $20.00</div>
        <div class="row"><span>Commission:</span> $0.00</div>
        <div class="row"><span>Payment Amount:</span> <b>$40.00</b></div>
    </div>

    <div class="card">
        <div class="row"><span>Booking ID:</span> <b>#1234567</b></div>
        <div class="row"><span>Booking Date:</span> 08/07/2025</div>
        <div class="row"><span>Payment Date:</span> 08/07/2025</div>
        <div class="row"><span>Visit Amount:</span> $20.00</div>
        <div class="row"><span>Additional:</span> $20.00</div>
        <div class="row"><span>Commission:</span> $0.00</div>
        <div class="row"><span>Payment Amount:</span> <b>$40.00</b></div>
    </div>

</div>

<style>
.card .row * {
    width: fit-content;
}


/* Header bar with title and total */
.topbarInfo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #ececec;
    padding: 35px 0 15px;
}

.topbarInfo h2 {
    font-weight: 700;
    font-size: 24px;
    color: #222;
}

.total-box {
    background: #ff5a1f;
    color: white;
    padding: 10px 22px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 16px;
    box-shadow: 0 3px 8px rgba(255,90,31,0.3);
}

/* Each payment card */
.card {
    margin-top: 30px;
    padding: 22px 28px;
    background: #fafafa;
    border-radius: 14px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 3px 15px rgba(0,0,0,0.04);
}

/* Each row: label and value aligned horizontally */
.card .row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    font-size: 16px;
    color: #555;
    border-bottom: 1px solid #eaeaea;
}

/* Remove border from last row */
.card .row:last-child {
    border-bottom: none;
}

/* Label style */
.card .row span:first-child {
    font-weight: 600;
    color: #333;
}

/* Bold important values */
.card .row b {
    font-weight: 700;
    color: #ff5a1f;
}

/* Responsive styling */
@media (max-width: 768px) {

    .topbarInfo {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    .total-box {
        font-size: 14px;
        padding: 8px 16px;
    }
    .card {
        padding: 20px;
    }
}

/* On small screens stack label and value vertically */
@media (max-width: 480px) {
    .card .row {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
        font-size: 15px;
    }
    .card .row b {
        font-size: 16px;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
