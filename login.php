<?php
session_start();

include_once "functions.php";
// define variables and set to empty values
$email = $password = $loginMsg = "";
$emailErr = $passwordErr = "";

// Server side validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Success create account, and 
    if (empty($emailErr) && empty($passwordErr)) {
        if (loginUser($email, $password)) {
            $loginMsg = "Successfully logged in.";
            $_SESSION["isLoggedIn"] = true;
        } else {
            $loginMsg = "Incorrect username/password.";
        }

    }

?>

<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>

    <h2>Account Login</h2>

    <form id="pokemonForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter your Account Information</Legend>
                    <div class="formElement">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="example@email.com" id="f-email" value="<?php echo $email ?>"/>
                        <span class="error"><?php echo $emailErr ?></span>
                    </div>
                    <div class="formElement">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="f-password"/>
                        <span class="error"><?php echo $passwordErr ?></span>
                    </div>
                    <div class="formElement">
                        <input type="submit">
                        <input type="reset">
                        <span class="error"><?php echo $loginMsg ?></span>
                    </div>
                </fieldset>
            </form>
</main>