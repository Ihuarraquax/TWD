<?php

session_start();

require_once "connect.php";

$conn = @new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //ochrona przed wstrzykiwaniem sqla
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];
    $email = $_POST['email'];


    //sprawdzeznie czy hasla sa identyczne
    if ($haslo != $haslo2) {
        $_SESSION["blad"] = '<span style="color:red">Hasła nie są identyczne!</span>';
        header('Location: rejestracja.php');
        exit();
    }


    //sprawdzenie czy email lub login wystepuje w bazie

    $query = "SELECT login, email FROM users";

    $istnieje = false;
    if ($result = @$conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            if ($row['login'] == $login || $row['email'] == $email) {
                $istnieje = true;
            }
        }
    }
    if ($istnieje) {
        $_SESSION["blad"] = '<span style="color:red">Podany login lub email jest juz uzywany!</span>';
        header('Location: rejestracja.php');
        exit();
    }















// ZABEZPIECZENIE PRZED WSTRZYKIWANIEM SQLA
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    $email = htmlentities($email, ENT_QUOTES, "UTF-8");

//DODANIE DO BAZY DANYCH
    $result = $conn->query(
                    sprintf("INSERT INTO users (login, haslo, email) VALUES ('%s','%s','%s')"
                            , mysqli_real_escape_string($conn, $login)
                            , mysqli_real_escape_string($conn, $haslo)
                            , mysqli_real_escape_string($conn, $email)));
    header('Location: index.php');
}

$conn->close();
?>

