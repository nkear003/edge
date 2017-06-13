<?php 
    session_start();
    include 'functions.php';
    include 'connect.php';
    require_once 'lib.php';

    //get values passed from login.php

    $username = $_POST['user'];
    $password = $_POST['pass'];
    
    //query the database for user
    
    $sql = "SELECT * FROM users WHERE usr='$username' AND pass='$password'";
    $result = $link->query($sql);
    
    //if there is no username and password in database, display error message and go back to index

    if (!$row = mysqli_fetch_assoc($result)) {
        echo 'Password or Username is incorrect<br><br>';
        echo '<a href="index.php">Try again</a>';
        header("Location: index.php");
    } else {
        
        // if there is a matching username and password in the database
        // Set session
        $_SESSION['name'] = $row['name'];
        $_SESSION['user'] = $row['usr'];
        $_SESSION['date'] = $row['dt'];
        $_SESSION['pass'] = $row['pass'];
        
        // ...and the Cookie
		$secret = ran( 30 );
        setcookie('secret', $secret, time() + 3600*24*14);
        
        // update cookie in database
        $sql_update_cookie = "UPDATE users SET cookie = '$secret' WHERE usr = '$username'";
        $link->query($sql_update_cookie);
        
        // display success message
//        echo 'Success';
        
        // go to downloads!
        header("Location: download.php");
    }    
?>