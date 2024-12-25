<?php
session_start();
include "db_conn.php";

//function to close profile if user log out by clickig button 
if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 

    // Redirect to login page or homepage
    header("Location: login.php");
    exit();
}


if (isset($_SESSION['user_id'])) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic links .css etc -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
    <!-- header with logo and nav  -->
    <div class="header-bar">
        <!-- logo as button to comeback to index -->
        <div class="logo">
            <a href="index.php">
                <img src="images/FM_logo.png" alt="Logo" class="logo-image">
            </a>
        </div>
        <!-- nav with links -->
        <nav>
            <a href="about.html">About us</a>
            <a href="log_in.php">Log in / Sign up</a>
        </nav>
    </div>

    <!-- Profile (Container left part)  -->
    <div class="container">
        <aside class="sidebar">
            <!-- Inputs to fill the profile -->
            <div class="profile-section">
                <h2>Profile</h2>
                <p>Edit data</p>
                <form method="post">
                    <p>Name: </p><input type="text" placeholder="<?php echo $_SESSION['first_name']; ?>">
                    <p>Last name:  </p><input type="text" placeholder="<?php echo $_SESSION['last_name']; ?>">
                    <p>Mail: </p><input type="email" placeholder="<?php echo $_SESSION['user_email']; ?>">
                    <p>Password:  </p><input type="password" placeholder="********">
                    <button type="submit">Save</button>
                    <button type="submit" name="logout">Log Out</button>
                </form>
            </div>
        </aside>
        <!-- Previews (Container middle part)  -->
        <main class="content">
            
            <h2 >Wellcome <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?>!</h2><br>
            
            <h3>Past experiences</h3><br>
            <section class="restaurant">

                <!-- QUERY to get all past restaurants -->
                <?php
                $user_id= $_SESSION['user_id'];

                $sql= "						
                SELECT 							
                rest.name reataurant_name, rest.rating, rest.image_link , rest.cusine, bookings.date													
                FROM bookings							
                JOIN users on bookings.user_id = users.id							
                JOIN experience exp on bookings.experience_id = exp.id							
                JOIN restaurants rest on rest.id = exp.restaurant_id							
                WHERE bookings.user_id = '$user_id'							";

                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <article class="restaurant-info">
                        <h4>Restaurant: <?php echo $row['reataurant_name']; ?></h4>
                        <p>Date: <?php echo $row['date']; ?></p>
                        <p>Rating: <?php echo $row['rating']; ?>⭐</p>
                        <p>Food type: <?php echo $row['cusine']; ?></p>
                        <img class="restaurant-image" style="background-image: url(<?php echo $row['image_link']; ?>);">
                    </article>
                    
                <?php }

                ?>

            </section>
        </main>
         <!-- Recommendations from other users (Right Upper-Part)  -->
        <section class="activity-recommendations">
            <!-- Restaurants names -->
            <section class="activity-history">
                <h3>Recently Visited Restaurants</h3>
                <ul>
                    <li>
                        <p>Acapulco</p>
                        <span>mexican Cuisine</span>
                    </li>
                    <li>
                        <p>Las Tapas de Lola</p>
                        <span>Spanish Cuisine</span>
                    </li>
                    <li>
                        <p>Sultan's Grill</p>
                        <span>Turkish Cuisine</span>
                    </li>
                </ul>
            </section>

             <!-- Top Restaurants (Right Lower-Part)  -->
            <section class="featured-restaurants">
                <!-- Restaurants info (restaurant-name)(rating)(image) -->
                <h3>Top Popular Restaurants</h3>
                <div class="restaurant-card">
                    <img src="images/mexican.jpg" alt="Restaurant 1">
                    <p>Acapulco</p>
                    <span>⭐⭐⭐⭐⭐</span>
                </div>
                <div class="restaurant-card">
                    <img src="images/spanish.jpg" alt="Restaurant 2">
                    <p>Las Tapas de Lola</p>
                    <span>⭐⭐⭐⭐⭐</span>
                </div>
                <div class="restaurant-card">
                    <img src="images/turkish.jpg" alt="Restaurant 3">
                    <p>Sultan's Grill</p>
                    <span>⭐⭐⭐⭐⭐</span>
                </div>
            </section>
        </section>
    </div>
</body>
</html>
<?php
} else {
    header("Location: log_in.php?error=Incorrect Mail and/or Password");
    exit();
}

?>