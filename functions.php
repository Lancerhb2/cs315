<?php
session_start();

// Taken from https://code-boxx.com/how-to-debug-php-code/
// (A) ERROR REPORTING LEVEL
// https://www.php.net/manual/en/errorfunc.constants.php
error_reporting(E_ALL & ~E_NOTICE); // ALL EXCEPT NOTICES
// error_reporting(E_ALL); // ALL KINDS OF ERROR
// error_reporting(0); // NO ERROR REPORTING
 
// (B) ERROR LOG
ini_set("log_errors", 1); // SAVE ERROR TO LOG FILE
ini_set("error_log", __DIR__ . DIRECTORY_SEPARATOR . "error.log"); // LOG FILE
 
// (C) DISPLAY ERROR MESSAGES
ini_set("display_errors", 1);

class Pokemon {
    private $id;
    public $name;
    private $type1;
    private $type2;
    private $generation;
    private $price;
    private $memberPrice;

    /*
    public function __construct($id, $name, $type1, $type2, $generation, $price, $memberPrice) {
        $this->id = $id;
        $this->name = $name;
        $this->type1 = $type1;
        $this->type2 = $type2;
        $this->generation = $generation;
        $this->price = $price;
        $this->memberPrice = $memberPrice;
    }
    */
    public function __construct($sqlRow) {
        $this->id = $sqlRow['id'];
        $this->name = $sqlRow['name'];
        $this->type1 = $sqlRow['type1'];
        $this->type2 = $sqlRow['type2'];
        $this->generation = $sqlRow['generation'];
        $this->price = $sqlRow['price'];
        $this->memberPrice = $sqlRow['member_price'];
    }

    public function getPrice() {
        if (isset($_SESSION["isLoggedIn"])) {
            return $this->memberPrice;
        } else {
            return $this->price;
        }
    }

    public function getCard() : string {
        if (isset($_SESSION["isLoggedIn"])) {
            $displayPrice = $this->memberPrice;
        } else {
            $displayPrice = $this->price;
        }
        $type1Lower = strtolower($this->type1);
        $fileName = str_replace(' ', '_', $this->name);
        $output = <<<Pokemon
        <a>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen{$this->generation}/{$fileName}Small.png 250w, resources/gen{$this->generation}/{$fileName}.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/{$this->name}.png"
                    alt ="A picture of {$this->name}">
            </div>
            <div class="description">
                <p>{$displayPrice}</p>
                <p class="number">#{$this->id}</p>
                <p class="name">{$this->name}</p>
                <p>
                    <span class="{$type1Lower}">$this->type1</span>
        Pokemon;
        if (strlen($this->type2) > 0) {
            $type2Lower = strtolower($this->type2);
            $output .= <<<TwoTypes
             & 
                            <span class="{$type2Lower}">$this->type2</span>
            TwoTypes;
        }
        $output .= <<<Buy
        <form action="cart.php" method="post">
            <input type="number" name="quantity" value="1" min="1">
            <input type="hidden" name="product_id" value="{$this->id}">
            <input type="submit" name="to_cart" value="Add To Cart">
        </form>
        Buy;
        $output .= <<<ENDTAGS
                </p>
            </div>
        </div>
        ENDTAGS;
        
        return $output;
    }

    public function getCartCard() : string {
        if (isset($_SESSION["isLoggedIn"])) {
            $displayPrice = $this->memberPrice;
        } else {
            $displayPrice = $this->price;
        }
        $type1Lower = strtolower($this->type1);
        $fileName = str_replace(' ', '_', $this->name);
        $output = <<<Pokemon
        <a>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen{$this->generation}/{$fileName}Small.png 250w, resources/gen{$this->generation}/{$fileName}.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/{$this->name}.png"
                    alt ="A picture of {$this->name}">
            </div>
            <div class="description">
                <p>{$displayPrice}</p>
                <p class="number">#{$this->id}</p>
                <p class="name">{$this->name}</p>
                <p>
                    <span class="{$type1Lower}">$this->type1</span>
        Pokemon;
        if (strlen($this->type2) > 0) {
            $type2Lower = strtolower($this->type2);
            $output .= <<<TwoTypes
             & 
                            <span class="{$type2Lower}">$this->type2</span>
            TwoTypes;
        }
        $output .= <<<Buy
        <form action="cart.php" method="post">
            <input type="number" name="quantity" value="{$_SESSION['cart'][$this->id]}" min="0">
            <input type="hidden" name="product_id" value="{$this->id}">
            <input type="submit" name="to_cart" value="Update Quantity">
        </form>
        Buy;
        $output .= <<<ENDTAGS
                </p>
            </div>
        </div>
        ENDTAGS;
        
        return $output;
    }
}


class User {
    public $name;
    public $email;    

    public function __construct($sqlRow) {
        $this->email = $sqlRow['email'];
        $this->name = $sqlRow['name'];
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'pokemon';
    try {
        $connString = "mysql:host=localhost;port=3306;dbname=pokemon";
        // creating a php database object
        $pdo = new PDO($connString, $DATABASE_USER, $DATABASE_PASS);
        return $pdo;
    } catch (PDOException $exception) {
        // If there is an error with the connection,
        // stop the script and display the error.
        echo "Database connection unsuccessful";
        // die($e->getMessage());
        exit('Failed to connect to database!');
    }
}

/** Checks if an email is used. */
function checkEmailIsUsed($email) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT 1 FROM users WHERE email=?');
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $returnedEmail = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    if ($returnedEmail == false) {
        return false;
    }

    return true;
}

function createUser($name, $email, $password) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('INSERT INTO `users` (`name`, `email`, `password`) VALUES
    (:name, :email, :password);');
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;
}

function loginUser($email, $password) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT 1 FROM `users` WHERE email=:email AND password=:password');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $returnedEmail = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    if ($returnedEmail == true) {
        return true;
    } else {
        return false;
    }
}

function fetchUser($email) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT `name`, `email` FROM `users` WHERE email=:email');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $returnedRow = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    return new User($returnedRow);
}

function updateUserName($user, $newName) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('UPDATE `users` SET name=:newName WHERE email=:email');
    $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
    $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;
}

function updateEmail($user, $newEmail) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('UPDATE `users` SET email=:newEmail WHERE email=:email');
    $stmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
    $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;
}

function updatePassword($user, $newPassword) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('UPDATE `users` SET password=:newPassword WHERE email=:email');
    $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
    $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;
}

function getPokemonByGeneration($generation) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT * FROM pokemon WHERE generation=? ORDER BY id ASC LIMIT 10');
    $stmt->bindValue(1, $generation, PDO::PARAM_INT);
    $stmt->execute();
    $firstFour = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    foreach ($firstFour as $pokeman) {
        $pokemon = new Pokemon($pokeman);
        echo $pokemon->getCard();
    }
}

/** Return a Pokemon object or FALSE if the ID does not exist. */
function getPokemonByID($id) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT * FROM pokemon WHERE id=?');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $pokemonString = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    if ($pokemonString) {
        $pokemon = new Pokemon($pokemonString);
        return $pokemon;
    }
    return false;
}

?>