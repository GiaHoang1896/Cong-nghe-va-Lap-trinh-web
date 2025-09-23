<?php
$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1;charset=utf8';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Lỗi kết nối: $error_message";
    exit();
}
?>
