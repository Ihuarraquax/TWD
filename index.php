<?php
session_start();
$_SESSION['OstatniaStrona'] = "index.php"; /////////////////// ZMIENIC PRZY KAZDEJ PODSTRONIE




//DODANIE KAZDEJ STRONY Z OSOBNA I ZAMIENIENE JEJ NAZWY NA ODPOWIADAJACE ID Z BAZY DANYCH
    if ($_SESSION['OstatniaStrona'] == "index.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 3;
    }
    if ($_SESSION['OstatniaStrona'] == "obsada.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 4;
    }
    if ($_SESSION['OstatniaStrona'] == "galeria.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 5;
    }
    if ($_SESSION['OstatniaStrona'] == "zwiastuny.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 6;
    }
    if ($_SESSION['OstatniaStrona'] == "recenzje.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 7;
    }
    if ($_SESSION['OstatniaStrona'] == "rekomendacje.php") {//STRONA GLOWNA MA ID 3
        $_SESSION['OstatniaStrona'] = 8;
    }
?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Strona główna</title>
        <link rel="stylesheet" href="css\fontello.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Chau+Philomene+One|Lato:400,700&amp;subset=latin-ext" rel="stylesheet">


    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.0';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div id="container">
            <header>
                <img src="obrazki/zombie.png" style="display: block;" class="ikona" />
                <div id="tytul">
                    <a href="index.php">Umieralnia-TWD</a>
                </div>
                <img src="obrazki/zombie2.png" style="display: block;" class="ikona" />
                <div style="clear: both"></div>
            </header>
            <nav>


            </nav>
            <div class="pozycja">
                <a href="index.php">Strona głowna</a>
            </div>

            <div class="pozycja">
                <a href="obsada.php">Obsada</a>
            </div>

            <div class="pozycja">
                <a href="galeria.php">Galeria</a>
            </div>

            <div class="pozycja">
                <a href="zwiastuny.php">Zwiastuny</a>
            </div>

            <div class="pozycja">
                <a href="recenzje.php">Recenzje</a>
            </div>


            <div class="pozycja">
                <a href="rekomendacje.php">Rekomendacje</a>
            </div>
            <div style="clear: both;"></div>

            <?php
            if ((!isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany'] == false)) {
                echo <<<EOL
                    <div id="ikonkaLogowania">
                        Zaloguj się!<i class="icon-user" style="font-size: 30px;"></i>
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
                        <div style="clear:both;"></div>
EOL;
            } else {
                echo '<div id="panelUzytkownika">Witaj ' . $_SESSION['user'] . '! [ <a href="logout.php">Wyloguj się!</a> ]</p></div><div style="clear: both;"></div>';
            }
            ?>
            <script>
                $("#logowanie").hide();
                $("#ikonkaLogowania").click(function () {
                    $("#logowanie").toggle(50);
                });
            </script>

            <article>
                <img src="ZOMBIE.png" class="center">
            </article>
            <div id="sekcjaKomentarzy">
                <div id="wyswietlanieKomentarzy">
                    <?php
                    require_once "connect.php";
                    $conn = @new mysqli($host, $db_user, $db_password, $db_name);

                    $sql = "SELECT u.login, k.tresc, k.data FROM komentarze k, users u, posty p WHERE k.idPosta = ".$_SESSION['OstatniaStrona']." AND k.idPosta=p.id AND u.id = k.idKomentujacego ORDER BY `k`.`data` DESC";

                    if ($result = @$conn->query($sql)) {
                        $ile = $result->num_rows;
                        if ($ile == 0) {
                            echo "Brak komentarzy. Bądź pierwszy!";
                        }

                        for ($i = 0; $i < $ile; $i++) {
                            $wiersz = $result->fetch_assoc();

                            echo '<div class="komentarz">';
                            echo '<div class="kAvatar"> ';
                            echo '<i class="icon-user"></i>';
                            echo '</div>';
                            echo '<div class="kTytul">';
                            echo '<div class="kNick">';
                            echo $wiersz['login'];
                            echo '</div>';
                            echo '<div class = "kData">';
                            echo $wiersz['data'];
                            echo '</div>';
                            echo '</div>';
                            echo '<div class = "kTresc">';
                            echo $wiersz['tresc'];
                            echo '</div>';
                            echo '<div style="clear: both;"></div>';
                            echo '</div>';
                            echo '<div style="clear: both;"></div>';
                        }
                    }
                    ?>
                </div>
                <div id="dodawanieKomentarzy">
                    <?php
                    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']) {
                        echo '<div id="dkPanel">';
                        echo '    <h2>';
                        echo '        Dodaj Komentarz!';
                        echo '    </h2>';
                        echo '    <div id="dkFormularz">';
                        echo '        <form action="dodajKomentarz.php" method="get">';
                        echo '            ';
                        echo '            <textarea id="dkTextarea" name="komentarz"></textarea><br>';
                        echo '                Autor: ' . $_SESSION['user'] . '<br>';
                        echo '            ';
                        echo '            <input id="dkButton" type="submit" value="Skończyłem!">';
                        echo '            <div style="clear:both;"></div>';
                        echo '            ';
                        echo '        </form>';
                        echo '    </div>';
                        echo '</div>';
                    } else {
                        echo '<div id="dkPanel">';
                        echo '    <h2>';
                        echo '        Zaloguj się aby dodać komentarz!';
                        echo '    </h2>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>



        </div>

        <div style="clear: both;"></div>
        <div class="sidebar">
            <div class="oAutorze">
                <h3>Zdanko o autorze</h3>
                <img id="avatar" src="https://scontent-waw1-1.xx.fbcdn.net/v/t1.0-1/p240x240/14203298_1158453020868367_5644073247565590115_n.jpg?_nc_cat=0&oh=2e0a8ceb48b9b4313397580930373b69&oe=5BB57974" >
                <p>Cześć! Mam na imię Hubert i jestem studentem UPH Siedlce. 
                    Interesuje się programowaniem i serialami. 
                    Moim ulubionym jest The Walking Dead i dlatego zdecydowalem się stworzyć ten portal.</p>
                <div id="serwisy">
                    <div id="fb"><i class="icon-facebook-squared"></i></div>
                    <div id="github"><i class="icon-github-circled"></i></div>
                    <div id="yt"><i class="icon-youtube-play"></i></div>
                    <div id="spotify"><i class="icon-spotify"></i></div>
                    <div style="float: none;clear:both;"></div>
                </div>
            </div>
        </div>


        <footer>
            <div id="containerStopka">

                <div id="sInfo">
                    <h3> Witamy na Umieralni-TWD</h3>
                    Strona powstała z wielkiej miłości do serialu The Walking Dead. 
                    Głównym jej celem jest pozwolić społeczności dyskutować na temat serialu. Pozwala nam na to system komentarzy. 
                    Kazda strona ma swoją oddzielną sekcję. Nie wachaj się i dodaj coś od siebie!
                </div>
                <!--Your Group Plugin for the Web code-->
                <div id="sFacebook">
                    <div class="fb-page" data-href="https://www.facebook.com/WalkingDeadPoland/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Biblioteka-G%C5%82%C3%B3wna-Uniwersytetu-Przyrodniczo-Humanistycznego-w-Siedlcach-143598862371485/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Biblioteka-G%C5%82%C3%B3wna-Uniwersytetu-Przyrodniczo-Humanistycznego-w-Siedlcach-143598862371485/">Biblioteka Główna Uniwersytetu Przyrodniczo-Humanistycznego w Siedlcach</a></blockquote></div>
                </div>
                <div id="sFormulka">
                    Copyright © 2018 Hubert Zabłocki. All rights reserved.
                </div>
                <div style="clear:both;"></div>












            </div>
        </footer>
    </body>

</html>
