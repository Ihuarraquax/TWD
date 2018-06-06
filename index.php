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
                    <a href="index.html">THE WALKING DEAD</a>
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








if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']==false)){

    echo <<<EOL
            <div id="ikonkaLogowania">
                <i class="icon-user"></i>

            </div>
            <div style="clear: both;"></div>
            <div id="logowanie">
                <form action="logowanie.php" method="POST">
                    Login:
                    <br>
                    <input type="text" name="login">
                    <br>
                    <br> Hasło:
                    <br>
                    <input type="password" name="haslo">
                    <br>
                    <br>
                    <input type="submit" value="Zaloguj">
                    <br>

                </form>

            </div>
                
    
EOL;
}
?>
            <script>
                $("#logowanie").hide();
                $("#ikonkaLogowania").click(function () {
                    $("#logowanie").toggle(50);
                });
            </script>
            <div style="clear: both;"></div>
            <article>

            </article>

            <footer>

            </footer>
        </div>

        <div style="clear: both;"></div>
    </body>

</html>
