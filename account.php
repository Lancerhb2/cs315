<?php
include_once "functions.php";
session_start();

$newEmail = $newName = $newPassword = "";
$emailMsg = $nameMsg = $passwordMsg = "";
$emailErr = $nameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logoutSubmission"])) {
        session_unset();
    }
    if (isset($_POST["emailSubmission"])) {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $newEmail = test_input($_POST["email"]);
            // check for only letters and whitespace
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Must be in the format user@example.com";
            }
        }
        if (empty($emailErr)) {
            if (!checkEmailIsUsed($newEmail)) {
                updateEmail($_SESSION["currentUser"], $newEmail);
                $emailMsg = "Success! Email was changed";
                $_SESSION["currentUser"] = fetchUser($newEmail);
            } else {
                $emailErr = "This email is already used";
            }
        }
    }
    if (isset($_POST["nameSubmission"])) {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $newName = test_input($_POST["name"]);
        }
        updateUserName($_SESSION["currentUser"], $newName);
        $nameMsg = "Name successfully updated";
        //Update user stored in session
        $_SESSION["currentUser"] = fetchUser($_SESSION["currentUser"]->email);
    }

    if (isset($_POST["passwordSubmission"])) {
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $newPassword = test_input($_POST["password"]);
            // check for length
            if (strlen($newPassword) < 4) {
                $passwordErr = "Passwords must be at least 4 characters long";
            }
        }
        if (empty($passwordErr)) {
            updatePassword($_SESSION["currentUser"], $newPassword);
            $passwordMsg = "Password successfully updated";
            //Update user stored in session
            $_SESSION["currentUser"] = fetchUser($_SESSION["currentUser"]->email);
        }
    }
}

if (isset($_SESSION["isLoggedIn"]) == false) {
    header("Location: login.php");
    die();
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
    <h1>Hello <?php echo $_SESSION["currentUser"]->name; ?></h1>

    <h2>Logout</h2>

    <form id="logoutForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Click here to logout</Legend>
                    <input type="hidden" name="logoutSubmission" value="yes">
                    <div class="formElement">
                        <input type="submit" value="Logout">
                    </div>
                </fieldset>
            </form>

    <h2>Account Settings</h2>

    <h3>Change Email</h3>
    <form id="emailForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter your new Email</Legend>
                    
                    <div class="formElement">
                        <label for="email">Name:</label>
                        <input type="text" name="email" placeholder="example@example.com" id="f-name" value="<?php echo $_SESSION["currentUser"]->email ?>"/>
                        <span class="error"><?php echo $emailErr ?></span>
                    </div>
                    <input type="hidden" name="emailSubmission" value="yes">
                    <div class="formElement">
                        <input type="submit">
                        <input type="reset">
                        <span class="error"><?php echo $emailMsg ?></span>
                    </div>
                </fieldset>
            </form>

    <h3>Change Name</h3>
    <form id="nameForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter your new Name</Legend>
                    
                    <div class="formElement">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="John Smith" id="f-name" value="<?php echo $_SESSION["currentUser"]->name ?>"/>
                        <span class="error"><?php echo $nameErr ?></span>
                    </div>
                    <input type="hidden" name="nameSubmission" value="yes">
                    <div class="formElement">
                        <input type="submit">
                        <input type="reset">
                        <span class="error"><?php echo $nameMsg ?></span>
                    </div>
                </fieldset>
            </form>

    <h3>Change Password</h3>
    <form id="passwordForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter your new Password</Legend>
                    
                    <div class="formElement">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="f-password"/>
                        <span class="error"><?php echo $passwordErr ?></span>
                    </div>
                    <input type="hidden" name="passwordSubmission" value="yes">
                    <div class="formElement">
                        <input type="submit">
                        <input type="reset">
                        <span class="error"><?php echo $passwordMsg ?></span>
                    </div>
                </fieldset>
            </form>

</main>