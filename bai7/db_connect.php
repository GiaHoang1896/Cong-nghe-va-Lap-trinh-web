<?php
$servername = "localhost";
$username = "root";    // mặc định của XAMPP
$password = "";        // mặc định rỗng
$dbname = "tintuc";

// Kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
