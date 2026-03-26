<?php
// -------------------------------------------------
// Sell Page Template:
// This page renders the "Sell" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Sell";
$activePage = "sell";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

?>

<main>
  <!-- Testimonials section (partial) -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php";?>    

  <!-- Call to Action section (partial) -->
  <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/partials/footer.php"; 
?>