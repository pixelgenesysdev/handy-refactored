
<?php
// Load environment variables from config.env
$envFile = __DIR__ . '/config.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // skip comments
        putenv(trim($line));
    }
}

// Get variables from ENV
$base_api_url = getenv('BASE_API_URL');
$site_name    = getenv('SITE_NAME');
$admin_email  = getenv('ADMIN_EMAIL');
$host = $_SERVER['HTTP_HOST'];
$currentPage = basename($_SERVER['PHP_SELF']);


// For DB connection (optional, future)
$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
$db_name = getenv('DB_NAME');

// Build site URL dynamically (like before)
$host = $_SERVER['HTTP_HOST'];
$project_folder = '/wordpress_projects/ezhandy/';
$base_url = "http://" . $host . $project_folder;

// Define constants
define('SITE_URL', $base_url);
define('SITE_NAME', $site_name);
define('ADMIN_EMAIL', $admin_email);
define('BASE_API_URL', $base_api_url);
?>

<script>
  const SITE_URL = "<?php echo SITE_URL; ?>";
  const BASE_API_URL = "<?php echo BASE_API_URL; ?>";

</script>
