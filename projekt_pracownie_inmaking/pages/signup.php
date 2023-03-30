<html>
  <head>
    <title>Pizza Delivery - Sign Up</title>
    <link rel="stylesheet" href="../css/css_signup.css">
  </head>
  <body>
  <div class="wrapper">
    <div class="please">
      <h1>Welcome to Pizza Delivery!</h1>
      <h2>Please create an account</h2>
      <button type="button" id="button">
          <a href="login.php" target="_blank">Already have an account? Click Here!</a>
      </button>
      <br>
      <br>
      <br>
    </div>
    <div class="container">
      <form method="post" action="signup.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="pass_word">Password:</label><br>
        <input type="password" id="pass_word" name="pass_word" required><br>
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="phone_number">Phone Number:</label><br>
        <input type="tel" id="phone_number" name="phone_number" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>
        <input type="submit" value="Submit">
      </form> 
      <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass_word = $_POST["pass_word"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];

    require_once "../database/connect.php";

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<p class='error'>Error: Email already exists</p>";
    } else {
        $sql = "INSERT INTO users (email, pass_word, first_name, last_name, phone_number, address)
            VALUES ('$email', '$pass_word', '$first_name', '$last_name', '$phone_number', '$address')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Account created successfully</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }
    }

    mysqli_close($conn);
}
?>

    </div>
  </div>
  </body>
</html>