<?php
// -------------------------------------------------
// Contact Page Template:
// Handles rendering the Contact page and processing basic form submissions.
// Designed to be swapped later with a real contact form handler/service.
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Contact Michele";
$activePage = "contact";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

// Form submission handling (placeholder)
// validates basic inputs and simulates sending
$sent = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Honeypot spam protection
  // If this hidden field is filled, assume bot submission
  if (!empty($_POST["company"] ?? "")) {
    $sent = true;    // silently pretend success

  } else {
    // Sanitize and normalize user input
    $name    = trim($_POST["name"]    ?? "");
    $email   = trim($_POST["email"]   ?? "");
    $phone   = trim($_POST["phone"]   ?? "");
    $message = trim($_POST["message"] ?? "");

    // Basic validation
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
      $sent = true;

      // Save lead to data/leads.json
      require_once ROOT_PATH . "/includes/data.php";
      $leadsFile = ROOT_PATH . "/data/leads.json";
      $leads     = readJson($leadsFile);
      $leads[]   = [
        "id"      => time() . rand(10, 99),   // unique enough for a small site
        "name"    => $name,
        "email"   => $email,
        "phone"   => $phone,
        "message" => $message,
        "date"    => date("Y-m-d H:i:s"),
        "read"    => false,
      ];
      writeJson($leadsFile, $leads);

    } else {
      $error = "Please fill in your name, a valid email, and a message.";
    }
  }
}
?>

<main>

  <!-- =====================================================
    Hero Section (compact)
  ===================================================== -->
  <section class="hero hero--compact">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">
          LET'S TALK
        </h1>
        <p class="hero__tagline">Reach out today for a free consultation or home valuation.</p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Contact Section — Info + Form
  ===================================================== -->
  <section class="contact-page">
    <div class="contact-page__inner">

      <!-- Left: Contact Info Panel -->
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
            <span class="contact-info__value">michele@exprealty.com</span>
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

        <!-- Brokerage logo -->
        <div class="contact-info__brokerage">
          <img src="/assets/img/exp-logo.webp" alt="eXp Realty" class="contact-info__brokerage-logo">
        </div>

      </div>

      <!-- Right: Contact Form Panel -->
      <div class="contact-form-panel">

        <!-- Display success or error messages -->
        <?php if ($sent): ?>
          <div class="notice notice--success">Thanks! Your message has been sent. Michele will be in touch shortly.</div>
        <?php elseif (!empty($error)): ?>
          <div class="notice notice--error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php
          $form = [
            "title"      => "Send a Message",
            "action"     => "/contact.php",
            "submitText" => "Send Message",
          ];
          require ROOT_PATH . "/pages/partials/contact-form.php";
        ?>

      </div>

    </div>
  </section>

</main>

<style>
/* =====================================================
   Contact Page — Layout & Info Panel
   (page-scoped styles)
===================================================== */

/* Compact hero variant */
.hero--compact {
  min-height: 360px !important;
}

.hero__tagline {
  margin: 14px 0 0;
  font-size: 14px;
  letter-spacing: 0.10em;
  color: rgba(255, 255, 255, 0.75);
  font-weight: 100;
}

/* ---- Outer Section ---- */
.contact-page {
  background: #f3efe8;
  padding: 0;
}

.contact-page__inner {
  max-width: 1180px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 380px 1fr;
  min-height: 620px;
}

/* ---- Info Panel (dark left column) ---- */
.contact-info {
  background: #111;
  padding: 60px 44px;
  display: flex;
  flex-direction: column;
}

.contact-info__title {
  margin: 0 0 16px;
  font-size: 22px;
  letter-spacing: 0.16em;
  font-weight: 300;
  text-transform: uppercase;
  color: #fff;
}

.contact-info__intro {
  font-size: 13px;
  line-height: 1.80;
  color: rgba(255, 255, 255, 0.55);
  font-weight: 100;
  margin: 0 0 44px;
}

.contact-info__list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 28px;
}

.contact-info__item {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.contact-info__label {
  font-size: 10px;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.35);
}

.contact-info__value {
  font-size: 13px;
  letter-spacing: 0.04em;
  color: rgba(255, 255, 255, 0.85);
  font-weight: 100;
  line-height: 1.65;
}

.contact-info__divider {
  margin: 44px 0 32px;
  border-top: 1px solid rgba(255, 255, 255, 0.10);
}

.contact-info__brokerage {
  margin-top: auto;
}

.contact-info__brokerage-logo {
  height: 38px;
  width: auto;
  display: block;
  opacity: 0.65;
  filter: brightness(0) invert(1);
}

/* ---- Form Panel (right column) ---- */
.contact-form-panel {
  background: #fff;
  padding: 60px 54px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

/* Override default form styles slightly for this layout */
.contact-form-panel .contact-form {
  border: none;
  padding: 0;
  background: transparent;
}

/* ---- Responsive ---- */
@media (max-width: 860px) {
  .contact-page__inner {
    grid-template-columns: 1fr;
  }

  .contact-info {
    padding: 44px 28px;
  }

  .contact-info__brokerage {
    margin-top: 44px;
  }

  .contact-form-panel {
    padding: 44px 28px;
  }
}
</style>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
