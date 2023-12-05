<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <h2 id="generation">Generation 5 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen5/boldoreSmall.png 250w, resources/gen5/boldore.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen5/boldore.png"
                    alt ="A picture of Boldore">
            </div>
            <div class="description">
                <p class="number">#0525</p>
                <p class="name">Boldore</p>
                <p>
                    <span class="rock">Rock</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen5/excadrillSmall.png 250w, resources/gen5/excadrill.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen5/excadrill.png"
                    alt ="A picture of Excadrill">
            </div>
            <div class="description">
                <p class="number">#0530</p>
                <p class="name">Excadrill</p>
                    <p>
                        <span class="ground">Ground</span>
                        &
                        <span class="steel">Steel</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen5/scolipedeSmall.png 250w, resources/gen5/scolipede.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen5/scolipede.png"
                    alt ="A picture of Scolipede">
            </div>
            <div class="description">
                <p class="number">#0545</p>
                <p class="name">Scolipede</p>
                <p>
                    <span class="bug">Bug</span>
                    &
                    <span class="poison">Poison</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen5/yamaskSmall.png 250w, resources/gen5/yamask.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen5/yamask.png"
                    alt ="A picture of Yamask">
            </div>
            <div class="description">
                <p class="number">#0562</p>
                <p class="name">Yamask</p>
                <p>
                    <span class="ghost">Ghost</span>
                </p>
            </div>
        </div>
    </div>
</main>