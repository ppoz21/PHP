<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kmk_poznan";

// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Błędne połączenie do bazy!");
}

$conn->set_charset('utf8');

/*echo "Connected successfully";*/
?>
