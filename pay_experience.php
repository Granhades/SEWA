<?php
if (!isset($_POST['expId'])) {
    header("Location: index.php");
    exit();
} 

include "db_conn.php";
session_start();

$expId= $_POST['expId'];
$partySize= $_POST['partySize'];
$expDate= $_POST['expDate'];

$sql= "SELECT rest.name, exp.price, rest.zone, rest.address, rest.phone						
FROM experience exp							
JOIN restaurants rest on rest.id = exp.restaurant_id							
WHERE exp.id = 	$expId ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/pp_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- This div works as a section defining a pop-up for paying experiences -->
    <div id="pay_experience" class="popup_box">
        <form class="content" action="pay_class.php" method="post">
            <!-- Header section with a welcome message and close button -->
            <header>
                <h1> Confirm Experience</h1>
                <a href="index.php"><button class="close_btn">×</button></a>
            </header>

            <!-- Section containing a fieldset for user input (name and email) and button to pay experience and on the other side displays info of the experience about to be purchased -->
            <section class="book"> 
                <fieldset class="reservation_info">
                    <p>Please Log In!</p>
                    <label for="user_mail">Mail</label>
                    <input type="email" id="user_mail" placeholder="Mail for reservation" name="user_mail">
                    
                    <label for="password">Mail</label>
                    <input type="password" id="password" placeholder="Password" name="user_password">
                    
                    <?php if (isset($_GET['error'])) { ?>
                    <!-- set style for error -->
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <button class="pay_btn">Pay</button>
                </fieldset>
                <!-- Section about experience info in detail -->
                <section class="experience_info">
                    <h2><?php echo $row['name'] ?></h2>
                    <p>Date: <?php echo $expDate ?></p>
                    <p>Adress: <a href="https://www.google.com/maps" target="_blank"><?php echo $row['address'] ?></a></p>
                    <p>Party size: <?php echo $partySize ?></p>
                    <p>Price per person: <?php echo $row['price'] ?>€</p>
                    <h3> TOTAL: <?php echo $partySize*$row['price']?>€</h3>
                    <?php $fullInfo= $row['name'].";Adress: ".$row['address'].";Party size: ".$partySize.";Price per person: ".$row['price'].";Total :".($partySize*$row['price'])."€"; ?>
                    
                    <input type="hidden" name="fullInfo" value="<?php echo  $fullInfo; ?>">
                    <input type="hidden" name="expId" value="<?php echo  $expId; ?>">
                </section>
            </section>
        </form>
    </div>
</body>

</html>
