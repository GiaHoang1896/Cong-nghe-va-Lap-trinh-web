<?php
require 'ex4_db_connect.php';

$query = "SELECT * FROM products ORDER BY productID";
$products = $db->query($query);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>EX4 - Product List</title></head>
<body>
<h2>EX4 - Product List</h2>
<a href="ex4_category_list.php">Xem danh sách Categories</a>
<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Code</th>
  <th>Name</th>
  <th>Price</th>
</tr>
<?php foreach ($products as $p): ?>
<tr>
  <td><?php echo $p['productID']; ?></td>
  <td><?php echo $p['productCode']; ?></td>
  <td><?php echo $p['productName']; ?></td>
  <td><?php echo $p['listPrice']; ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
