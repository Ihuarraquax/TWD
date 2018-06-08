<?php
session_start();
$_SESSION['OstatniaStrona'] = "recenzje.php"; /////////////////// ZMIENIC PRZY KAZDEJ PODSTRONIE
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
                <div class="recenzja">
                    <div class="uzytkownik">
                        <img src="http://1.fwcdn.pl/u/99/28/999928/999928.2.jpg" />
                        <div class="nazwauzytkownika">
                            <span style="font-weight: 700;font-size: 30px;">Żywe trupy</span>
                            <br> autor: Cziken</div>
                        <div style="clear: both;"></div>

                    </div>
                    <div class="tresc">Rosnąca popularność komiksu "Żywe trupy" nie mogła pozostać nie zauważona dla producentów filmowych. Za powstanie
                        wersji telewizyjnej popularnego komiksu odpowiada m.in. Frank Darabont, reżyser takich hitów jak "Zielona
                        Mila", "Skazani na Shawshank". Połączenie jego doświadczenia, z genialną historią Roberta Kirkmana zaowocowało
                        naprawdę dobrą produkcją. Serial jak i komiks "Żywe trupy" opowiada o losach rodziny Grimesów i pozostałych
                        ocalonych w świecie opanowanym przez zombie.
                        <br>
                        <br> Jeśli ktoś spodziewa się hektolitrów krwi w każdym z epizodów, ten będzie rozczarowany. To przede wszystkim
                        historia o strachu, o ludziach, którzy zmagają się z nim 24 godziny na dobę. Wszystkie przeżycia, podjęte
                        decyzje odcisną piętno na psychice bohaterów, których losy przyjdzie nam śledzić. Jednym będziemy kibicować,
                        a innym będziemy życzyć szybkiej przemiany w zombie.
                        <br>
                        <br> Twórcy serialu nie wzorowali się w stu procentach na komiksie. Nie da się idealnie przenieść każdego
                        kadru komiksu na klatkę filmową. Niektóre wątki w serialu zostały pozmieniane, z niektórych zrezygnowano,
                        dodano nowych bohaterów itd. W mojej opinii wersja telewizyjna nie zawiera w sobie takiej dawki dramatyzmu,
                        przemocy jak komiks. Zdaje sobie jednak sprawę, że nie wszystkie rozwiązania zaproponowane przez Kirkmana
                        w komiksie, nadają się do zekranizowania ze względu na swoją brutalność.
                        <br>
                        <br> Podsumowując, uważam ten serial za bardzo dobrą ekranizację, mimo wielu różnic fabularnych, twórcom
                        udało się oddać klimat komiksowej serii. Kirkman nie rzadko w swoich zeszytach zaskakuje czytelników.
                        Wiele emocji wśród fanów wzbudza fakt uśmiercania przez niego głównych bohaterów. Jeśli serial będzie
                        zaskakiwał, z każdym odcinkiem zbliżał się napięciem, emocjami do komiksu, to cały czas będzie zyskiwał
                        na popularności. A my dalej będziemy mogli śledzić losy Ricka i grupki ocalałych w TV.
                    </div>
                    <div class="ocena">
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/starblack.png" class="gwiazdka"/>
                        4/5 Bardzo dobry
                    </div>
                </div>


                <div class="recenzja">
                    <div class="uzytkownik" style="background-color: rgb(67, 94, 94)">
                        <img src="http://1.fwcdn.pl/u/33/64/1953364/1953364.2.jpg" />
                        <div class="nazwauzytkownika">
                            <span style="font-weight: 700;font-size: 30px;">Dlaczego kochamy zombie?</span>
                            <br> autor: FIGHTwapa</div>
                        <div style="clear: both;"></div>

                    </div>
                    <div class="tresc">Serial "The Walking Dead" powstał dzięki rosnącej na całym świecie popularności tych nieumarłych istot. Już wiele lat przed rozpoczęciem prac nad pierwszymi odcinkami, duża ilość filmów o tej tematyce, takich jak "Noc żywych trupów", "28 dni później" czy "Wysyp żywych trupów", odniosła ogromne sukcesy, lecz dopiero niedawno powstało zjawisko, które niemalże można nazwać kultem zombie. Spowodowało ono nawet tworzenie gier wideo z nimi związanych oraz organizowanie pochodów ludzi przebranych za żywe trupy. Twórcom opłaciło się skorzystać na chwilowej zapewne modzie i w oparciu o popularny komiks stworzyć serial, który zapewni widzom stały kontakt z zombie. Ale czy to właśnie te potwory są najważniejsze dla odbiorców? 
                        <br>
                        <br>Jesteśmy ciekawi, jak w przypadku skrajnie apokaliptycznych sytuacji zachowają się ludzie pozbawieni nowoczesnych technologii. Trzeba zdać się na własny instynkt, umiejętność współpracy i wolę przeżycia, gdy wokoło biegają żywe trupy. Dreszcz emocji i strachu przepływa przez nas wtedy, gdy uświadomimy sobie, że sytuacja nie jest tak odległa, jakby się mogło wydawać. To przecież całkiem prawdziwy wirus, zapowiedziany zresztą w mitologii. Oprócz przerażającego klimatu pojawia się element psychologiczny. W chwili zagrożenia zrzucane są maski i okazuje się, kim tak naprawdę jesteśmy.  Po kilku odcinkach nie będziemy już świadkami walk zombie z ludźmi, a ludzi ze sobą nawzajem. W serialu "The Walking Dead" ten aspekt jest poruszony w sposób znakomity. W jednej grupie znajdą się altruiści, osoby chcące przeżyć za wszelką cenę, przywódcy i tchórze. Tu nie ma mowy o ciągłej zgodzie. Sami możemy zdecydować, która postawa jest słuszna. Na tym etapie robi się naprawdę strasznie, bo zostajemy postawieni przed realnym wyborem, dokonującym się również na ekranie. Czy potrafilibyśmy zastrzelić potwora w ciele własnej matki? Teraz już wiadomo, że żaden przeciętny slasher o zombie nie może równać się z tym serialem. 
                        <br>
                        <br>Zombie mają ogromny potencjał, jeśli chodzi o przerażenie widza. Dopiero po wielu latach został on w pełni wykorzystany. Okazało się, że ten rodzaj potworów nie straszy od razu, wymaga czasu i cierpliwości, by to się stało. Jeśli widz oczekuje czegoś więcej od obrazu żywych trupów, niż tylko zjadanie przez nie ludzi, to pozycją obowiązkową jest serial "The Walking Dead". 

                    </div>
                    <div class="ocena">
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        <img src="obrazki/star.png" class="gwiazdka"/>
                        5/5 Arcydzieło! 
                    </div>
                </div>
                <div style="clear:both;"></div>
            </article>
            <div id="sekcjaKomentarzy">
                <div id="wyswietlanieKomentarzy">
                    <?php
                    require_once "connect.php";
                    $conn = @new mysqli($host, $db_user, $db_password, $db_name);

                    $sql = "SELECT u.login, k.tresc, k.data FROM komentarze k, users u, posty p WHERE k.idPosta = " . $_SESSION['OstatniaStrona'] . " AND k.idPosta=p.id AND u.id = k.idKomentujacego ORDER BY `k`.`data` DESC";
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
