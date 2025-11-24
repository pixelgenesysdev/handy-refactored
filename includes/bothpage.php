<script>
    if (!localStorage.getItem('handyUser')) {
        window.location.href = "../auth/login.php";
        console.log('not logged in');
    }
    else {
        console.log('logged in');
    }
</script>