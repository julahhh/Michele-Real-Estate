<?php
require __DIR__ . "/../../includes/auth.php";
requireAdmin();

if (empty($_SESSION["admin"])) {
  header("Location: /admin/login");
  exit;
}
?>

<main>
    
  <h1>Admin Panel</h1>
  <p>Welcome to the admin panel. Use the links below to manage listings and blog posts.</p>
  <ul>
    <li><a href="/admin/properties">Manage Properties</a></li>
    <li><a href="/admin/sell">Manage Sold Properties</a></li>
    <li><a href="/admin/blog">Manage Blog Posts</a></li>
    <li><a href="/admin/logout">Logout</a></li>
  </ul>

</main> 