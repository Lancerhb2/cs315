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
        if (isset($_GET['generation'])) {
            echo <<<TITLE
            <h2 id="generation">Generation {$_GET['generation']} Pokémon</h2>
            <div class="pokemon_list">
            TITLE;
            getPokemonByGeneration($_GET['generation']);
            echo "</div>";
        } else {
            echo "<h1> Error 404</h1>";
            echo "<p></p>The requested generation was not found</p>";
            http_response_code(404); //shows resposne code
        }
    ?>



</main>