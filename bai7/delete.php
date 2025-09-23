<?php include 'db_connect.php'; ?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM theloai WHERE idTL=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>
