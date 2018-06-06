<?php

// sprawdzenie czy dane zostaly wyslane postem
if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
}


require_once "connect.php";


// Create connection
$conn = @new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //ochrona przed wstrzykiwaniem sqla
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    if ($result = @$conn->query(
                    sprintf("SELECT * FROM users WHERE login='%s' AND haslo='%s'", mysqli_real_escape_string($polaczenie, $login), mysqli_real_escape_string($polaczenie, $haslo)))) {

        $ilu_userow = $rezultat->num_rows;
        if ($ilu_userow > 0) {
            session_start();
            $_SESSION['zalogowany'] = true;
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: index.php');
        }
    }
}

$conn->close();








?>