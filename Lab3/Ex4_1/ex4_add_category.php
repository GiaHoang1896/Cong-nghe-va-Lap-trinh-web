<?php
require 'ex4_db_connect.php';

if (isset($_POST['btn_add'])) {
    $name = $_POST['categoryName'];
    $sql = "INSERT INTO categories (categoryName) VALUES (:name)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
    header("Location: ex4_category_list.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>EX4 - Thêm Category</title></head>
<body>
<h2>EX4 - Thêm Category</h2>
<form method="post">
    Tên category: <input type="text" name="categoryName" required>
    <input type="submit" name="btn_add" value="Thêm">
</form>
<a href="ex4_category_list.php">Quay về danh sách</a>
</body>
</html>
