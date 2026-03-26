<?php
session_start();

$PASSWORD = "password123"; // Change this to a secure password

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($_POST["password"] === $PASSWORD) {
    $_SESSION["admin"] = true;
    header("Location: /admin");
    exit;
  }
}

?>

<form method="post">
  <input type="password" name="password" placeholder="Enter password">
  <button type="submit">Login</button>
</form>