<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <h2 id="generation">Generation 8 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen8/rabootSmall.png 250w, resources/gen8/raboot.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen8/raboot.png"
                    alt ="A picture of Raboot">
            </div>
            <div class="description">
                <p class="number">#0814</p>
                <p class="name">Raboot</p>
                <p>
                    <span class="fire">Fire</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen8/corviknightSmall.png 250w, resources/gen8/corviknight.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen8/corviknight.png"
                    alt ="A picture of Corviknight">
            </div>
            <div class="description">
                <p class="number">#0823</p>
                <p class="name">Corviknight</p>
                    <p>
                        <span class="flying">Flying</span>
                        &
                        <span class="steel">Steel</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen8/spectrierSmall.png 250w, resources/gen8/spectrier.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen8/spectrier.png"
                    alt ="A picture of Spectrier">
            </div>
            <div class="description">
                <p class="number">#0897</p>
                <p class="name">Spectrier</p>
                <p>
                    <span class="ghost">Ghost</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen8/overqwilSmall.png 250w, resources/gen8/overqwil.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen8/overqwil.png"
                    alt ="A picture of Overqwil">
            </div>
            <div class="description">
                <p class="number">#0904</p>
                <p class="name">Overqwil</p>
                <p>
                    <span class="dark">Dark</span>
                    &
                    <span class="poison">Poison</span>
                </p>
            </div>
        </div>
    </div>
</main>