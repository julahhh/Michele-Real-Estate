<?php
/* =====================================================
Head Template Partial
- Outputs the HTML <head> section and opens the <body>
  tag for all site pages.
- Include this partial near the top of every page before 
  header/navigation partials.
  ===================================================== */

  
  // Ensure $pageTitle is set to a default if not provided
  if (!isset($pageTitle)) $pageTitle = "Michele Rueff & Associates";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Page title -->
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- Global stylesheet -->
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
