<?php
session_start();
?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Strona główna</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css\fontello.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Chau+Philomene+One|Lato:400,700&amp;subset=latin-ext" rel="stylesheet">

    </head>

    <body>
        <div id="container">
            <header>
                <img src="obrazki/zombie.png" style="display: block;" class="ikona" />
                <div id="tytul">
                    <a href="index.php">THE WALKING DEAD</a>
                </div>
                <img src="obrazki/zombie2.png" style="display: block;" class="ikona" />
                <div style="clear: both"></div>
            </header>
            <nav>


            </nav>
            <div class="pozycja">
                <a href="index.html">Strona głowna</a>
            </div>

            <div class="pozycja">
                <a href="obsada.html">Obsada</a>
            </div>

            <div class="pozycja">
                <a href="galeria.html">Galeria</a>
            </div>

            <div class="pozycja">
                <a href="zwiastuny.html">Zwiastuny</a>
            </div>

            <div class="pozycja">
                <a href="recenzje.html">Recenzje</a>
            </div>


            <div class="pozycja">
                <a href="rekomendacje.html">Rekomendacje</a>
            </div>
            <div style="clear: both;"></div>

            <?php
            if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany'] == false)) {
                echo <<<EOL
                    <div id="ikonkaLogowania">
                        <i class="icon-user" style="size: 300%;"></i>
                    </div>
                    <div style="clear: both;"></div>
                    <div id="logowanie">
                        <form action="logowanie.php" method="POST">
                            Login:
                            <br>
                            <input type="text" name="login" required>
                            <br>
                            <br> Hasło:
                            <br>
                            <input type="password" name="haslo" required>
                            <br>
                            <br>
                            <input type="submit" value="Zaloguj">
                            <br>
                        </form><br>
                        Nie masz konta? <a href="rejestracja.php">Zarejestruj się!</a>
                    </div>                
EOL;
            } else {
                echo "<p>Witaj " . $_SESSION['user'] . '! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
            }
            ?>
            <script>
                $("#logowanie").hide();
                $("#ikonkaLogowania").click(function () {
                    $("#logowanie").toggle(50);
                });
            </script>

            <article>

            </article>

            <footer>

            </footer>


        </div>

        <div style="clear: both;"></div>
        <!-- Side bar -->
        <div class="sidebar">
            <div class="oAutorze">
                <h3>Autor</h3>
                <img id="avatar" src="https://scontent-waw1-1.xx.fbcdn.net/v/t1.0-1/p240x240/14203298_1158453020868367_5644073247565590115_n.jpg?_nc_cat=0&oh=2e0a8ceb48b9b4313397580930373b69&oe=5BB57974" >
                <p>Cześć! Mam na imię Hubert, mam 21 lat i jestem studentem UPH Siedlce. 
                Interesuje się programowaniem i serialami. 
                Moim ulubionym jest The Walking Dead i dlatego zdecydowalem się stworzyć ten portal.</p>
            </div>
            <div id="serwisy">
                <i class="icon-facebook-squared"></i>
                <i class="icon-github-circled"></i>
                <i class="icon-youtube-play"></i>
                <i class="icon-icon-twitch"></i>
                <i class="icon-spotify"></i>
            </div>
        </div>
    </body>

</html>
