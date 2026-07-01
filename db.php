<?php
$conn = new mysqli(
    "localhost",
    "lab",
    "Lab@123456",
    "labdb"
);

if ($conn->connect_error) {
    die("Connection failed");
}
?>
