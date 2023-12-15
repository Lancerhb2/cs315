<?php
include_once "functions.php";
session_start();

// define variables and set to empty values
$address = $ccNumber = $successMsg = "";
$addressErr = $ccNumberErr = "";

// Server side validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ccNumber"])) {
        $ccNumberErr = "A credit card number is required";
    } else {
        $ccNumber = test_input($_POST["ccNumber"]);
        // check for only letters and whitespace
        if (!preg_match("/^[0-9]*$/", $ccNumber)) {
            $ccNumberErr = "Only numbers are allowed";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "An address is required";
    } else {
        $address = test_input($_POST["address"]);
        // check for only letters and whitespace
        if (strlen($address) < 4) {
            $addressErr = "Please enter a valid address";
        }
    }

    if (!isset($_SESSION["currentUser"])) {
        $successMsg = "Please sign in or create an account first!";
    } else {
        $user = fetchUser($_SESSION["currentUser"]->email);

        // Success, place order
        if (empty($ccNumberErr) && empty($addressErr)) {
            checkout($user->id, $ccNumber, $address);
            $orderID = fetchOrderID($user->id);
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $quantity) {
                    if ($quantity > 0) {
                        fillOrder($orderID, $key, $quantity);
                    }
                }
            }
            $successMsg = "Success! Order placed. Thank you for shopping with us!";
            unset($_SESSION['cart']);
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
    
    <h2>Checkout</h2>

    <form id="orderForm" method="post" class="hasAddress hasCCNumber" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <fieldset>
                    <Legend>Enter The Checkout Information:</Legend>
                    <div class="formElement">
                        <label for="address">Address:</label>
                        <input type="text" name="address" placeholder="123 Gateway Road" id="f-address" value="<?php echo $address ?>"/>
                        <span class="error" id ="f-address-err"><?php echo $addressErr ?></span>
                    </div>
                    <div class="formElement">
                        <label for="ccNumber">Credit Card Number:</label>
                        <input type="text" name="ccNumber" placeholder="5555 5555 5555 5555" id="f-ccNumber" value="<?php echo $ccNumber ?>"/>
                        <span class="error" id="f-ccNumber-err"><?php echo $ccNumberErr ?></span>
                    </div>
                    <div class="formElement">
                        <input type="submit" value="Place Order">
                        <span class="success"><?php echo $successMsg ?></span>
                    </div>
                </fieldset>
            </form>
        <?php
        $subtotal = 0.00;
        $total = 0.00;
        $tax = 1.07;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $quantity) {
                if ($quantity > 0) {
                    $pokemon = getPokemonByID($key);
                    $subtotal += $pokemon->getPrice() * $quantity;
                }
            }
        }
        echo "<h3>Subtotal: " . $subtotal . "</h3>";
        $total = $subtotal * $tax;
        echo "<h3>Total: " . number_format((float)$total, 2, '.', '') . "</h3>";
        ?>
</main>