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
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";
?>

<main>
<!-- =====================================================
  Hero Section
  - Background overlay handled in CSS
  - Title branding + CTA buttons
===================================================== -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
  <div class="hero__overlay" aria-hidden="true"></div>

  <div class="hero__inner">
    <div class="hero__content">
    <!-- Main title / branding -->
    <h1 class="hero__title">
      MICHELE RUEFF<br>
      <span class="hero__subtitle">&amp; ASSOCIATES</span>
    </h1>
      </h1>

      <!-- Hero call to action buttons -->
      <div class="hero__buttons">
        <a class="btn btn--ghost" href="/about">ABOUT</a>
        <a class="btn btn--ghost" href="/search">SEARCH HOMES</a>
      </div>

    </div>
  </div>
</section>

  <!-- Quick-access tiles Partial (Buy / Sell / Contact, etc.) -->
  <?php require ROOT_PATH . "/pages/partials/quick-links.php"; ?>

  <!-- Biography Partial -->
  <?php require ROOT_PATH . "/pages/partials/bio.php";?>

  <!-- Testimonials Partial -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php";?>

  <!-- Featured Properties Partial -->
  <?php require ROOT_PATH . "/pages/partials/featured-properties.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
