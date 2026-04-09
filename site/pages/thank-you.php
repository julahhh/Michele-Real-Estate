<?php
// -------------------------------------------------
// Thank You Page
// Shown after any contact form is submitted.
// Formspree redirects here via the _next field.
// -------------------------------------------------

$pageTitle  = "Message Sent — Michele Rueff";
$activePage = "";

require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";
?>

<main>

  <section class="thankyou">
    <div class="thankyou__inner">

      <div class="thankyou__icon" aria-hidden="true">✓</div>

      <h1 class="thankyou__title">MESSAGE SENT</h1>
      <p class="thankyou__sub">Thanks for reaching out. Michele will be in touch within 24 hours.</p>

      <div class="thankyou__actions">
        <a class="thankyou__btn thankyou__btn--primary" href="/">Back to Home</a>
        <a class="thankyou__btn thankyou__btn--ghost" href="/buy">Browse Properties</a>
      </div>

    </div>
  </section>

</main>

<style>
.thankyou {
  min-height: calc(100vh - 80px);
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f9f7f4;
  padding: 80px 24px;
}

.thankyou__inner {
  text-align: center;
  max-width: 480px;
}

.thankyou__icon {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: #111;
  color: #fff;
  font-size: 26px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 32px;
}

.thankyou__title {
  font-size: 30px;
  letter-spacing: 0.12em;
  font-weight: 300;
  text-transform: uppercase;
  color: #111;
  margin: 0 0 16px;
}

.thankyou__sub {
  font-size: 15px;
  line-height: 1.75;
  color: rgba(0, 0, 0, 0.55);
  margin: 0 0 40px;
}

.thankyou__actions {
  display: flex;
  gap: 12px;
  justify-content: center;
  flex-wrap: wrap;
}

.thankyou__btn {
  display: inline-block;
  padding: 13px 28px;
  font-size: 11px;
  letter-spacing: 0.18em;
  font-weight: 600;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 2px;
  transition: background 0.2s, color 0.2s;
}

.thankyou__btn--primary {
  background: #111;
  color: #fff;
}
.thankyou__btn--primary:hover { background: #333; }

.thankyou__btn--ghost {
  background: transparent;
  color: #111;
  border: 1px solid rgba(0, 0, 0, 0.25);
}
.thankyou__btn--ghost:hover { border-color: #111; }
</style>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
