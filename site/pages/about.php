<?php
// -------------------------------------------------
// About Page Template:
// This page renders the "About Us" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "About Michele";
$activePage = "about";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

// Override bio CTA — on the About page we don't need "Learn More" linking back here.
// Point the button to the contact page instead.
$bio = [
  "heading"  => "MEET MICHELE",
  "image"    => "/assets/img/meet-michele.jpg",
  "imageAlt" => "Portrait of Michele Rueff",
  "ctaHref"  => "/contact",
  "ctaText"  => "GET IN TOUCH",
  "body"     => [
    "Michele Rueff is a Central Florida real estate professional serving Clermont, Orlando, and surrounding areas since 2007. She holds a Bachelor's degree in Business and Marketing from the University of Central Florida and brings a rare blend of real estate, construction, and negotiation expertise to every transaction.",
    "She has personally bought, sold, and renovated 80+ homes, giving her deep insight into rehabs, investment strategy, interior design, and contracts. She specializes in pre-foreclosures, short sales, distressed properties, and complex transactions. Michele is a member of Florida Realtors and the National Association of Realtors and is proud to be with eXp-Winning Realty in Clermont, Florida.",
  ],
];
?>

<main>
  <!-- =====================================================
    Hero Section
  ===================================================== -->
  <section class="hero">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">
          ABOUT MICHELE<br>
          <span class="hero__subtitle">YOUR TRUSTED AGENT</span>
        </h1>
        <div class="hero__buttons">
          <a class="btn btn--ghost" href="/contact">CONTACT</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Biography Partial -->
  <?php require ROOT_PATH . "/pages/partials/bio.php"; ?>

  <!-- =====================================================
    Expertise & Credentials Section
  ===================================================== -->
  <section class="about-credentials">
    <div class="about-credentials__inner">

      <h2 class="about-credentials__title">EXPERTISE &amp; CREDENTIALS</h2>

      <div class="about-credentials__grid">

        <div class="about-credentials__card">
          <div class="about-credentials__number">18+</div>
          <div class="about-credentials__label">Years of Experience</div>
          <p class="about-credentials__desc">Serving Clermont, Orlando, and surrounding Central Florida communities since 2007.</p>
        </div>

        <div class="about-credentials__card">
          <div class="about-credentials__number">80+</div>
          <div class="about-credentials__label">Homes Bought &amp; Renovated</div>
          <p class="about-credentials__desc">Hands-on expertise in rehabs, investment strategy, and interior design from personal experience.</p>
        </div>

        <div class="about-credentials__card">
          <div class="about-credentials__number">BSc</div>
          <div class="about-credentials__label">Business &amp; Marketing, UCF</div>
          <p class="about-credentials__desc">Bachelor's degree from the University of Central Florida with a focus on marketing and business strategy.</p>
        </div>

      </div>

      <div class="about-credentials__specialties">
        <h3 class="about-credentials__specialties-title">SPECIALIZATIONS</h3>
        <ul class="about-credentials__list">
          <li>Pre-Foreclosures &amp; Short Sales</li>
          <li>Distressed &amp; Complex Transactions</li>
          <li>Investment &amp; Rehab Properties</li>
          <li>Negotiation &amp; Contract Expertise</li>
          <li>Interior Design &amp; Staging</li>
          <li>Florida Realtors &amp; NAR Member</li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Testimonials Partial -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>
</main>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
