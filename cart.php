<?php
    session_start();
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) &&
        is_numeric($_POST['quantity'])) {
            $product_id = (int) $_POST['product_id'];
            $quantity = (int) $_POST['quantity'];

            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    if ($_SESSION['cart'][$product_id] > 0) {
                        $_SESSION['cart'][$product_id] = $quantity;
                    } else {
                        unset($_SESSION['cart'][$product_id]);
                    }
                } else { // Product doesn't exist in cart so add it
                    $_SESSION['cart'][$product_id] = $quantity;
                } 
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($product_id => $quantity);
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

        <?php include_once "header.php"; 
        require_once("functions.php");
        ?>
        
        <h2>Shopping Cart</h2>

        <?php
        $subtotal = 0.00;
        $total = 0.00;
        $tax = 1.07;
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            echo '<div class="pokemon_list">';
            foreach ($_SESSION['cart'] as $key => $quantity) {
                if ($quantity > 0) {
                    $pokemon = getPokemonByID($key);
                    echo $pokemon->getCartCard();
                    $subtotal += $pokemon->getPrice() * $quantity;
                }
            }
            echo "</div>";
            echo "<h3>Subtotal: " . $subtotal . "</h3>";
            $total = $subtotal * $tax;
            echo "<h3>Total: " . number_format((float)$total, 2, '.', '') . "</h3>";
            echo '<a href="checkout.php"><button type="submit">Checkout</button></a>';
        } else {
            echo <<<POKEMON
            <h3>No Pokemon Added to Cart</h3>
            POKEMON;
        }

        ?>

</main>