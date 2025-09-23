<?php
require 'ex4_db_connect.php';
$query = "SELECT * FROM categories ORDER BY categoryID";
$categories = $db->query($query);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>EX4 - Category List</title></head>
<body>
<h2>EX4 - Category List</h2>
<a href="ex4_index.php">Quay về Product List</a> | 
<a href="ex4_add_category.php">+ Thêm Category</a>
<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Action</th>
</tr>
<?php foreach ($categories as $c): ?>
<tr>
  <td><?php echo $c['categoryID']; ?></td>
  <td><?php echo $c['categoryName']; ?></td>
  <td>
    <a href="ex4_delete_category.php?id=<?php echo $c['categoryID']; ?>"
       onclick="return confirm('Xóa category này?');">Xóa</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
