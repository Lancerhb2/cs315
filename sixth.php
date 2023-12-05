<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <h2 id="generation">Generation 6 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen6/floetteSmall.png 250w, resources/gen6/floette.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen6/floette.png"
                    alt ="A picture of Floette">
            </div>
            <div class="description">
                <p class="number">#0670</p>
                <p class="name">Floette</p>
                <p>
                    <span class="fairy">Fairy</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen6/honedgeSmall.png 250w, resources/gen6/honedge.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen6/honedge.png"
                    alt ="A picture of Honedge">
            </div>
            <div class="description">
                <p class="number">#0679</p>
                <p class="name">Honedge</p>
                    <p>
                        <span class="steel">Steel</span>
                        &
                        <span class="ghost">Ghost</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen6/hawluchaSmall.png 250w, resources/gen6/hawlucha.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen6/hawlucha.png"
                    alt ="A picture of Hawlucha">
            </div>
            <div class="description">
                <p class="number">#0701</p>
                <p class="name">Hawlucha</p>
                <p>
                    <span class="fighting">Fighting</span>
                    &
                    <span class="flying">Flying</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen6/yveltalSmall.png 250w, resources/gen6/yveltal.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen6/yveltal.png"
                    alt ="A picture of Yveltal">
            </div>
            <div class="description">
                <p class="number">#0717</p>
                <p class="name">Yveltal</p>
                <p>
                    <span class="dark">Dark</span>
                    &
                    <span class="flying">Flying</span>
                </p>
            </div>
        </div>
    </div>
</main>