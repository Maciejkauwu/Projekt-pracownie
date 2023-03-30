<!DOCTYPE html>
<html>
<head>
  <title>Pizza Delivery - Add Payment Method</title>
  <link rel="stylesheet" href="../css/css_admin_add_pizza.css">
</head>
<body>
  <h1>Add payment method to the database</h1>
  <a href=admin.php>Back to admin.php</a>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="method">payment_method_name:</label>
    <input type="text" id="method" name="method"><br>
    <input type="submit" value="Add payment">
  </form>
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "../database/connect.php";
    if (isset($_POST['method'])) {
        $method = $_POST['method'];

        $sql = "INSERT INTO payment_methods (method)
        VALUES ('$method')";

        if ($conn->query($sql) === TRUE) {
            echo "New payment method added succesfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?> 
</body>
</html>