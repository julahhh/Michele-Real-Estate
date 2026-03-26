<?php
// -------------------------------------------------
// Buy Page Template:
// This page renders the "Buy" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Buy";
$activePage = "buy";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

?>

<main>
  <!-- =====================================================
    Hero Section
    - Background image + overlay handled in CSS
    - Title branding + CTA buttons
  ===================================================== -->
  <section class="hero">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero-sunset.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="hero__inner">
      <div class="hero__content">

        <!-- Main title / branding -->
        <h1 class="hero__title">
          Ready to Buy?<br>
        </h1>

      <div class="hero__buttons">
        <a class="btn btn--ghost" href="/contact">CONTACT</a>
      </div>


      </div>
    </div>
  </section>

  <!-- Featured Properties section -->
  <?php require ROOT_PATH . "/pages/partials/featured-properties.php"; ?>
  <!-- Call to Action section -->
  <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php 
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>