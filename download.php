<?php
session_start();
include 'functions.php';
include 'header.php';
?>

<div class="tabs">
	<div class="tab files active"><a href="index.php"><img src="img/upload.png" alt="" class="icon">My Releases</a></div>
	<div class="tab info"><a href="details.php"><img src="img/info-inactive.png" alt="" class="icon">Account Information</a></div>
	<div class="tab close"><a href="logout.php"></a></div>
</div>
<div class="section">
	<?php 
    echo 'Welcome, ' . $_SESSION['name'] . ' below are your available downloads.'; 
    ?>  
</div>

<?php

////////////////
// Dates
////////////////

$from_date = $_SESSION['date'];
$years_of_subscription = $_SESSION['years'];
$to_date = date('Y-m-d', strtotime('+' . $years_of_subscription . 'year', strtotime($from_date)) );
//echo $to_date;

////////////////
//SQL code to get songs between dates
////////////////

$sql = "SELECT * FROM songs WHERE released BETWEEN '" . $from_date .  "' AND '" . $to_date . "' ";
$result = $link->query($sql); 

////////////////
// start table
////////////////

echo "<table>";
echo "<tr>
        <th>Catalogue</th>
        <th>Artist</th>
        <th>Name</th>
        <th>Release Date</th>
        <th>Download</th>
    </tr>";

////////////////
//output results to query
////////////////

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["catalogue"] . "</td><td>" . $row["artist"] . "</td><td>" . $row["name"] . "</td><td>" . $row["released"] . "</td><td>" . "<form action='download_script.php' method='POST'>
            <button name='download' value='" . $row["catalogue"] . "'>Download</button>
        </form></td></tr>";
    }
}

////////////////
// end table
////////////////

echo "</table>";

////////////////
//close connection
////////////////

//$link->close();          

?>

<?php include 'footer.php'; ?>