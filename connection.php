<?php
$servername = "thomasdearthomas.mysql.db";
$username = "thomasdearthomas";
$password = "Thomasdear2018";
$dbname = "thomasdearthomas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
