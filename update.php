<?php
require_once 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $ip_address = $_POST['ip_address'];
    $description = $_POST['description'];

    $sql = "UPDATE servers SET name = ?, ip_address = ?, description = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssi", $name, $ip_address, $description, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Сервер обновлен успешно!";
    } else {
        echo "Ошибка при обновлении сервера.";
    }
}

// Вывод формы для обновления
$sql = "SELECT * FROM servers";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<label for='name'>Имя сервера:</label>";
        echo "<input type='text' id='name' name='name' value='" . $row['name'] . "'><br><br>";
        echo "<label for='ip_address'>IP-адрес:</label>";
        echo "<input type='text' id='ip_address' name='ip_address' value='" . $row['ip_address'] . "'><br><br>";
        echo "<label for='description'>Описание:</label>";
        echo "<textarea id='description' name='description'>" . $row['description'] . "</textarea><br><br>";
        echo "<input type='submit' name='update' value='Обновить'>";
        echo "</form><br>";
    }
} else {
    echo "Нет записей.";
}
?>

