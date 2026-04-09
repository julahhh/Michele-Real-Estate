<?php
// -------------------------------------------------
// Rentals Page Template:
// Lets visitors inquire about renting a home OR
// listing their property as a rental.
// Submissions are saved to data/rental-leads.json.
// -------------------------------------------------

$pageTitle  = "Rentals";
$activePage = "rentals";

require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

// --- Form handling ---
$sent  = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Honeypot spam check
  if (!empty($_POST["company"] ?? "")) {
    $sent = true;

  } else {
    $name        = trim($_POST["name"]        ?? "");
    $email       = trim($_POST["email"]       ?? "");
    $phone       = trim($_POST["phone"]       ?? "");
    $rentalType  = trim($_POST["rental_type"] ?? "");
    $message     = trim($_POST["message"]     ?? "");

    $validType = in_array($rentalType, ["find", "list", "buy", "sell", "other"], true);

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $validType && $message) {
      $sent = true;

      require_once ROOT_PATH . "/includes/data.php";
      $leadsFile = ROOT_PATH . "/data/rental-leads.json";
      $leads     = readJson($leadsFile);
      $leads[]   = [
        "id"          => time() . rand(10, 99),
        "name"        => $name,
        "email"       => $email,
        "phone"       => $phone,
        "rental_type" => $rentalType,   // "find", "list", "buy", "sell", or "other"
        "message"     => $message,
        "date"        => date("Y-m-d H:i:s"),
        "read"        => false,
      ];
      writeJson($leadsFile, $leads);

    } else {
      $error = "Please fill in your name, a valid email, select an inquiry type, and include a message.";
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
        <h1 class="hero__title">RENTALS</h1>
        <p class="hero__tagline">Whether you're looking for a rental home or want to list yours — Michele can help.</p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Two-Path Section
  ===================================================== -->
  <section class="rentals-paths">
    <div class="rentals-paths__inner">

      <!-- Find a Rental -->
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

      <!-- List Your Property -->
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

  <!-- =====================================================
    Rental Inquiry Form
  ===================================================== -->
  <section class="rental-inquiry" id="rental-inquiry">
    <div class="rental-inquiry__inner">

      <div class="rental-inquiry__header">
        <h2 class="rental-inquiry__title">GET IN TOUCH</h2>
        <p class="rental-inquiry__sub">Tell us a little about what you need and Michele will reach out within 24 hours.</p>
      </div>

      <?php if ($sent): ?>
        <div class="notice notice--success">Thanks! Your inquiry has been received. Michele will be in touch shortly.</div>

      <?php else: ?>

        <?php if (!empty($error)): ?>
          <div class="notice notice--error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form class="rental-form" method="post" action="/rentals#rental-inquiry">

          <!-- Inquiry type toggle -->
          <fieldset class="rental-form__type">
            <legend class="rental-form__type-legend">I WANT TO</legend>
            <div class="rental-form__type-options">

              <label class="rental-form__type-option">
                <input
                  type="radio"
                  name="rental_type"
                  value="find"
                  <?= (($_POST["rental_type"] ?? "") === "find") ? "checked" : "" ?>
                  required
                >
                <span class="rental-form__type-label">
                  <strong>RENT A HOME</strong>
                  <small>I'm looking for a property to rent</small>
                </span>
              </label>

              <label class="rental-form__type-option">
                <input
                  type="radio"
                  name="rental_type"
                  value="list"
                  <?= (($_POST["rental_type"] ?? "") === "list") ? "checked" : "" ?>
                >
                <span class="rental-form__type-label">
                  <strong>LIST MY PROPERTY</strong>
                  <small>I want to rent out my home</small>
                </span>
              </label>

              <label class="rental-form__type-option">
                <input
                  type="radio"
                  name="rental_type"
                  value="buy"
                  <?= (($_POST["rental_type"] ?? "") === "buy") ? "checked" : "" ?>
                >
                <span class="rental-form__type-label">
                  <strong>BUY A HOME</strong>
                  <small>I'm looking to purchase a property</small>
                </span>
              </label>

              <label class="rental-form__type-option">
                <input
                  type="radio"
                  name="rental_type"
                  value="sell"
                  <?= (($_POST["rental_type"] ?? "") === "sell") ? "checked" : "" ?>
                >
                <span class="rental-form__type-label">
                  <strong>SELL MY HOME</strong>
                  <small>I'm ready to list my property for sale</small>
                </span>
              </label>

              <label class="rental-form__type-option rental-form__type-option--full">
                <input
                  type="radio"
                  name="rental_type"
                  value="other"
                  <?= (($_POST["rental_type"] ?? "") === "other") ? "checked" : "" ?>
                >
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
              <textarea name="message" rows="6" required placeholder="Tell us about what you're looking for or the property you'd like to list..."><?= htmlspecialchars($_POST["message"] ?? "") ?></textarea>
            </label>

          </div>

          <!-- Honeypot -->
          <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp">

          <button class="rental-form__btn" type="submit">SEND INQUIRY</button>

        </form>

      <?php endif; ?>

    </div>
  </section>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
