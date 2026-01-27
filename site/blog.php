<?php
$pageTitle = "Blog Home";
$activePage = "blog";

require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

?>

<main>
    <?php require __DIR__ . "/partials/bio.php";?>
    <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>