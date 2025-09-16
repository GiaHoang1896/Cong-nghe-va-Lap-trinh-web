<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bài 6.1 - Nhập và tính toán dãy số</title>
</head>
<body>
<h2>Nhập và tính toán trong dãy số</h2>
<form method="post">
    Nhập dãy số (cách nhau bởi dấu phẩy): 
    <input type="text" name="dayso" size="50"
           value="<?php if(isset($_POST['dayso'])) echo $_POST['dayso']; ?>">
    <input type="submit" name="btn_tong" value="Tính tổng">
</form>
<?php
if (isset($_POST['btn_tong'])) {
    $mang = explode(",", $_POST['dayso']);  
    $tong = 0;
    foreach($mang as $so) {
        $tong += (int)$so;
    }
    echo "<p>Tổng dãy số: $tong</p>";
}
?>
</body>
</html>
