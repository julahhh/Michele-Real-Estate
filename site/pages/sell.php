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
          Ready to sell?<br>
        </h1>
      </div>
    </div>
  </section>

  <!-- Testimonials section (partial) -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php";?>    

  <!-- Call to Action section (partial) -->
  <?php require ROOT_PATH . "/pages/partials/cta.php";?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php"; 
?>