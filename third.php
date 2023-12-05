<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>
    
    <?php include_once "header.php"; ?>

    <h2 id="generation">Generation 3 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen3/treeckoSmall.png 250w, resources/gen3/treecko.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen3/treecko.png"
                    alt ="A picture of Treecko">
            </div>
            <div class="description">
                <p class="number">#0252</p>
                <p class="name">Treecko</p>
                <p>
                    <span class="grass">Grass</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen3/zigzagoonSmall.png 250w, resources/gen3/zigzagoon.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen3/zigzagoon.png"
                    alt ="A picture of Zigzagoon">
            </div>
            <div class="description">
                <p class="number">#0263</p>
                <p class="name">Zigzagoon</p>
                    <p>
                        <span class="normal">Normal</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen3/plusleSmall.png 250w, resources/gen3/plusle.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen3/plusle.png"
                    alt ="A picture of Plusle">
            </div>
            <div class="description">
                <p class="number">#0311</p>
                <p class="name">Plusle</p>
                <p>
                    <span class="electric">Electric</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen3/minunSmall.png 250w, resources/gen3/minun.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen3/minun.png"
                    alt ="A picture of Minun">
            </div>
            <div class="description">
                <p class="number">#0312</p>
                <p class="name">Minun</p>
                <p>
                    <span class="electric">Electric</span>
                </p>
            </div>
        </div>
    </div>
</main>