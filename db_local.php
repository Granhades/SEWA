<?php

//This file is just to check if the DB is connected or not when we migrate the project.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dublin_restaurants";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{
    echo "Connected sucessfully to the DB";
}
?>
