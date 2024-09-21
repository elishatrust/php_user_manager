<?php

$system_server = "localhost";
$system_user = "root";
$system_password = "gpitg";
$system_database = "php_user_manager";

$conn = new mysqli($system_server, $system_user, $system_password, $system_database);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

?>

