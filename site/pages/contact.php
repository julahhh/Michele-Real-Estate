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
    $name        = trim($_POST["name"]         ?? "");
    $email       = trim($_POST["email"]        ?? "");
    $phone       = trim($_POST["phone"]        ?? "");
    $message     = trim($_POST["message"]      ?? "");
    $inquiryType = trim($_POST["inquiry_type"] ?? "");

    // Basic validation
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
      $sent = true;

      // Save lead to data/leads.json
      require_once ROOT_PATH . "/includes/data.php";
      $leadsFile = ROOT_PATH . "/data/leads.json";
      $leads     = readJson($leadsFile);
      $lead = [
        "id"      => time() . rand(10, 99),   // unique enough for a small site
        "name"    => $name,
        "email"   => $email,
        "phone"   => $phone,
        "message" => $message,
        "date"    => date("Y-m-d H:i:s"),
        "read"    => false,
      ];
      if ($inquiryType) $lead["inquiry_type"] = $inquiryType;
      $leads[] = $lead;
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

        <!-- Brokerage logo -->
        <div class="contact-info__brokerage">
          <img src="/assets/img/exp-logo.webp" alt="eXp Realty" class="contact-info__brokerage-logo">
        </div>

      </div>

      <!-- Right: Contact Form Panel -->
      <div class="contact-form-panel">

        <div class="contact-form-panel__header">
          <h2 class="contact-form-panel__title">SEND A MESSAGE</h2>
          <p class="contact-form-panel__sub">Tell us a little about what you need and Michele will reach out within 24 hours.</p>
        </div>

        <?php if ($sent): ?>
          <div class="notice notice--success">Thanks! Your message has been sent. Michele will be in touch shortly.</div>
        <?php else: ?>

          <?php if (!empty($error)): ?>
            <div class="notice notice--error"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>

          <form class="rental-form" method="post" action="/contact">

            <!-- Inquiry type -->
            <fieldset class="rental-form__type">
              <legend class="rental-form__type-legend">I WANT TO</legend>
              <div class="rental-form__type-options">

                <label class="rental-form__type-option">
                  <input type="radio" name="inquiry_type" value="find"
                    <?= (($_POST["inquiry_type"] ?? "") === "find") ? "checked" : "" ?> required>
                  <span class="rental-form__type-label">
                    <strong>RENT A HOME</strong>
                    <small>I'm looking for a property to rent</small>
                  </span>
                </label>

                <label class="rental-form__type-option">
                  <input type="radio" name="inquiry_type" value="list"
                    <?= (($_POST["inquiry_type"] ?? "") === "list") ? "checked" : "" ?>>
                  <span class="rental-form__type-label">
                    <strong>LIST MY PROPERTY</strong>
                    <small>I want to rent out my home</small>
                  </span>
                </label>

                <label class="rental-form__type-option">
                  <input type="radio" name="inquiry_type" value="buy"
                    <?= (($_POST["inquiry_type"] ?? "") === "buy") ? "checked" : "" ?>>
                  <span class="rental-form__type-label">
                    <strong>BUY A HOME</strong>
                    <small>I'm looking to purchase a property</small>
                  </span>
                </label>

                <label class="rental-form__type-option">
                  <input type="radio" name="inquiry_type" value="sell"
                    <?= (($_POST["inquiry_type"] ?? "") === "sell") ? "checked" : "" ?>>
                  <span class="rental-form__type-label">
                    <strong>SELL MY HOME</strong>
                    <small>I'm ready to list my property for sale</small>
                  </span>
                </label>

                <label class="rental-form__type-option rental-form__type-option--full">
                  <input type="radio" name="inquiry_type" value="other"
                    <?= (($_POST["inquiry_type"] ?? "") === "other") ? "checked" : "" ?>>
                  <span class="rental-form__type-label">
                    <strong>OTHER</strong>
                    <small>I have a different question or request</small>
                  </span>
                </label>

              </div>
            </fieldset>

            <!-- Contact fields -->
            <div class="rental-form__grid">

              <label class="rental-form__field">
                <span>Name</span>
                <input name="name" type="text" autocomplete="name" value="<?= htmlspecialchars($_POST["name"] ?? "") ?>" required>
              </label>

              <label class="rental-form__field">
                <span>Email</span>
                <input name="email" type="email" autocomplete="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
              </label>

              <label class="rental-form__field">
                <span>Phone</span>
                <input name="phone" type="tel" autocomplete="tel" value="<?= htmlspecialchars($_POST["phone"] ?? "") ?>">
              </label>

              <label class="rental-form__field rental-form__field--full">
                <span>Message</span>
                <textarea name="message" rows="5" required placeholder="Tell us about what you're looking for..."><?= htmlspecialchars($_POST["message"] ?? "") ?></textarea>
              </label>

            </div>

            <!-- Honeypot -->
            <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp">

            <button class="rental-form__btn" type="submit">SEND MESSAGE</button>

          </form>

        <?php endif; ?>

      </div>

    </div>
  </section>

