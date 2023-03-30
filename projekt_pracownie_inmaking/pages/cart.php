<html>
  <head>
    <title>Pizza Delivery - Cart</title>
    <link rel="stylesheet" href="../css/css_main.css">
  </head>
  <body>
    <div class="container">
      <h1>Pizza Delivery Co.</h1>
      <h2>Cart</h2>
      <table>
        <tr>
          <th>Pizza</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
        <?php
        
          session_start();

         
          require_once "../database/connect.php";

          if (!isset($_SESSION["user_id"])) {
            header("Location: ../pages/main.php");
            exit;
          }

          // Retrieve the cart items for the current user
          $sql = "SELECT pizzas.name, cart.quantity, pizzas.price
                  FROM cart
                  JOIN pizzas ON cart.pizza_id = pizzas.id
                  WHERE cart.user_id = " . $_SESSION["user_id"];
          $result = mysqli_query($conn, $sql);
          
          // Calculate the total price
          $total = 0;
          

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["price"] * $row["quantity"] . "</td>";
            echo "</tr>";
            $total += $row["price"] * $row["quantity"];
          }
          
          // Display the total price
          echo "<tr><td colspan='2'><b>Total</b></td><td><b>" . $total . "</b></td></tr>";
          

          mysqli_close($conn);
        ?>
      </table>
      <br>
      <div>
      <a href="payment.php" target="_blank">Proceed to payment</a>
      </div>
      <br>
      <a href="main.php">Back to Main Page</a>
    </div>
  </body>
</html>