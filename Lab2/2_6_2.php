<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bài 6.2 - Mảng ngẫu nhiên</title>
</head>
<body>
<h2>Tạo mảng ngẫu nhiên - Tìm max, min, tính tổng</h2>
<form method="post">
    Nhập số phần tử: 
    <input type="text" name="so_ptu" size="10"
           value="<?php if(isset($_POST['so_ptu'])) echo $_POST['so_ptu']; ?>">
    <input type="submit" name="btn_random" value="Phát sinh mảng">
</form>
<?php
if (isset($_POST['btn_random'])) {
    $n = (int)$_POST['so_ptu'];
    if ($n > 0) {
        $arr = [];
        for ($i=0; $i<$n; $i++) {
            $arr[$i] = rand(0,20);
        }
        echo "<p>Mảng phát sinh: " . implode(", ", $arr) . "</p>";
        echo "<p>Max: " . max($arr) . "</p>";
        echo "<p>Min: " . min($arr) . "</p>";
        echo "<p>Tổng: " . array_sum($arr) . "</p>";
    } else {
        echo "<p style='color:red;'>Số phần tử phải lớn hơn 0.</p>";
    }
}
?>
</body>
</html>
