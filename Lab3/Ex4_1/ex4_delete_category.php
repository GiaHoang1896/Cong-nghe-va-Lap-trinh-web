<?php
require 'ex4_db_connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE categoryID = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
header("Location: ex4_category_list.php");
?>
