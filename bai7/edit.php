<?php include 'db_connect.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM theloai WHERE idTL=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Sửa thể loại</title></head>
<body>
<h2>Sửa thể loại</h2>
<form method="post">
    Tên thể loại: <input type="text" name="TenTL" value="<?php echo $row['TenTL']; ?>"><br><br>
    Thứ tự: <input type="number" name="ThuTu" value="<?php echo $row['ThuTu']; ?>"><br><br>
    Ẩn/Hiện (1=Hiện, 0=Ẩn): <input type="number" name="AnHien" value="<?php echo $row['AnHien']; ?>"><br><br>
    Icon: <input type="text" name="icon" value="<?php echo $row['icon']; ?>"><br><br>
    <input type="submit" name="btn_update" value="Cập nhật">
</form>
<?php
if (isset($_POST['btn_update'])) {
    $TenTL = $_POST['TenTL'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $icon = $_POST['icon'];

    $sql = "UPDATE theloai SET TenTL='$TenTL', ThuTu='$ThuTu', AnHien='$AnHien', icon='$icon'
            WHERE idTL=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
