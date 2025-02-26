<?php
require_once 'db.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM servers WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Сервер удален успешно!";
    } else {
        echo "Ошибка при удалении сервера.";
    }
}

// Вывод формы для удаления
$sql = "SELECT * FROM servers";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "ID: " . $row["id"]. " - Имя: " . $row["name"]. " - IP: " . $row["ip_address"]. " - Описание: " . $row["description"]. "<br>";
        echo "<input type='submit' name='delete' value='Удалить'>";
        echo "</form><br>";
    }
} else {
    echo "Нет записей.";
}
?>

