<?php
$hostname = "localhost"; 
$user = "root"; 
$password = "";
$dbname = "crud"; 

$conn = new mysqli($hostname, $user, $password, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
