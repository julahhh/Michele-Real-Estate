<?php
// -------------------------------------------------
// Buy Page Template:
// This page renders the "Buy" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Buy";
$activePage = "buy";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

?>

<main>
  <!-- Featured Properties section -->
  <?php require ROOT_PATH . "/pages/partials/featured-properties.php"; ?>
  <!-- Call to Action section -->
  <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php 
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>