<?php
// -------------------------------------------------
// Sell Page Template:
// This page renders the "Sell" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Sell";
$activePage = "sell";

// Global layout includes
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

?>

<main>
  <!-- Testimonials section (partial) -->
  <?php require __DIR__ . "/partials/testimonials.php";?>    

  <!-- Call to Action section (partial) -->
  <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require __DIR__ . "/partials/footer.php"; 
?>