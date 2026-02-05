<?php
// -------------------------------------------------
// Buy Page Template:
// This page renders the "Buy" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Buy";
$activePage = "buy";

// Global layout includes
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

?>

<main>
  <!-- Featured Properties section -->
  <?php require __DIR__ . "/partials/featured-properties.php"; ?>
  <!-- Call to Action section -->
  <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php 
// Site footer (global)
require __DIR__ . "/partials/footer.php";
?>