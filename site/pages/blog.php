<?php
// -------------------------------------------------
// Blog Page Template:
// This page renders the "Blog" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Blog Home";
$activePage = "blog";

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