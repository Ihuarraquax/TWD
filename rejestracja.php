<?php
session_start();

require_once "connect.php";

$conn = @new mysqli($host, $db_user, $db_password, $db_name);
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
            <article>
                <form action="dodajuzytkownika.php" method="POST">
                    Login:
                    <br>
                    <input type="text" name="login" required>
                    <br><br>
                    Hasło:
                    <br>
                    <input type="password" name="haslo" required>
                    <br><br>
                    Powtórz hasło:
                    <br>
                    <input type="password" name="haslo2" required>
                    <br><br>
                    Email:<br>
                    <input type="email" name="email" required>
                    <br>
                    <input type="submit" value="Zarejestruj się">
                    <br>

                </form>
                <?php
                if (isset($_SESSION['blad']))
                    echo $_SESSION['blad'];
                unset($_SESSION['blad']);
                ?>
            </article>
        </div>

        <div style="clear: both;"></div>
    </body>

</html>


