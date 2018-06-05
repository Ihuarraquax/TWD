<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
    $sql = "SELECT login, haslo FROM users";
$result = $conn->query($sql);



$conn->close();

















   echo $_POST["login"];
   echo $_POST["haslo"];










?>