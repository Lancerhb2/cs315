<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <h2 id="generation">Generation 1 Pokémon</h2>

    <div class="pokemon_list">

        <?php 
            require_once("functions.php");

            getPokemonByGeneration(1);
        ?>

    </div>

</main>