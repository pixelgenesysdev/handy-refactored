<?php
$page_css = 'pages_contact.css';
 include '../includes/head.php'; ?>

<div id="AboutgPage">

  <div class="topbarwithbtn">
    <h3>Contact Us</h3>
  </div>
  <form action="contact.php" method="post" class="needs-validation modern-form" novalidate>
    <div class="row g-4">
      <!-- First Name -->
      <div class="col-md-6">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
        <div class="invalid-feedback">Please enter your first name.</div>
      </div>

      <!-- Last Name -->
      <div class="col-md-6">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
        <div class="invalid-feedback">Please enter your last name.</div>
      </div>

      <!-- Email -->
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>

      <!-- Phone Number -->
      <div class="col-md-6">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9+ ]{8,15}" required>
        <div class="invalid-feedback">Please enter a valid phone number.</div>
      </div>

      <!-- Subject / Message -->
      <div class="col-12">
        <label for="subject" class="form-label">Subject</label>
        <textarea class="form-control" id="subject" name="subject" rows="5" placeholder="Enter your message..." required></textarea>
        <div class="invalid-feedback">Please enter a message.</div>
      </div>

      <!-- Submit -->
      <div class="col-12 mt-4">
        <button type="submit" name="submit" class="btn-modern btn btn-primary">Submit</button>
      </div>
    </div>
  </form>

</div>

<?php include '../includes/footer.php'; ?>


