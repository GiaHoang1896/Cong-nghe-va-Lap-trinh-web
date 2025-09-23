<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách thể loại</title>
</head>
<body>
<h2>Danh sách thể loại</h2>
<a href="add.php">+ Thêm thể loại</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên thể loại</th>
        <th>Thứ tự</th>
        <th>Ẩn/Hiện</th>
        <th>Icon</th>
        <th>Hành động</th>
    </tr>
    <?php
    $sql = "SELECT * FROM theloai ORDER BY ThuTu ASC";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['idTL']."</td>";
        echo "<td>".$row['TenTL']."</td>";
        echo "<td>".$row['ThuTu']."</td>";
        echo "<td>".($row['AnHien'] ? "Hiện" : "Ẩn")."</td>";
        echo "<td>".$row['icon']."</td>";
        echo "<td>
                <a href='edit.php?id=".$row['idTL']."'>Sửa</a> | 
                <a href='delete.php?id=".$row['idTL']."' onclick='return confirm(\"Xóa mục này?\")'>Xóa</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
