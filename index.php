<?php 
    session_start();
    // check to see if secret cookie is set
    if (isset($_COOKIE['secret'])) {
        // if secret cookie is set, connect to database
        include 'connect.php';
        // set cookie_check variable
        $cookie_check = $_COOKIE['secret'];    
        $sql_check_cookie = "SELECT * FROM users WHERE cookie = '$cookie_check' ";
        $result_check_cookie = $link->query($sql_check_cookie);
        // check to see if secret cookie matches database
        if (!$row = mysqli_fetch_assoc($result_check_cookie)) {
            header("Location: login.php");
        } else if (!isset($_SESSION)) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['date'] = $row['dt'];
            header("Location: download.php");
        } else {
            header("Location: download.php");
        }
    } else {
        header("Location: login.php");
    }
    
?>