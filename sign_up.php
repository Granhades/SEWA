<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/pp_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- This div works as a section defining a pop-up for user log-sign-up -->
    <div id="user_sign_up" class="popup_box">
        <form class="content" action="sign_up_class.php" method="post">
            <!-- Header section with a welcome message and close button -->
            <header>
                <h1>Join</h1>
                <a href="index.php"><button class="close_btn">×</button></a>
            </header>

            <!-- Fieldset for user input (name, last name, email and password), button to sign up and check box for legal terms -->
            <fieldset class="user_info">
                <label for="user_name">First Name</label>
                <input type="text" name="user_name" placeholder="First Name">

                <label for="user_last_name">Last Name</label>
                <input type="text" name="user_last_name" placeholder="Last Name">

                <label for="mail">Mail</label>
                <input type="text" name="user_mail" placeholder="Mail">

                <label for="user_pasword">Pasword</label>
                <input type="password" name="user_password" placeholder="Pasword">

                <?php if (isset($_GET['error'])) { ?>
                    <!-- set style for error -->
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                
                <button class="sign_up_btn" type="submit" name="new_sign_up_btn">Sign up</button>

                <!-- Check box for terms and conditions, with a link guiding to the terms and conditions -->
                <label for="terms-and-conditions">
                    <input id="terms-and-conditions" type="checkbox" required name="terms-and-conditions" /> I accept the <a href="https://www.google.com">terms and conditions</a>
                </label>
            </fieldset>
        </form>
    </div>
</body>

</html>
