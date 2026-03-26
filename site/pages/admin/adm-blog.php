<?php
require __DIR__ . "/../../includes/auth.php";
requireAdmin();

require __DIR__ . "/../../includes/data.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <button type="button" onclick="window.location='/admin'">Return to Admin Panel</button>
        <title>Manage Blog Posts</title>
        <link rel="stylesheet" href="/admin.css">
    </head>
    <body>
        <h1>Manage Blog Posts</h1>
    </body> 
</html>
    
