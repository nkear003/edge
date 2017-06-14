<?php

////////////////////////////////////
// Check Cookies & redirect
////////////////////////////////////


// if cookie is set

if (isset($_COOKIE['secret'])) {
   
    // if cookie is set, connect to database & see if cookie is same as database
    
    include 'connect.php';
    $cookie_check = $_COOKIE['secret'];    
    $sql_check_cookie = "SELECT * FROM users WHERE cookie = '$cookie_check' ";
    $result_check_cookie = $link->query($sql_check_cookie);
    
    if (!$row = mysqli_fetch_assoc($result_check_cookie)) {
        
        // if there are no matching rows in database, go to login
        
        header("Location: login.php");
        
    } else if (!isset($_SESSION)) {
        
        // if cookie matches, and SESSION isn't set, set session and go to downloads page
        
        $_SESSION['name'] = $row['name'];
        $_SESSION['date'] = $row['dt'];
        header("Location: download.php");
        
    } else {
        
        // if cookie matches, and SESSION is set, go to downloads page
        
        header("Location: download.php");
        
    }
    
} else {
    
    // if cookie is not set, go to login
    
    header("Location: login.php");
}

?>