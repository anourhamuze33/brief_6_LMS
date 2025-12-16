<?php

$servername =  "localhost";
$username = "root";
$password = "";
$database = "certification";
$conn = new mysqli($servername, $username, $password, $database);

if($conn-> connect_errno){
    die("Connection failed: " . $conn-> connect_error);
}
?>