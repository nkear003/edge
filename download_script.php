<?php
$download = $_POST['download'];
$path = './downloads/' . $download . '.zip'; // the file made available for download via this PHP file
header('Location: ' . $path);
?>