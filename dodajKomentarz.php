<?php

session_start();

require_once "connect.php";

$conn = @new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //ochrona przed wstrzykiwaniem sqla
    $tresc = $_GET['komentarz'];
    $userID = $_SESSION['userID'];
    $skad = $_SESSION['OstatniaStrona'];

    //DODANIE KAZDEJ STRONY Z OSOBNA I ZAMIENIENE JEJ NAZWY NA ODPOWIADAJACE ID Z BAZY DANYCH
    if ($skad == "index.php") {//STRONA GLOWNA MA ID 3
        $skad = 3;
    }



//DODANIE DO BAZY DANYCH
    $sql = "INSERT INTO `komentarze` (`id`, `idKomentujacego`, `idPosta`, `tresc`, `data`) VALUES (NULL, $userID, $skad, '$tresc', CURRENT_TIMESTAMP);";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>