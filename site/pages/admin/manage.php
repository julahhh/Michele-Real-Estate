<?php
require __DIR__ . "/../../includes/auth.php";
requireAdmin();

if (empty($_SESSION["admin"])) {
  header("Location: /admin/login");
  exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <button type="button" onclick="window.location='/admin/logout'">Logout</button>
    <link rel="stylesheet" href="/admin.css">
</head>
<body>
  <h1>Admin Panel</h1>
  <p>Welcome to the admin panel. Use the links below to manage listings and blog posts.</p>
  <ul>
    <li><a href="/admin/properties">Manage Listed Properties</a></li>
    <li><a href="/admin/sell">Manage Sell Page</a></li>
    <li><a href="/admin/blog">Manage Blog Page</a></li>
    <li><a href="/admin/logout">Logout</a></li>
  </ul>

</body>
</html>