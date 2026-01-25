<?php
$pageTitle = "Home";
$activePage = "home";

require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";
?>

<main>
  <?php require __DIR__ . "/partials/bio.php";?>
  <?php require __DIR__ . "/partials/testimonials.php";?>
  <?php require __DIR__ . "/partials/cta.php";?>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>
