<?php
// Lấy dữ liệu từ form
$product_description = $_POST['product_description'];
$list_price = $_POST['list_price'];
$discount_percent = $_POST['discount_percent'];

// Chuyển đổi dữ liệu sang số
$list_price = floatval($list_price);
$discount_percent = floatval($discount_percent);

// Tính toán
$discount = $list_price * $discount_percent * 0.01;
$discount_price = $list_price - $discount;

// Định dạng tiền tệ và %
$list_price_f = "$" . number_format($list_price, 2);
$discount_percent_f = $discount_percent . "%";
$discount_f = "$" . number_format($discount, 2);
$discount_price_f = "$" . number_format($discount_price, 2);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Product Discount Calculator</title>
</head>
<body>
  <h1>Product Discount Calculator</h1>

  <label>Product Description:</label>
  <span><?php echo htmlspecialchars($product_description); ?></span><br>

  <label>List Price:</label>
  <span><?php echo $list_price_f; ?></span><br>

  <label>Standard Discount:</label>
  <span><?php echo $discount_percent_f; ?></span><br>

  <label>Discount Amount:</label>
  <span><?php echo $discount_f; ?></span><br>

  <label>Discount Price:</label>
  <span><?php echo $discount_price_f; ?></span><br>
</body>
</html>
