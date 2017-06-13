<?php 
//include 'auth.php';
//include 'functions.php';
session_start();
//include 'connect.php';
//include 'auth.php';
$header = 'Steyoyoke Edge - Change Password';
include 'header.php';
?>
<div class="tabs second">
	<div class="tab files"><a href="download.php"><img src="img/upload.png" alt="" class="icon">My Releases</a></div>
	<div class="tab info active"><a href="details.php"><img src="img/info-inactive.png" alt="" class="icon"> Account Information</a></div>
	<div class="tab close"><a href="logout.php"></a></div>
</div>

<form action="details.php" method="POST" accept-charset="utf-8" class="section">
	<p>To change your name, fill this form:</p><br>
	<input type="text" name="new_name" placeholder="First name"/>
    &nbsp;&nbsp;&nbsp;Update name<br>
    <input type="text" name="new_username" placeholder="New username"/>
    &nbsp;&nbsp;&nbsp;Update username<br>
    <input type="text" name="new_email" placeholder="New email address"/>
    &nbsp;&nbsp;&nbsp;Update email<br><br>
    <input type="submit" name="submitted-info" value="Update" id="submit">
</form>
<form action="details.php" method="POST" accept-charset="utf-8" class="section">
	<p>To change your password, fill this form:</p><br>
	<input type="password" name="old_password" placeholder="Old Password"/>
    &nbsp;&nbsp;&nbsp;Old password
	<input type="password" name="new_password" placeholder="New Password"/>&nbsp;&nbsp;&nbsp;New password
	<input type="password" name="password_repeat" placeholder="New Password"/>&nbsp;&nbsp;&nbsp;Repeat<br><br>
	<input type="submit" name="submitted-pass" value="Change" id="submit">
</form>

<?php

if(isset($_POST['submitted-pass']) || (isset($_POST['submitted-info']))) {
    include 'connect.php';
}

if(isset($_POST['submitted-pass']))
{
    
    // if submit is pressed
    
    $password = $_SESSION['pass'];
    $username = $_SESSION['user'];
    
    $password_old = $_POST['old_password'];
    $password_new = $_POST['new_password'];
    $password_repeat = $_POST['password_repeat'];
    
    //update password
    
    $sql_update_password = "UPDATE users SET pass='$password_new' WHERE usr='$username'";

    if ($password <> $password_old || $password_repeat <> $password_new) {
        echo "your passwords do not match";
    }
    else if (mysqli_query($link, $sql_update_password))
    {
        echo "You have successfully changed your password.";
        $_SESSION['pass'] = $password_new;
    }
    
}

if(isset($_POST['submitted-info'])) 
{
    
    $password = $_SESSION['pass'];
    $username = $_SESSION['user'];
    
    // change name, username, and email, if they are entered in form
    
    $new_name = $_POST['new_name'];
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    
    if (isset($new_name) && !empty($new_name)) {
        $sql_update_name = "UPDATE users SET name='$new_name' WHERE usr='$username'";    
        $link->query($sql_update_name);
    }
    
    if (isset($new_username) && !empty($new_username)) {
        $sql_update_username = "UPDATE users SET usr='$new_username' WHERE usr='$username'";   
        $link->query($sql_update_username);
        $username = $new_username;
        $_SESSION['user'] = $username;
    }
    
    if (isset($new_email) && !empty($new_email)) {
        $sql_update_email = "UPDATE users SET email='$new_email' WHERE usr='$username'";   
        $link->query($sql_update_email);
        $username = $new_username;
        $_SESSION['user'] = $username;
    }

}

mysqli_close($link);

?>

<?php include 'footer.php'; ?>