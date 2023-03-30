<!DOCTYPE html>
<html>
<head>
  <title>Pizza Delivery - Add Pizza</title>
  <link rel="stylesheet" href="../css/css_admin_add_pizza.css">
</head>
<body>
  <h1>Add a new Pizza</h1>
  <a href=admin.php>Back to admin.php</a>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="name">Pizza Name:</label>
    <input type="text" id="name" name="name"><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price"><br>
    <input type="submit" value="Add Pizza">
  </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "../database/connect.php";
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $sql = "INSERT INTO pizzas (name, description, price)
        VALUES ('$name', '$description', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "New Pizza added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
</body>
</html>