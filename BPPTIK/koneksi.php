<?php
// $servername = "localhost";
// $username   = "klpfcyut_lowkerjateng";
// $password   = "halinaaverupus";
// $dbname     = "klpfcyut_lowkerjateng";

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "db_skkni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>