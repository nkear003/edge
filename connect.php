<?php

/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= 'root';
$db_database	= 'edge'; 

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
//$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
//$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);


if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

?>