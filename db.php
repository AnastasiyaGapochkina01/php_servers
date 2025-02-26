<?php
$servername = "localhost";
$username = "root";
$password = "0000";
$dbname = "servers_db";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}
?>

