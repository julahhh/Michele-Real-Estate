<?php
// -------------------------------------------------
// Contact Page
// Form logic lives in contact-form.php (Formspree direct)
// and save-lead.php (admin dashboard save).
// -------------------------------------------------

$pageTitle  = "Contact Michele";
$activePage = "contact";

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
        <h1 class="hero__title">LET'S TALK</h1>
        <p class="hero__tagline">Reach out today for a free consultation or home valuation.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section — Info + Form -->
  <section class="contact-page">
    <div class="contact-page__inner">

      <!-- Left: Contact Info -->
      <div class="contact-info">
        <h2 class="contact-info__title">GET IN TOUCH</h2>
        <p class="contact-info__intro">Michele and her team are available to answer questions, schedule showings, or discuss your real estate goals. Don't hesitate to reach out.</p>

        <ul class="contact-info__list">
          <li class="contact-info__item">
            <span class="contact-info__label">PHONE</span>
            <span class="contact-info__value">(321) 948-4332</span>
          </li>
          <li class="contact-info__item">
            <span class="contact-info__label">EMAIL</span>
            <span class="contact-info__value">michele.rueff@exprealty.com</span>
          </li>
          <li class="contact-info__item">
            <span class="contact-info__label">OFFICE</span>
            <span class="contact-info__value">eXp-Winning Realty<br>Clermont, Florida</span>
          </li>
          <li class="contact-info__item">
            <span class="contact-info__label">SERVICE AREA</span>
            <span class="contact-info__value">Clermont, Orlando &amp;<br>Central Florida</span>
          </li>
          <li class="contact-info__item">
            <span class="contact-info__label">HOURS</span>
            <span class="contact-info__value">
              Mon – Fri &nbsp; 8am – 7pm<br>
              Sat – Sun &nbsp; 9am – 5pm
            </span>
          </li>
        </ul>

        <div class="contact-info__divider"></div>

        <div class="contact-info__brokerage">
          <img src="/assets/img/exp-logo.webp" alt="eXp Realty" class="contact-info__brokerage-logo">
        </div>
      </div>

      <!-- Right: Contact Form -->
      <div class="contact-form-panel">
        <?php
          $form = [
            'title'      => 'SEND A MESSAGE',
            'sub'        => 'Tell us a little about what you need and Michele will reach out within 24 hours.',
            'submitText' => 'SEND MESSAGE',
            'redirect'   => '/contact?sent=1',
            'placeholder' => "Tell us about what you're looking for...",
            'successMsg' => 'Thanks! Your message has been sent. Michele will be in touch shortly.',
          ];
          require ROOT_PATH . "/pages/partials/contact-form.php";
        ?>
      </div>

    </div>
  </section>

</main>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
