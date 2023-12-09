<?php

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

    public function getCard() : string {
        $type1Lower = strtolower($this->type1);
        $fileName = str_replace(' ', '_', $this->name);
        $output = <<<Pokemon
        <a href="pokemon.php?id={$this->id}">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen{$this->generation}/{$fileName}Small.png 250w, resources/gen{$this->generation}/{$fileName}.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/{$this->name}.png"
                    alt ="A picture of {$this->name}">
            </div>
            <div class="description">
                <p>{$this->generation}, {$this->price}, {$this->memberPrice}</p>
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
        $output .= <<<ENDTAGS
                </p>
            </div>
        </div>
        ENDTAGS;
        return $output;
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