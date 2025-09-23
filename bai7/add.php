<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Thêm thể loại</title></head>
<body>
<h2>Thêm thể loại</h2>
<form method="post">
    Tên thể loại: <input type="text" name="TenTL"><br><br>
    Thứ tự: <input type="number" name="ThuTu"><br><br>
    Ẩn/Hiện (1=Hiện, 0=Ẩn): <input type="number" name="AnHien" min="0" max="1"><br><br>
    Icon: <input type="text" name="icon"><br><br>
    <input type="submit" name="btn_add" value="Thêm">
</form>
<?php
if (isset($_POST['btn_add'])) {
    $TenTL = $_POST['TenTL'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $icon = $_POST['icon'];

    $sql = "INSERT INTO theloai (TenTL, ThuTu, AnHien, icon)
            VALUES ('$TenTL', '$ThuTu', '$AnHien', '$icon')";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
