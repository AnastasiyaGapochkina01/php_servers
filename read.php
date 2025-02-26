<?php
require_once 'db.php';

$sql = "SELECT * FROM servers";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Имя: " . $row["name"]. " - IP: " . $row["ip_address"]. " - Описание: " . $row["description"]. "<br>";
    }
} else {
    echo "Нет записей.";
}
?>

