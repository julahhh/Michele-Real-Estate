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
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";
?>

<main>
  <!-- Quick-access tiles Partial (Buy / Sell / Contact, etc.) -->
  <?php require __DIR__ . "/partials/quick-links.php"; ?>

  <!-- Biography Partial -->
  <?php require __DIR__ . "/partials/bio.php";?>

  <!-- Testimonials Partial -->
  <?php require __DIR__ . "/partials/testimonials.php";?>

  <!-- Featured Properties Partial -->
  <?php require __DIR__ . "/partials/featured-properties.php"; ?>

  <!-- Call to Action Partial -->
  <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require __DIR__ . "/partials/footer.php";
?>
