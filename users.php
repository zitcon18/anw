<?php
include "db.php";

$result = $conn->query(
    "SELECT * FROM users"
);

while($row = $result->fetch_assoc())
{
    echo $row['username'];
    echo " - ";
    echo $row['password'];
    echo "<br>";
}
?>
