<?php
/* =====================================================
  Contact Form Partial — fully self-contained
  =====================================================
  Include anywhere in the page body:
    $form = [ ...config... ];
    require ROOT_PATH . '/pages/partials/contact-form.php';

  On submit the browser posts DIRECTLY to Formspree
  (this is what sends Michele the email). JavaScript
  simultaneously fires a background beacon to /save-lead
  which writes the lead to data/leads.json for the
  admin dashboard.

  To change the Formspree endpoint → update $formspreeUrl below.
  To change the admin save logic   → edit pages/save-lead.php.

  Config ($form array — all keys optional):
    title       => Form heading            (default: "Contact Us")
    sub         => Subheading paragraph    (default: "")
    submitText  => Button label            (default: "Send Message")
    redirect    => Success redirect path   (default: "/contact")
                   Formspree will send the user here after submit.
    placeholder => Textarea placeholder    (default: "Your message...")
    successMsg  => Custom success notice   (default: generic)
    errorMsg    => Custom error notice     (default: generic)
===================================================== */

// ── Formspree endpoint ────────────────────────────────────────────────────────
$formspreeUrl = 'https://formspree.io/f/mlgokgpa';

// ── Configuration ─────────────────────────────────────────────────────────────
$form        ??= [];
$title       = $form['title']       ?? 'Contact Us';
$sub         = $form['sub']         ?? '';
$submitText  = $form['submitText']  ?? 'Send Message';
$redirect    = $form['redirect']    ?? '/thank-you';
$placeholder = $form['placeholder'] ?? 'Your message...';
$errorMsg    = $form['errorMsg']    ?? 'Please fill in your name, a valid email, and a message.';

// Build the absolute _next URL Formspree uses to redirect after submission
$scheme  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$nextUrl = "{$scheme}://{$_SERVER['HTTP_HOST']}{$redirect}";
?>

<style>
/* =====================================================
   Contact Form Partial — shared form styles
   All pages that include this partial share these styles.
===================================================== */

/* ---- Form header ---- */
.contact-form__header { margin-bottom: 28px; }
.contact-form__title {
  font-size: 20px;
  letter-spacing: 0.12em;
  font-weight: 300;
  text-transform: uppercase;
  color: #111;
  margin: 0 0 8px;
}
.contact-form__sub {
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
  gap: 12px;
  margin-top: 14px;
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
.rental-form__type-option--full {
  grid-column: 1 / -1;
  width: calc(50% - 6px);
  margin: 0 auto;
}
.rental-form__type-label { display: flex; flex-direction: column; gap: 3px; }
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
.rental-form__grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.rental-form__field { display: flex; flex-direction: column; gap: 8px; }
.rental-form__field--full { grid-column: 1 / -1; }
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
.rental-form__field textarea::placeholder { color: rgba(0, 0, 0, 0.25); }
.rental-form__field input:focus,
.rental-form__field textarea:focus { border-bottom-color: rgba(0, 0, 0, 0.65); }

/* ---- Submit button ---- */
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
.rental-form__btn:hover { background: #333; }

/* ---- Notices ---- */
.notice { padding: 14px 18px; margin-bottom: 24px; font-size: 13px; border-radius: 3px; }
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

/* ---- Responsive ---- */
@media (max-width: 680px) {
  .rental-form__type-options,
  .rental-form__grid { grid-template-columns: 1fr; }
  .rental-form__type-option--full { width: 100%; }
}
</style>

<?php if ($title || $sub): ?>
  <div class="contact-form__header">
    <?php if ($title): ?><h2 class="contact-form__title"><?= htmlspecialchars($title) ?></h2><?php endif; ?>
    <?php if ($sub):   ?><p  class="contact-form__sub"><?=   htmlspecialchars($sub)   ?></p><?php endif; ?>
  </div>
<?php endif; ?>

  <!--
    Form posts directly to Formspree → Michele gets the email.
    Formspree redirects to /thank-you on success.
    JS beacon simultaneously saves to leads.json → admin dashboard.
  -->
  <form class="rental-form" method="post"
        action="<?= htmlspecialchars($formspreeUrl) ?>"
        data-save="/save-lead">

    <!-- Formspree: redirect here after successful submission -->
    <input type="hidden" name="_next" value="<?= htmlspecialchars($nextUrl) ?>">

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
        <textarea name="message" rows="5" required
          placeholder="<?= htmlspecialchars($placeholder) ?>"></textarea>
      </label>

    </div>

    <!-- Honeypot — hidden from real users, catches bots -->
    <input type="text" name="_gotcha" tabindex="-1" autocomplete="off" class="hp">

    <button class="rental-form__btn" type="submit"><?= htmlspecialchars($submitText) ?></button>

  </form>
