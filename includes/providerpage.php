<script>
    if (loginUser.loggedin === false) {
        window.location.href = "../auth/login.php";
        console.log('not logged in');
    }else if (loginUser.role != 'provider') {
        window.location.href = "../pages/myservices.php";
        console.log('permission Not Allowed');
    } else {
        console.log('logged in');
    }
</script>