</main>

<style>
/* =====================================================
   Contact Page — form panel header + rental-form styles
===================================================== */
.contact-form-panel__header {
  margin-bottom: 28px;
}

.contact-form-panel__title {
  font-size: 20px;
  letter-spacing: 0.12em;
  font-weight: 300;
  text-transform: uppercase;
  color: #111;
  margin: 0 0 8px;
}

.contact-form-panel__sub {
  font-size: 12px;
  line-height: 1.75;
  color: rgba(0, 0, 0, 0.50);
  margin: 0;
}

/* ---- Inquiry type fieldset ---- */
.rental-form__type {
  border: 1px solid rgba(0, 0, 0, 0.12);
  border-radius: 4px;
  padding: 24px 24px 20px;
  margin: 0 0 28px;
}

.rental-form__type-legend {
  font-size: 10px;
  letter-spacing: 0.22em;
  font-weight: 600;
  color: rgba(0, 0, 0, 0.45);
  text-transform: uppercase;
  padding: 0 8px;
}

.rental-form__type-options {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto auto;
  gap: 12px;
  margin-top: 14px;
}

.rental-form__type-option--full {
  grid-column: 1 / -1;
  width: calc(50% - 6px);
  margin: 0 auto;
}

.rental-form__type-option {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  cursor: pointer;
  padding: 14px 16px;
  border: 1px solid rgba(0, 0, 0, 0.10);
  border-radius: 3px;
  transition: border-color 0.2s;
}

.rental-form__type-option:has(input:checked) {
  border-color: rgba(0, 0, 0, 0.45);
  background: rgba(0, 0, 0, 0.04);
}

.rental-form__type-option input[type="radio"] {
  margin-top: 3px;
  accent-color: #111;
  flex-shrink: 0;
}

.rental-form__type-label {
  display: flex;
  flex-direction: column;
  gap: 3px;
}

.rental-form__type-label strong {
  font-size: 10px;
  letter-spacing: 0.16em;
  font-weight: 600;
  text-transform: uppercase;
  color: rgba(0, 0, 0, 0.90);
}

.rental-form__type-label small {
  font-size: 11px;
  color: rgba(0, 0, 0, 0.45);
  font-weight: 300;
}

/* ---- Contact fields ---- */
.rental-form__grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.rental-form__field {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.rental-form__field--full {
  grid-column: 1 / -1;
}

.rental-form__field span {
  font-size: 10px;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(0, 0, 0, 0.50);
  font-weight: 600;
}

.rental-form__field input,
.rental-form__field textarea {
  background: transparent;
  border: none;
  border-bottom: 1px solid rgba(0, 0, 0, 0.20);
  color: #111;
  font-size: 14px;
  padding: 10px 0;
  outline: none;
  font-family: inherit;
  transition: border-color 0.2s;
  resize: vertical;
}

.rental-form__field input::placeholder,
.rental-form__field textarea::placeholder {
  color: rgba(0, 0, 0, 0.25);
}

.rental-form__field input:focus,
.rental-form__field textarea:focus {
  border-bottom-color: rgba(0, 0, 0, 0.65);
}

.rental-form__btn {
  margin-top: 28px;
  display: block;
  width: 100%;
  padding: 15px;
  background: #111;
  color: #fff;
  font-size: 11px;
  letter-spacing: 0.20em;
  font-weight: 600;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  transition: background 0.2s;
}

.rental-form__btn:hover {
  background: #333;
}

/* ---- Notices ---- */
.notice {
  padding: 14px 18px;
  margin-bottom: 24px;
  font-size: 13px;
  border-radius: 3px;
}

.notice--success {
  background: rgba(0, 0, 0, 0.05);
  color: rgba(0, 0, 0, 0.75);
  border: 1px solid rgba(0, 0, 0, 0.15);
}

.notice--error {
  background: rgba(200, 50, 50, 0.08);
  color: rgba(180, 30, 30, 0.90);
  border: 1px solid rgba(200, 50, 50, 0.25);
}

@media (max-width: 680px) {
  .rental-form__type-options,
  .rental-form__grid {
    grid-template-columns: 1fr;
  }

  .rental-form__type-option--full {
    width: 100%;
  }
}
</style>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
