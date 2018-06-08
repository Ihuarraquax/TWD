<?php

session_start();
// sprawdzenie czy dane zostaly wyslane postem
if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
    echo "POST nie dotarł";
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
                    sprintf("SELECT * FROM users WHERE login='%s' AND haslo='%s'", mysqli_real_escape_string($conn, $login), mysqli_real_escape_string($conn, $haslo)))) {

        $ilu_userow = $result->num_rows;
        if ($ilu_userow > 0) {
            $_SESSION['zalogowany'] = true;

            $wiersz = $result->fetch_assoc();
            $_SESSION['user'] = $wiersz['login'];
            $_SESSION['userID'] = $wiersz['id'];

            echo "Zalogowany";
            header('Location: index.php');
        } else {
            echo "zle passy";
            header('Location: index.php');
        }
    }
}

$conn->close();
?>