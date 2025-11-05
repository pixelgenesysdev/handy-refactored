<?php
$host = $_SERVER['HTTP_HOST'];
$currentPage = basename($_SERVER['PHP_SELF']);

// Manually set the project folder path
$project_folder = '/wordpress_projects/handy-refactored/';

// Build the base URL
$base_url = "http://" . $host . $project_folder;

// Define constants for the site configuration
define('SITE_URL', $base_url);
define('SITE_NAME', 'Handy Refactor');
define('ADMIN_EMAIL', 'support@mfive.com');

?>
<script>
  const SITE_URL = "<?php echo SITE_URL; ?>";
</script>
