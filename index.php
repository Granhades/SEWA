<?php
session_start();
$_SESSION['seenRest']= array(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Basic links about css and title page  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Mee</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Header -->
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
    </header>



    
    <main> <!--Briefly introduction about us and restaurant photo -->
        <section class="intro">
            <h1>Feed Me</h1>
            <p>Ready to spice up your nights out? Discover unforgettable food and drink experiences at local spots near you—perfect for solo adventures, fun with friends, or date nights. Explore unique venues with live music, cozy atmospheres, and curated menus, all in one place. Dive into new experiences confidently with insights on ambiance, prices, and what to expect. Your next favorite night out is just a click away!</p>
        </section>
            <!-- Photo about pub -->
        <section class="mni">
            <img src="images/tryOne.jpg" alt="Pubs and food images">
        </section>
            <!-- Lower part with all the Filters (People)(Date)(Location)(Allergens)  -->
        <h2>Use Filters To Get The Experience That You Are Waiting For</h2>
        <!--PHP to manage the info about filters -->
        <form action = "experiences.php" method ="post">
            <fieldset class="dd_filters">
                <!-- 'party_size' that we named the label as People  -->
                <label for="party_size">
                    <img src="images/User.png" alt="Image about how many people" class="people-icon">People
                </label> <!-- party_size options -->
                <select id="party_size" name="party_size">
                    <option value="1">1 Person</option>
                    <option value="2">2 People</option>
                    <option value="3">3 People</option>
                    <option value="4">4 People</option>
                    <option value="5">5 People</option>
                    <option value="6">6 People</option>
                    <option value="7">7 People</option>
                    <option value="8">8 People</option>
                    <option value="9">9 People</option>
                    <option value="10">10 People</option>
                    <option value="11">11 People</option>
                    <option value="12">12 People</option>
        
                    </select>

                <!-- filter date with calendar and icon -->
                <label for="date">
                    <img src="images/calendar.png" alt="Image about calendar" class="calendar-icon">Day
                </label> <!--  change the name of label to Day  -->
                <input type="date" id="date" name="filter_date" min="<?php date('Y-m-d'); ?>"  required>
                
                
                <!-- filter for location, icon and options  -->
                <label for="zone">
                    <img src="images/location.png" alt="Icon about location" class="location-icon"> Zone
                </label>
                <select id="zone" name="zone">
                    <option value="D1 & D3">D1 & D3</option>
                    <option value="D2 & D4">D2 & D4</option>
                    <option value="D5 & D7">D5 & D7</option>
                    <option value="D6 & D8">D6 & D8</option>
                    <option value="D9 & D11">D9 & D11</option>
                    <option value="D10 & D12">D10 & D12</option>
                    <option value="D13 & D15">D13 & D15</option>
                    <option value="D14 & D16">D14 & D16</option>
                    <option value="D17 & D19">D17 & D19</option>
                    <option value="D18 & D20">D18 & D20</option>
                </select>
                
                <!-- filter for allergenes  -->
                <label for="allergenes">
                    <img src="images/allergy.png" alt="Icon about allergenes" class="allergenes-icon"> Allergenes
                </label>
                <select id="allergenes" name="allergen_info">
                    <option value="none">None</option>
                    <option value="gluten">Gluten</option>
                    <option value="nuts">Nuts</option>
                    <option value="fish">Fish</option>
                    <option value="vegan">Vegan</option>
                </select>
            </fieldset>
                <!-- end of the filters  -->
            <!-- lower part about buttons experience (15)(20)(30)(random) -->
            <fieldset class="price_buttons">
                <button type="submit" name="price_filter" value="15">15€</button>
                <button type="submit" name="price_filter" value="20">20€</button>
                <button type="submit" name="price_filter" value="30">30€</button>
                <button type="submit" name="price_filter" value ="random">Random</button>

            </fieldset>
           
        </form>

    </main>
</body>
</html>
