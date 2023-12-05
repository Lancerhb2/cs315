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
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen1/bulbasaurSmall.png 250w, resources/gen1/bulbasaur.png 475w"
                sizes="(max-width: 600px) 250px, 475px"
                src="resources/gen1/bulbasaur.png"
                alt ="A picture of Bulbasaur">
            </div>
            <div class="description">
                <p class="number">#0001</p>
                <p class="name">Bulbasaur</p>
                <p>
                    <span class="grass">Grass</span>
                     & 
                    <span class="poison">Poison</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <div class="image">
                    <img srcset="resources/gen1/meowthSmall.png 250w, resources/gen1/meowth.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen1/meowth.png"
                    alt ="A picture of Meowth">
                </div>
            </div>
            <div class="description">
                <p class="number">#0052</p>
                <p class="name">Meowth</p>
                    <p>
                        <span class="normal">Normal</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen1/dewgongSmall.png 250w, resources/gen1/dewgong.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen1/dewgong.png"
                    alt ="A picture of Dewgong">
            </div>
            <div class="description">
                <p class="number">#0087</p>
                <p class="name">Dewgong</p>
                <p>
                    <span class="water">Water</span>
                     & 
                    <span class="ice">Ice</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen1/mewSmall.png 250w, resources/gen1/mew.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen1/mew.png"
                    alt ="A picture of Mew">
            </div>
            <div class="description">
                <p class="number">#0151</p>
                <p class="name">Mew</p>
                <p>
                    <span class="psychic">Psychic</span>
                </p>
            </div>
        </div>
    </div>
</main>