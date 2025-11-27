<?php
 include '../includes/head.php'; 
 include '../includes/providerpage.php'; ?>


<div class="bankdetailsBox">
    <div class="topbarwithbtn">
        <h2>My Bank Details</h2>
        <!-- <button class="add-btn btn btn-primary">Add Bank Details</button> -->
    </div>

    <div class="form-group">
        <label>Name</label>
        <input id="name" type="text" value="James Anderson" readonly>
    </div>

    <div class="form-group">
        <label>Card Number</label>
        <input id="card" type="text" value="111-222-333-444-555" readonly>
    </div>

    <div class="form-group">
        <label>Validity Date</label>
        <input id="validity" type="text" value="07/22" readonly>
    </div>
    <div class="form-group">
        <label>CVV</label>
        <input id="cvv" type="text" value="222" readonly>
    </div>

    <div class="btn-footer">
        <button id="editBtn" class="edit-btn">Edit Bank Details</button>
    </div>
</div>


<style>

    .topbarwithbtn { 
        margin-bottom: 20px;
    }


    .bankdetailsBox .form-group {
        margin-bottom: 20px;
    }

    .bankdetailsBox label {
        display: block;
        font-size: 14px;
        margin-bottom: 6px;
        color: #444;
    }

    .bankdetailsBox input {
        width: 100%;
        padding: 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
    }

    .bankdetailsBox input:read-only {
        background: #f9f9f9;
    }

    .bankdetailsBox .btn-footer {
        margin-top: 40px;
        text-align: center;
    }

    .bankdetailsBox .edit-btn {
        width: 250px;
        padding: 14px;
        border: none;
        background: var(--primary-color);
        color: #fff;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }

</style>


<script>
// Edit Button and Fields
const editBtn = document.getElementById("editBtn");
const fields = ["name", "card", "validity", "cvv"];

let isEditing = false;

editBtn.addEventListener("click", () => {

    if (!isEditing) {
        // ----------------------------
        // POPUP FOR EDITING PERMISSION
        // ----------------------------
        showPopup(
            "Are you sure you want to edit your bank details?",
            "delete",
            "Edit Bank Details",
            "Yes",
            () => {
                isEditing = true;

                fields.forEach(id => {
                    document.getElementById(id).readOnly = false;
                });

                editBtn.textContent = "Update";
            }
        );

    } else {
        // ----------------------------
        // POPUP FOR SAVING / UPDATING
        // ----------------------------
        showPopup(
            "Are you sure you want to update your bank details?",
            "delete",
            "Update Bank Details",
            "Yes",
            () => {
                isEditing = false;

                fields.forEach(id => {
                    document.getElementById(id).readOnly = true;
                });

                editBtn.textContent = "Edit Bank Details";
            }
        );
    }

});

</script>























<?php include '../includes/footer.php'; ?>
