<?php
// -------------------------------------------------
// Rentals Page
// Form logic lives in contact-form.php (Formspree direct)
// and save-lead.php (admin dashboard save).
// -------------------------------------------------

$pageTitle  = "Rentals";
$activePage = "rentals";

require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";
?>

<main>

  <!-- Hero -->
  <section class="hero hero--compact">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">RENTALS</h1>
        <p class="hero__tagline">Whether you're looking for a rental home or want to list yours — Michele can help.</p>
      </div>
    </div>
  </section>

  <!-- Two-Path Section -->
  <section class="rentals-paths">
    <div class="rentals-paths__inner">

      <div class="rentals-path">
        <div class="rentals-path__num">01</div>
        <h2 class="rentals-path__title">FIND A RENTAL HOME</h2>
        <p class="rentals-path__desc">Looking for the perfect place to rent in Central Florida? Michele works with a wide network of landlords and properties across Clermont, Orlando, and surrounding communities. Tell us what you're looking for and we'll get to work finding you the right fit.</p>
        <ul class="rentals-path__list">
          <li>Single-family homes, condos &amp; townhomes</li>
          <li>Short-term and long-term leases</li>
          <li>Pet-friendly and flexible options</li>
          <li>Guided showings with local expertise</li>
        </ul>
        <a class="btn btn--outline" href="#rental-inquiry">INQUIRE ABOUT RENTING</a>
      </div>

      <div class="rentals-path">
        <div class="rentals-path__num">02</div>
        <h2 class="rentals-path__title">LIST YOUR PROPERTY</h2>
        <p class="rentals-path__desc">Ready to rent out your home? Michele helps property owners connect with qualified tenants quickly. From pricing your rental correctly to screening tenants, she handles the process so you don't have to worry about a thing.</p>
        <ul class="rentals-path__list">
          <li>Accurate rental pricing analysis</li>
          <li>Marketing to qualified tenants</li>
          <li>Tenant screening &amp; background checks</li>
          <li>Lease preparation &amp; move-in coordination</li>
        </ul>
        <a class="btn btn--outline" href="#rental-inquiry">INQUIRE ABOUT LISTING</a>
      </div>

    </div>
  </section>

  <!-- Rental Inquiry Form -->
  <section class="rental-inquiry" id="rental-inquiry">
    <div class="rental-inquiry__inner">
      <?php
        $form = [
          'title'      => 'GET IN TOUCH',
          'sub'        => 'Tell us a little about what you need and Michele will reach out within 24 hours.',
          'submitText' => 'SEND INQUIRY',
          'redirect'   => '/rentals?sent=1#rental-inquiry',
          'placeholder' => "Tell us about what you're looking for or the property you'd like to list...",
          'successMsg' => 'Thanks! Your inquiry has been received. Michele will be in touch shortly.',
          'errorMsg'   => 'Please fill in your name, a valid email, select an inquiry type, and include a message.',
        ];
        require ROOT_PATH . "/pages/partials/contact-form.php";
      ?>
    </div>
  </section>

  <?php require ROOT_PATH . "/pages/partials/testimonials.php"; ?>
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
