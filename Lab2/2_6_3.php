<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bài 6.3 - Đếm và tạo mảng duy nhất</title>
</head>
<body>
<h2>Đếm số lần xuất hiện và tạo mảng duy nhất</h2>
<form method="post">
    Nhập mảng (các số cách nhau bởi dấu phẩy): 
    <input type="text" name="dayso2" size="50"
           value="<?php if(isset($_POST['dayso2'])) echo $_POST['dayso2']; ?>">
    <input type="submit" name="btn_dem" value="Thực hiện">
</form>
<?php
if (isset($_POST['btn_dem'])) {
    $arr2 = explode(",", $_POST['dayso2']);
    $arr2 = array_map('trim', $arr2); 
    
    echo "<h3>Kết quả:</h3>";
    echo "<p>Mảng ban đầu: " . implode(", ", $arr2) . "</p>";

    
    $dem = array_count_values($arr2);
    echo "<p>Số lần xuất hiện từng phần tử:</p><ul>";
    foreach($dem as $ptu => $solan) {
        echo "<li>$ptu xuất hiện $solan lần</li>";
    }
    echo "</ul>";

 
    $unique = array_unique($arr2);
    echo "<p>Mảng duy nhất (loại bỏ trùng): " . implode(", ", $unique) . "</p>";
}
?>
</body>
</html>
