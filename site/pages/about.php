<?php
// -------------------------------------------------
// About Page Template:
// This page renders the "About Us" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "About Us";
$activePage = "about";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

?>

<main>
    <!-- Biography section (partial) -->
    <?php require ROOT_PATH . "/pages/partials/bio.php";?>
    <!-- Call to Action section (partial) -->
    <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php"; 
?>