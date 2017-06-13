<?php 
session_start();
//include 'functions.php';
if (isset($_COOKIE['secret'])) {
    echo $_COOKIE['secret'];
} else {
    echo 'Secret cookie is not set';
}
?>
<html>
<head>
    <title>Login Page</title>  
    <?php include 'header.php' ?>
</head>
<body>
    <div id="form" class="section" style="text-align:center">
        <p>Welcome to <a href="http://steyoyoke.com/shop/"><b>Steyoyoke Edge</b></a>.
       <br/>Enjoy exclusive early access to our releases!
	<br/><br/>Please log in first.</p><br>
        <form action="process.php" method="POST" >
            <p>
                <label>Username:</label>
                <input type="text" name="user" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="pass" />
            </p>
            <p style="margin-top:15px">
                <input type="submit" value="Login" />
            </p>
        </form>
    </div>
    
    <div class="section" style="text-align:center">
        Not a member? <a href="http://steyoyoke.com/shop/product/steyoyoke-edge-1-year-subscription/" target="_self" alt="Steyoyoke Edge subscribe"><b>Join here!</b></a>
    </div>
    
<?php include 'footer.php'; ?>