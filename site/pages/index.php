<?php
// -------------------------------------------------
// Home Page Template
// -------------------------------------------------
// Primary landing page for the site.
// Composed entirely of reusable partials so the layout can be rearranged or reused easily.
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Buy & Sell with Michele - Your Trusted Real Estate Agent";
$activePage = "home";

// Global layout includes
require ROOT_PATH . "/partials/head.php";
require ROOT_PATH . "/partials/header.php";
?>

<main>
  <!-- Quick-access tiles Partial (Buy / Sell / Contact, etc.) -->
  <?php require ROOT_PATH . "/partials/quick-links.php"; ?>

  <!-- Biography Partial -->
  <?php require ROOT_PATH . "/partials/bio.php";?>

  <!-- Testimonials Partial -->
  <?php require ROOT_PATH . "/partials/testimonials.php";?>

  <!-- Featured Properties Partial -->
  <?php require ROOT_PATH . "/partials/featured-properties.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/partials/footer.php";
?>
