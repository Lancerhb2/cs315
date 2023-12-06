<?php

require_once('pokemon.php');

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


function getPokemonByGeneration($generation) {
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT * FROM pokemon WHERE generation=? ORDER BY id ASC LIMIT 10');
    $stmt->bindValue(1, $generation, PDO::PARAM_INT);
    $stmt->execute();
    $firstFour = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($firstFour as $pokeman) {
        $pokemon = new Pokemon($pokeman);
        echo $pokemon->getCard();
    }
}

?>