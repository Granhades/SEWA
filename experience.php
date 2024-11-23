<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dublin_restaurants";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Get back the information about filters

$party_size = $_GET['party_size'] ?? null;
$filter_date = $_GET['filter_date'] ?? null;
$zone = $_GET['zone'] ?? null;
$allergen = $_GET['allergen_info'] ?? null;
$price = $_GET['price_filter'] ?? null;


//sql queries
$sql = "SELECT * FROM Restaurant WHERE price_range <= ? AND zone = ?"; //TODO: Change to improve
//define statement -> stmt is connection + sql
$stmt = $conn -> prepare($sql);
//bind (integer string)
$stmt -> bind_param("is", $price, $zone);
//start the statement
$stmt -> execute();
$result = $stmt -> get_result();

//Declare a variable to store the possibles restaurantes that meet the requirements
$restaurants = [];


//If meets the requirements with filters we add in our array
while($row = $result -> fetch_assoc()){
  $restaurants[] = $row;
}

//random restaurant selected
$random_restaurant = "";

if(!empty($restaurants)) //If restaurant is not empty
{
  $random_index = array_rand($restaurants);
  $random_restaurant = $restaurants[$random_index];

  //Declare variables inside of the random restaurant selectes
  $name = $random_restaurant['name'];       //Restaurant name
  $address = $random_restaurant['address']; //Adress
  $cuisine = $random_restaurant['cuisine']; //Type of food
  $rating = $random_restaurant['rating'];  //Rating
}


//Price filter by button selected

$title = "";

//15 or less
if($price == "15"){
  $title = "15 euros or less";
}
//20 or less
else if($price == "20")
{
  $title = "20 euros or less";
}
//30 or less
else if($price == "30")
{
  $title = "30 euros or less";
}
else if($price == "random")
{
  $options = [15, 20, 30];
  //Select random between 15,20,30
  $random_option = $options[array_rand($options)];
  $title = "$price euros or less";
 
}
//random




//Close connections

$stmt -> close();
$conn -> close();

?>



<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
    <link href="styles/experience.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <!-- header with menu nav -->
    <header> <!-- -->
      <nav>
        <div class="logo"> <!-- we use the logo to comeback to menu -->
          <a href="index.html">
            <img src="images/FM_logo.png" alt="Logo" class="logo-image">
          </a>    
        </div>
        <!--Header links -->
        <div class="header-links">
          <ul>
            <li><a href="about.html">About us</a></li>  <!-- about -->
            <li><a href="profile.html">Profile</a></li> <!-- profile-->
          </ul>
        </div>
      </nav>
    </header>
    <!-- 15 euros or less structure  -->
    <main>
      <!-- same class 'intro' from index -->
      <section class ="intro">
        <!--Structure for filters selected by the user -->
        <h1><?php echo $title?></h1>
        <ul>
          <li><strong>Party Size: </strong><?php echo $party_size ?></li> <!-- Party size entered in filter!-->
          <li><strong>Day: </strong><?php echo $filter_date?></li> <!-- Day !-->
          <li><strong>Zone: </strong><?php echo $zone?></li> <!-- Zone !-->
          <li><strong>Allergens: </strong><?php echo $allergen?></li><!-- Allergen !-->
        </ul>
        <!-- change filters comeback to the menu -->
        <fieldset class ="change-filters">
        <!-- comeback button as <a> reference-->
          <a href="index.html" name="changeFilters">Change Filters</a>
        </fieldset>
      </section>
      <!-- Experience summary part on the left side -->
      <section class="experience-summary">
        <h2>Experience summary</h2>
        <!-- Experience things -->
         <?php if($random_restaurant): ?> <!-- If they have a random restaurant -->
          <div class ="experience-details">
            <!-- About restaurants details -->
            <div class="restaurant-details">
              <!-- TODO: With PHP we should change after for variableS with restaurant-name, restaurant-rating, restaurant-type etc -->
              <h3 class="restaurant-name" name=""><?php echo $name?></h3>
                
              <div class="food-type">
                <span class = "food-type"><strong>Food type:</strong> <?php echo $cuisine ?></span>
              </div>
              <!--Description about info restaurant -->
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nisl porttitor, volutpat velit in, condimentum ligula. In lacinia luctus orci ut ornare. Mauris et magna tortor. Sed pulvinar velit enim, quis volutpat nibh dictum ac. Donec in lacus pellentesque, aliquet massa a, cursus ipsum. Proin commodo dui non tortor cursus elementum. Suspendisse imperdiet efficitur lacus, nec ultricies neque sodales nec. In hac habitasse platea dictumst.

                Sed a leo tempus, blandit nisl eu, hendrerit leo. Sed ac sapien ut turpis lacinia facilisis. Phasellus id mauris ut magna sollicitudin varius sit amet tincidunt orci. Aenean imperdiet ullamcorper laoreet. Duis dignissim ipsum a velit imperdiet tempus. Cras dictum arcu nec euismod faucibus. Suspendisse pretium felis quis gravida finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque fringilla quam non interdum lobortis. In hac habitasse platea dictumst. Donec elementum fermentum purus, sit amet placerat sem molestie in. Praesent eget arcu sit amet mauris maximus euismod et non tortor. Pellentesque sodales libero nibh, ut condimentum arcu feugiat nec.
              </p>
              <!-- The list of the surprised items that we gonna offer for the prize -->
              <!--TODO: include the variables to php about main course drinks etc-->
              <ul class ="items-included-order"> 
                <li class ="starters">Starters : 1 </li> 
                <li class ="main-course">Main courses : 1</li> 
                <li class ="drinks">Drinks : 2</li> 
                <li class ="deserts">Any Desert? No</li> 
                <li class ="duration">Duration : 60 min</li> 
              </ul>
              <!-- Buttons for Book Now & Change Experience -->
              <fieldset class="summary-buttons">
                <!--TODO: use PHP to link the pop up book now -->
                <button class ="book-now" name=""> <a href="pay_experience.html"> Book Now </a></button>
                <!-- Change Experience -->
                <a href="index.html" class ="change-experience" name="changeExperience">Change Experience</a>

              </fieldset>
              
            </div>

            <!--Right part about restaurant image, rating etc -->

            <!-- Image and Rating. Reuse the class from profile.html -->
            <div class="restaurant-card">
              <div class="rating-container">                  <!-- Rating round depending of stars -->
                <span class ="rating"><strong>Rating </strong><?php echo str_repeat('⭐', round($rating)); ?></span>
              </div>
              <div class="restaurant-picture">
                <img src="images/spanish.jpg" alt="Spanish restaurant picture" title="Las Tapas de Lola">
              </div>

            </div>
          </div>
        <?php else:?>
          <p>There is no restaurants with your criteria please try again</p>
        <?php endif;?>
    </section>

    </main>



  </body>




</html>