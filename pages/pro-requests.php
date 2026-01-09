<?php
include '../includes/head.php'; 
include '../includes/providerpage.php';
?>
<script>
function acceptRequest(btn) {
    showPopup(
        'Are you sure you want to accept this job request?',
        'pro',
        'Confirm Acceptance',
        'Accept',
        () => {
            setTimeout(() => {
                showPopup(
                    'Job request accepted successfully.',
                    'success',
                    'Accepted',
                    'OK',
                    () => {
                        // Remove card after accept
                        btn.closest('.card').remove();
                    }
                );
            }, 400);
        }
    );
}

function rejectRequest(btn) {
    showPopup(
        'Are you sure you want to reject this job request?',
        'delete',
        'Confirm Rejection',
        'Reject',
        () => {
            setTimeout(() => {
                showPopup(
                    'Job request has been rejected.',
                    'success',
                    'Rejected',
                    'OK',
                    () => {
                        // Remove card after reject
                        btn.closest('.card').remove();
                    }
                );
            }, 400);
        }
    );
}
</script>

<div id="reviewsPage" class="container my-4">

    <!-- Top Bar -->
    <div class="d-flex align-items-center mb-4">
        <h3 onclick="history.back()" style="cursor: pointer;">
            <i class="fa-solid fa-arrow-left me-2"></i> Pro Requests
        </h3>
    </div>

    <!-- Requests Wrapper -->
    <div class="row g-3">

        <?php
        // Example dynamic data (replace with DB result)
        $requests = [
            ['title' => 'You Have A New Job Request', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            ['title' => 'You Have A New Job Request', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            ['title' => 'You Have A New Job Request', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.']
        ];

        foreach ($requests as $request) {
        ?>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        <?= $request['title']; ?>
                    </h5>

                    <p class="card-text text-muted">
                        <?= $request['desc']; ?>
                    </p>

                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <button class="btn btn-primary w-100" onclick="acceptRequest(this)">
                                Accept
                            </button>
                        </div>
                        <div class="col-12 col-md-6">
                            <button class="btn btn-primary black w-100" onclick="rejectRequest(this)">
                                Reject
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<?php include '../includes/footer.php'; ?>
