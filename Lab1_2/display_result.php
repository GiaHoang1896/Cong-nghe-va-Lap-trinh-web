<?php
$investment = $_POST['investment'];
$interest_rate = $_POST['interest_rate'];
$years = $_POST['years'];

$investment = floatval($investment);
$interest_rate = floatval($interest_rate);
$years = intval($years);

$error_message = '';
if ($investment <= 0) {
    $error_message = 'Investment amount must be greater than 0.';
} else if ($interest_rate <= 0 || $interest_rate > 15) {
    $error_message = 'Interest rate must be greater than 0 and less than or equal to 15.';
} else if ($years <= 0) {
    $error_message = 'Number of years must be greater than 0.';
}


if (!empty($error_message)) {
    include('index.php');
    echo "<p style='color:red;'>$error_message</p>";
    exit();
}


$future_value = $investment;
for ($i = 1; $i <= $years; $i++) {
    $future_value += $future_value * $interest_rate * 0.01;
}


$investment_f = "$" . number_format($investment, 2);
$yearly_rate_f = $interest_rate . "%";
$future_value_f = "$" . number_format($future_value, 2);


$calculation_date = date('m/d/Y');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Future Value Result</title>
</head>
<body>
  <h1>Future Value Calculator</h1>

  <label>Investment Amount:</label>
  <span><?php echo $investment_f; ?></span><br>

  <label>Yearly Interest Rate:</label>
  <span><?php echo $yearly_rate_f; ?></span><br>

  <label>Number of Years:</label>
  <span><?php echo $years; ?></span><br>

  <label>Future Value:</label>
  <span><?php echo $future_value_f; ?></span><br><br>

  <p>This calculation was done on <?php echo $calculation_date; ?>.</p>
</body>
</html>
