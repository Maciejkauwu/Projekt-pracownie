<!DOCTYPE html>
<html>
<head>
  <title>Pizza Delivery - Select Payment Method</title>
  <link rel="stylesheet" href="../css/css_payment.css">
</head>
<body>
<div class="container">
<div class="form">
<?php
require_once "../database/connect.php";

$sql = "SELECT id, method FROM payment_methods";
$result = $conn->query($sql);

echo '<form action="process_payment.php" method="post">';
echo '<label for="payment_method">Select a payment method:</label>';
echo '<select name="payment_method" id="payment_method">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["id"].'">'.$row["method"].'</option>';
    }
} else {
    echo "0 results";
}
echo '</select>';
echo '<input type="submit" value="Submit">';
echo '</form>';

$conn->close();
?>
</div>
</div>
</body>
</html>