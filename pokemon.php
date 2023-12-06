<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <?php 
        require_once("functions.php");
        function noPokemon() {
            echo "<h1> Error 404</h1>";
            echo "<p>The requested Pokémon was not found</p>";
            http_response_code(404); //shows resposne code
        }
        if (isset($_GET['id'])) {
            $pokemon = getPokemonByID($_GET['id']);
            
            if (!$pokemon) {
                noPokemon();
            } else {
                echo <<<TITLE
                <h2 id="generation">{$pokemon->name}</h2>
                TITLE;
                echo $pokemon->getCard();
            }
        } else {
            noPokemon();
        }
    ?>



</main>