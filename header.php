<header>
            <div class="nav">
                <a id="home_button" href="index.php"><img src="resources/poke_ball.png" alt="Home"></a>
                <a href="generation.php?generation=1">1st Gen</a>
                <a href="generation.php?generation=2">2nd Gen</a>
                <a href="generation.php?generation=3">3rd Gen</a>
                <a href="generation.php?generation=4">4th Gen</a>
                <a href="generation.php?generation=5">5th Gen</a>
                <a href="generation.php?generation=6">6th Gen</a>
                <a href="generation.php?generation=7">7th Gen</a>
                <a href="generation.php?generation=8">8th Gen</a>
                <a href="generation.php?generation=9">9th Gen</a>
                <a href="cart.php">Shopping Cart</a>
                <?php
                session_start();
                if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) {
                    echo <<<LoginInfo
                        <a href="account.php">Account</a>
                    LoginInfo;
                } else {
                    echo <<<LoginInfo
                        <a href="createAccount.php">Create Account</a>
                        <a href="login.php">Login</a>
                    LoginInfo;
                    
                }
                ?>
            </div>  
        </header>