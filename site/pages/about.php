<?php
// -------------------------------------------------
// About Page Template:
// This page renders the "About Us" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "About Us";
$activePage = "about";

// Global layout includes
require ROOT_PATH . "/partials/head.php";
require ROOT_PATH . "/partials/header.php";

?>

<main>
    <!-- Biography section (partial) -->
    <?php require ROOT_PATH . "/partials/bio.php";?>
    <!-- Call to Action section (partial) -->
    <?php require ROOT_PATH . "/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/partials/footer.php"; 
?>