<?php 
    session_start();
    session_destroy();
    if (isset($_COOKIE['secret'])) {
        setcookie("secret", "", time() - 3600*24*14);
    }
    header("Location: login.php");
?>
