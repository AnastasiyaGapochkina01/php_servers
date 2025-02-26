<?php
require_once 'db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $ip_address = $_POST['ip_address'];
    $description = $_POST['description'];

    $sql = "INSERT INTO servers (name, ip_address, description) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $name, $ip_address, $description);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Сервер добавлен успешно!";
    } else {
        echo "Ошибка при добавлении сервера.";
    }
}

?>

<form action="" method="post">
    <label for="name">Имя сервера:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="ip_address">IP-адрес:</label>
    <input type="text" id="ip_address" name="ip_address"><br><br>
    <label for="description">Описание:</label>
    <textarea id="description" name="description"></textarea><br><br>
    <input type="submit" name="add" value="Добавить">
</form>

