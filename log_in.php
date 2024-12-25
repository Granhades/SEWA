<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/pp_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- This div works as a section defining a pop-up for user log-in -->
    <div id="user_log_in" class="popup_box">
        <form class="content" action="login_class.php" method="post">

            <!-- Header section with a welcome message and close button -->
            <header>
                <h1>Welcome back</h1>
                <a href="index.php"><button class="close_btn">×</button></a>
            </header>

            <!-- Fieldset for user input (email and password) and buttons -->
            <fieldset class="user_info">
                

                <label for="mail">Mail</label>
                <input type="email" id="mail" placeholder="Mail" name="user_mail">

                <label for="user_pasword">Pasword</label>
                <input type="password" id="user_pasword" placeholder="Pasword" name="user_password">
            
                <?php if (isset($_GET['error'])) { ?>
                    <!-- set style for error -->
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <!-- Buttons confrming  -->
                <button class="log_in_btn" type="submit" name="log_in_btn">Log in</button>
                <button class="new_sign_up_btn" type="submit" name="new_sign_up_btn">Sign up</button>

                  </label>
            </fieldset>

        </form>
    </div>
</body>

</html>
