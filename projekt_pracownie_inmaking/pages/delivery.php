<html>
  <head>
    <title>Pizza Delivery - Delivery</title>
    <link rel="stylesheet" href="../css/css_delivery.css">
  </head>
  <body>
    <div class="container">
      <div class="del_opt">
        <h1>Delivery Options</h1>
      </div>
      <form method="post" action="delivery.php">
        <label for="location">Delivery Location:</label><br>
        <input type="text" id="location" name="location"><br>
        <label for="instructions">Special Instructions:</label><br>
        <textarea id="instructions" name="instructions"></textarea><br><br>
        <input type="submit" value="Submit">
      </form> 
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $location = $_POST["location"];
          $instructions = $_POST["instructions"];
          

          require_once "../database/connect.php";
          

          $sql = "INSERT INTO orders (location, instructions)
                  VALUES ('$location', '$instructions')";
          if (mysqli_query($conn, $sql)) {
            echo "<p>Delivery information saved successfully</p>";
          } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
          }
          

          mysqli_close($conn);
        }
      ?> 
    </div>