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


//Get the information 

$user_id = 1; //  by default for guest 1

$party_size = $_GET['party_size'];
$filter_date = $_GET['filter_date'];
$zone = $_GET['zone'];
$allergen = $_GET['allergen_info'];
$price = $_GET['price_filter'];

//Insert the information into sql

$sql = "INSERT INTO Filters(user_id, party_size, filter_date, zone, allergen_info, price_filter)
VALUES (?,?,?,?,?,?)";//This values predef to avoid errors

//Statement conection to sql
$stmt = $conn -> prepare($sql);
//Statement bind with our values int, int, string, string, string, string.
$stmt -> bind_param("iissss", $user_id, $party_size, $filter_date, $zone, $allergen, $price);

//Check if was sucesfull or not

if($stmt -> execute())
{
  //If there is no error we redirect with the experience parameters              " . urlencode . " to show spaces in D1 & D3 etc"
  header("Location: experience.php?party_size=$party_size&filter_date=$filter_date&zone=".urlencode($zone) ."&allergen_info=$allergen&price_filter=$price");
  //Close
  exit();
}
else{
  echo "Some error ocurred " .$stmt -> error;
}
//Close connection
$stmt -> close();
$conn -> close();

?>