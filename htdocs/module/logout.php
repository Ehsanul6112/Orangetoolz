<?php
echo '<a href="?logout">Logout</a>';

if (isset($_GET['logout'])) {

    session_destroy();
    //Redirect to the admin dashboard
    header("Location: ../index.php");
    die();

};
?>