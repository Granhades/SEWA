<?php
session_start();
if (!isset($_POST['filter_date'])) {
    header("Location: index.php");
    exit();
} 

$_SESSION['partySize']= $_POST['party_size'];
$_SESSION['expDate']= $_POST['filter_date'];
$_SESSION['zone']= $_POST['zone'];
$_SESSION['allergen']= $_POST['allergen_info'];
$_SESSION['price_filter']= $_POST['price_filter'];

header("Location: experiences.php");
exit();
?>