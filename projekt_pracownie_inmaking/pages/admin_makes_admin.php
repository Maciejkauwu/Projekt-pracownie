<!DOCTYPE html>
<html>
<head>
  <title>Pizza Delivery -Admin Permissions Panel</title>
  <link rel="stylesheet" href="../css/css_admin_makes_admin.css">
</head>
<body>
  <h1>Admin Permissions Panel</h1>
  <a href=admin.php>Back to admin.php</a>
  <?php if (isset($message)) { echo $message; } ?>
  <form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="admin">Admin:</label>
    <select id="admin" name="admin" required>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Update">
  </form>
</body>
</html>
<?php
require_once "../database/connect.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $admin = $_POST['admin'];

    // Update the admin column for the specified email
    $sql = "UPDATE users SET admin='$admin' WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        $message = "Record updated successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($conn);
    }
}
?>