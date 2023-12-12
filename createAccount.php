<?php

include_once "functions.php";
// define variables and set to empty values
$name = $email = $password = $successMsg = "";
$nameErr = $emailErr = $passwordErr = "";

// Server side validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check for only letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check for only letters and whitespace
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Must be in the format user@example.com";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // check for length
        if (strlen($password) < 4) {
            $passwordErr = "Passwords must be at least 4 characters long";
        }
    }

    // Success create account, and 
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        if (!checkEmailIsUsed($email)) {
            createUser($name, $email, $password);
            $successMsg = "Success! Account Created. You are now logged in!";
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["currentUser"] = fetchUser($email);
            //Login, redirect maybe
        } else {
            $emailErr = "This email is already used";
        }

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
    
    <h2>Create Account</h2>

    <form id="pokemonForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter your Account Information</Legend>
                    <div class="formElement">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="John Smith" id="f-name" value="<?php echo $name ?>"/>
                        <span class="error"><?php echo $nameErr ?></span>
                    </div>
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
                        <span class="error"><?php echo $successMsg ?></span>
                    </div>
                </fieldset>
            </form>
</main>