<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>
    
    <?php include_once "header.php"; ?>

    <h2 id="generation">Generation 7 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen7/torracatSmall.png 250w, resources/gen7/torracat.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen7/torracat.png"
                    alt ="A picture of Torracat">
            </div>
            <div class="description">
                <p class="number">#0726</p>
                <p class="name">Torracat</p>
                <p>
                    <span class="fire">Fire</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen7/toucannonSmall.png 250w, resources/gen7/toucannon.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen7/toucannon.png"
                    alt ="A picture of Toucannon">
            </div>
            <div class="description">
                <p class="number">#0733</p>
                <p class="name">Toucannon</p>
                    <p>
                        <span class="normal">Normal</span>
                        &
                        <span class="flying">Flying</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen7/tapu_finiSmall.png 250w, resources/gen7/tapu_fini.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen7/tapu_fini.png"
                    alt ="A picture of Tapu Fini">
            </div>
            <div class="description">
                <p class="number">#0788</p>
                <p class="name">Tapu Fini</p>
                <p>
                    <span class="water">Water</span>
                    &
                    <span class="fairy">Fairy</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen7/stakatakaSmall.png 250w, resources/gen7/stakataka.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen7/stakataka.png"
                    alt ="A picture of Stakataka">
            </div>
            <div class="description">
                <p class="number">#0805</p>
                <p class="name">Stakataka</p>
                <p>
                    <span class="rock">Rock</span>
                    &
                    <span class="steel">Steel</span>
                </p>
            </div>
        </div>
    </div>
</main>