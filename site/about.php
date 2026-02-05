<?php
// -------------------------------------------------
// About Page Template:
// This page renders the "About Us" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "About Us";
$activePage = "about";

// Global layout includes
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

?>

<main>
    <!-- Biography section (partial) -->
    <?php require __DIR__ . "/partials/bio.php";?>
    <!-- Call to Action section (partial) -->
    <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require __DIR__ . "/partials/footer.php"; 
?>