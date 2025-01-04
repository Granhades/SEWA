<?php
include "db_conn.php";
session_start();

$seenRest=implode(',', $_SESSION['seenRest']);

$partySize= $_SESSION['partySize'];
$expDate= $_SESSION['expDate'];
$zone= $_SESSION['zone'];
$allergen= $_SESSION['allergen'];
if ($_SESSION['price_filter'] === 'random'){
    $price= '';
} else {
    $price= 'and exp.price='.$_SESSION['price_filter'];
}

$sql= "SELECT rest.id restaurant_id, rest.name, rest.cusine, rest.rating, exp.price, image_link,						
rest.zone, rest.description, exp.starters, exp.main_courses, exp.drinks, exp. deserts, exp.duration	, exp.id exp_id						
FROM experience exp							
JOIN restaurants rest on rest.id = exp.restaurant_id							
WHERE rest.zone = '$zone' $price and rest.id NOT IN ($seenRest)			
ORDER BY RAND()							
LIMIT 1							";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <!-- header with menu nav -->
    <header>
        <!-- logo to comeback index-->
        <a href="index.php">
        <img src="images/FM_logo.png" alt="Feed me logo" class="logo">
        </a>
        <ul class="header_links">
			<li><a href="about.html">About us</a></li> 
            <li><a href="profile.php">Profile</a></li>
            <li><a href="log_in.php">Log In/Sign Up</a></li>
        </ul>
    <!-- Experience structure  -->
    <main>
      <!-- same class 'intro' from index -->
      <section class ="experience-intro">
        <!--Structure for filters selected by the user -->
        <h1><?php echo $row['price'] ?> euros or less</h1>
        <ul>
          <li><strong>Party Size: </strong><?php echo $partySize ?></li>
          <li><strong>Day: </strong><?php echo $expDate ?></li>
          <li><strong>Zone: </strong><?php echo $zone ?></li>
          <li><strong>Allergens: </strong><?php echo $allergen ?></li>
        </ul>
        <!-- change filters comeback to the menu -->
        <fieldset class ="change-filters">
        <!-- comeback button as <a> reference-->
          <button onClick="window.location.reload();" class ="change-experience-btn">Get other experience</button>
        </fieldset>
      </section>
      <!-- Experience summary part on the left side -->
      <section class="experience-summary">
        <h2>Experience summary</h2>
        <!-- Experience things -->
        <div class ="experience-details">
          <!-- About restaurants details -->
          <div class="restaurant-details">
            <!-- TODO: With PHP we should change after for variableS with restaurant-name, restaurant-rating, restaurant-type etc -->
            <h3 class="restaurant-name" name=""><?php echo $row['name'] ?></h3>
              
            <div class="food-type">
              <span class = "food-type"><strong>Food type:</strong> <?php echo $row['cusine'] ?></span>
            </div>
            <!--Description about info restaurant -->
            <p>
            <?php echo $row['description'] ?>
            </p>
            <!-- The list of the surprised items that we gonna offer for the prize -->
            <ul class ="items-included-order"> 
              <li class ="starters">Starters : <?php echo $row['starters'] ?> </li> 
              <li class ="main-course">Main courses : <?php echo $row['main_courses'] ?></li> 
              <li class ="drinks">Drinks : <?php echo $row['drinks'] ?></li> 
              <li class ="deserts">Desert : <?php echo $row['deserts'] ?></li> 
              <li class ="duration">Duration : <?php echo $row['duration'] ?> min</li> 
            </ul>
            <!-- Buttons for Book Now & Change Experience -->
            <form class="summary-buttons" action="pay_experience.php" method="post">
              <!--TODO: use PHP to link the pop up book now -->
              <button class ="book-now" name="book_now"> Book Now </button>
              <!--------------->
              <?php $_SESSION['expId']=$row['exp_id']; ?>
              <!--------------->
              <!-- Change Experience -->
              <button class ="change-experience" name="change_exp">Change Experience</button>
            </form>
            
          </div>

          <!--Right part about restaurant image, rating etc -->

          <!-- Image and Rating. Reuse the class from profile.html -->
          <div class="restaurant-card">
            <div class="rating-container">
              <span class ="rating"><strong>Rating </strong><?php echo $row['rating'] ?>⭐</span>
            </div>
            <div class="restaurant-picture">
              <img src="<?php echo $row['image_link'] ?>" alt="Restaurant image" title="Restaurant image">
            </div>

          </div>

        </div>
      </section>

    </main>



  </body>




</html>