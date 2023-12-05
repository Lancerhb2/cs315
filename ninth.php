<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)"/>
    <link rel="stylesheet" href="tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
    <link rel="stylesheet" href="desktop.css" media="screen and (min-width:769px)"/>
    <meta charset="UTF-8" />
</head>
<main>

    <?php include_once "header.php"; ?>

    <h2 id="generation">Generation 9 Pokémon</h2>
    <div class="pokemon_list">
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen9/skeledirgeSmall.png 250w, resources/gen9/skeledirge.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/skeledirge.png"
                    alt ="A picture of Skeledirge">
            </div>
            <div class="description">
                <p class="number">#0911</p>
                <p class="name">Skeledirge</p>
                <p>
                    <span class="fire">Fire</span>
                    &
                    <span class="ghost">Ghost</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen9/pawmoSmall.png 250w, resources/gen9/pawmo.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/pawmo.png"
                    alt ="A picture of Pawmo">
            </div>
            <div class="description">
                <p class="number">#0922</p>
                <p class="name">Pawmo</p>
                    <p>
                        <span class="electric">Electric</span>
                        &
                        <span class="fighting">Fighting</span>
                    </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen9/ceruledgeSmall.png 250w, resources/gen9/ceruledge.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/ceruledge.png"
                    alt ="A picture of Ceruledge">
            </div>
            <div class="description">
                <p class="number">#0937</p>
                <p class="name">Ceruledge</p>
                <p>
                    <span class="fire">Fire</span>
                    &
                    <span class="ghost">Ghost</span>
                </p>
            </div>
        </div>
        <div class="pokemon">
            <div class="image">
                <img srcset="resources/gen9/chien-paoSmall.png 250w, resources/gen9/chien-pao.png 475w"
                    sizes="(max-width: 600px) 250px, 475px"
                    src="resources/gen9/chien_pao.png"
                    alt ="A picture of Chien Pao">
            </div>
            <div class="description">
                <p class="number">#1002</p>
                <p class="name">Chien-Pao</p>
                <p>
                    <span class="dark">Dark</span>
                    &
                    <span class="ice">Ice</span>
                </p>
            </div>
        </div>
    </div>
</main>