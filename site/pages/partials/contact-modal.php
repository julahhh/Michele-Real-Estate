<!-- =====================================================
  Contact Modal
  =====================================================
  Included on every page via footer.php.

  Form posts directly to Formspree → Michele gets the email.
  JS beacon simultaneously saves to leads.json → admin dashboard.

  To change the Formspree endpoint or save logic:
  → edit contact-form.php ($formspreeUrl) and save-lead.php
===================================================== -->

<?php
$scheme        = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$modalNextUrl  = "{$scheme}://{$_SERVER['HTTP_HOST']}/contact?sent=1";
?>

<div class="modal" id="contactModal" aria-hidden="true">

  <div class="modal__backdrop" data-modal-close></div>

  <div class="modal__panel" role="dialog" aria-modal="true" aria-label="Contact form">

    <button class="modal__close" type="button" aria-label="Close" data-modal-close>✕</button>

    <div class="modal-form__header">
      <h2 class="modal-form__title">GET IN TOUCH</h2>
      <p class="modal-form__sub">Tell us a little about what you need and Michele will reach out within 24 hours.</p>
    </div>

    <!-- Posts directly to Formspree → email to Michele -->
    <!-- JS beacon on submit → saves to leads.json for admin dashboard -->
    <form class="rental-form rental-form--dark" method="post"
          action="https://formspree.io/f/mlgokgpa"
          data-save="/save-lead">

      <!-- Formspree redirect after submission -->
      <input type="hidden" name="_next" value="<?= htmlspecialchars($modalNextUrl) ?>">

      <!-- Inquiry type -->
      <fieldset class="rental-form__type">
        <legend class="rental-form__type-legend">I WANT TO</legend>
        <div class="rental-form__type-options">

          <label class="rental-form__type-option">
            <input type="radio" name="inquiry_type" value="find" required>
            <span class="rental-form__type-label">
              <strong>RENT A HOME</strong>
              <small>I'm looking for a property to rent</small>
            </span>
          </label>

          <label class="rental-form__type-option">
            <input type="radio" name="inquiry_type" value="list">
            <span class="rental-form__type-label">
              <strong>LIST MY PROPERTY</strong>
              <small>I want to rent out my home</small>
            </span>
          </label>

          <label class="rental-form__type-option">
            <input type="radio" name="inquiry_type" value="buy">
            <span class="rental-form__type-label">
              <strong>BUY A HOME</strong>
              <small>I'm looking to purchase a property</small>
            </span>
          </label>

          <label class="rental-form__type-option">
            <input type="radio" name="inquiry_type" value="sell">
            <span class="rental-form__type-label">
              <strong>SELL MY HOME</strong>
              <small>I'm ready to list my property for sale</small>
            </span>
          </label>

          <label class="rental-form__type-option rental-form__type-option--full">
            <input type="radio" name="inquiry_type" value="other">
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
          <input name="name" type="text" autocomplete="name" required>
        </label>

        <label class="rental-form__field">
          <span>Email</span>
          <input name="email" type="email" autocomplete="email" required>
        </label>

        <label class="rental-form__field">
          <span>Phone</span>
          <input name="phone" type="tel" autocomplete="tel">
        </label>

        <label class="rental-form__field rental-form__field--full">
          <span>Message</span>
          <textarea name="message" rows="4" required
            placeholder="Tell us about what you're looking for..."></textarea>
        </label>

      </div>

      <!-- Honeypot -->
      <input type="text" name="_gotcha" tabindex="-1" autocomplete="off" class="hp">

      <button class="rental-form__btn" type="submit">SEND INQUIRY</button>

    </form>

  </div>
</div>

<style>
/* =====================================================
   Contact Modal — dark panel overrides
   Base rental-form styles live in contact-form.php
===================================================== */
.modal__panel {
  background: #000;
  padding: 48px 40px 40px;
  overflow-y: auto;
}
.modal-form__header { text-align: center; margin-bottom: 32px; }
.modal-form__title {
  font-size: 24px;
  letter-spacing: 0.12em;
  font-weight: 300;
  text-transform: uppercase;
  color: #fff;
  margin: 0 0 10px;
}
.modal-form__sub {
  font-size: 12px;
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.50);
  margin: 0;
}

/* Dark field overrides */
.rental-form--dark .rental-form__type        { border-color: rgba(255,255,255,0.12); }
.rental-form--dark .rental-form__type-legend { color: rgba(255,255,255,0.45); }
.rental-form--dark .rental-form__type-option { border-color: rgba(255,255,255,0.10); }
.rental-form--dark .rental-form__type-option:has(input:checked) {
  border-color: rgba(255,255,255,0.45);
  background: rgba(255,255,255,0.06);
}
.rental-form--dark .rental-form__type-label strong { color: rgba(255,255,255,0.90); }
.rental-form--dark .rental-form__type-label small  { color: rgba(255,255,255,0.45); }
.rental-form--dark .rental-form__field span        { color: rgba(255,255,255,0.50); }
.rental-form--dark .rental-form__field input,
.rental-form--dark .rental-form__field textarea    { border-bottom-color: rgba(255,255,255,0.20); color: #fff; }
.rental-form--dark .rental-form__field input:focus,
.rental-form--dark .rental-form__field textarea:focus { border-bottom-color: rgba(255,255,255,0.65); }
.rental-form--dark .rental-form__field input::placeholder,
.rental-form--dark .rental-form__field textarea::placeholder { color: rgba(255,255,255,0.25); }
.rental-form--dark .rental-form__btn { background: #fff; color: #000; }
.rental-form--dark .rental-form__btn:hover { background: rgba(255,255,255,0.85); }

@media (max-width: 560px) { .modal__panel { padding: 40px 24px 32px; } }
</style>
