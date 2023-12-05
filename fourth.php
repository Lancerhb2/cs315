<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>
    
    <?php include_once "header.php"; ?>

    <h2 id="generation">Generation 4 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen4/pachirisuSmall.png 250w, resources/gen4/pachirisu.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen4/pachirisu.png"
                    alt ="A picture of Pachirisu">
            </div>
            <div class="description">
                <p class="number">#0417</p>
                <p class="name">Pachirisu</p>
                <p>
                    <span class="electric">Electric</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen4/honchcrowSmall.png 250w, resources/gen4/honchcrow.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen4/honchcrow.png"
                    alt ="A picture of Honchcrow">
            </div>
            <div class="description">
                <p class="number">#0430</p>
                <p class="name">Honchcrow</p>
                    <p>
                        <span class="dark">Dark</span>
                        &
                        <span class="flying">Flying</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen4/garchompSmall.png 250w, resources/gen4/garchomp.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen4/garchomp.png"
                    alt ="A picture of Garchomp">
            </div>
            <div class="description">
                <p class="number">#0445</p>
                <p class="name">Garchomp</p>
                <p>
                    <span class="dragon">Dragon</span>
                    &
                    <span class="ground">Ground</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen4/toxicroakSmall.png 250w, resources/gen4/toxicroak.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen4/toxicroak.png"
                    alt ="A picture of Toxicroak">
            </div>
            <div class="description">
                <p class="number">#0454</p>
                <p class="name">Toxicroak</p>
                <p>
                    <span class="poison">Poison</span>
                    &
                    <span class="fighting">Fighting</span>
                </p>
            </div>
        </div>
    </div>
</main>