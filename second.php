<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>
    
    <h2 id="generation">Generation 2 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen2/furretSmall.png 250w, resources/gen2/furret.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen2/furret.png"
                    alt ="A picture of Furret">
            </div>
            <div class="description">
                <p class="number">#0163</p>
                <p class="name">Furret</p>
                <p>
                    <span class="normal">Normal</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen2/wobuffetSmall.png 250w, resources/gen2/wobuffet.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen2/wobuffet.png"
                    alt ="A picture of Wobuffet">
            </div>
            <div class="description">
                <p class="number">#0202</p>
                <p class="name">Wobuffet</p>
                    <p>
                        <span class="psychic">Psychic</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen2/houndoomSmall.png 250w, resources/gen2/houndoom.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen2/houndoom.png"
                    alt ="A picture of Houndoom">
            </div>
            <div class="description">
                <p class="number">#0229</p>
                <p class="name">Houndoom</p>
                <p>
                    <span class="dark">Dark</span>
                     & 
                    <span class="fire">Fire</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen2/raikouSmall.png 250w, resources/gen2/raikou.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen2/raikou.png"
                    alt ="A picture of Raikou">
            </div>
            <div class="description">
                <p class="number">#0243</p>
                <p class="name">Raikou</p>
                <p>
                    <span class="electric">Electric</span>
                </p>
            </div>
        </div>
    </div>
</main>