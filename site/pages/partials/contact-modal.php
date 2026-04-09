<!-- =====================================================
Contact Modal
- Reusable popup modal with inquiry type selector.
===================================================== -->

<div class="modal" id="contactModal" aria-hidden="true">

  <!-- Clicking outside the panel closes the modal -->
  <div class="modal__backdrop" data-modal-close></div>

  <!-- Modal Panel -->
  <div class="modal__panel" role="dialog" aria-modal="true" aria-label="Contact form">

    <!-- Close Button -->
    <button class="modal__close" type="button" aria-label="Close" data-modal-close>✕</button>

    <div class="modal-form__header">
      <h2 class="modal-form__title">GET IN TOUCH</h2>
      <p class="modal-form__sub">Tell us a little about what you need and Michele will reach out within 24 hours.</p>
    </div>

    <form class="rental-form" method="post" action="/contact">

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
          <textarea name="message" rows="4" required placeholder="Tell us about what you're looking for..."></textarea>
        </label>

      </div>

      <!-- Honeypot -->
      <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp">

      <button class="rental-form__btn" type="submit">SEND INQUIRY</button>

    </form>

  </div>
</div>

<style>
/* =====================================================
   Contact Modal — layout & header styles
   (rental-form styles live in rentals.php scoped CSS
    but the modal needs its own dark panel overrides)
===================================================== */
.modal__panel {
  background: #000;
  padding: 48px 40px 40px;
  overflow-y: auto;
}

.modal-form__header {
  text-align: center;
  margin-bottom: 32px;
}

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

@media (max-width: 560px) {
  .modal__panel {
    padding: 40px 24px 32px;
  }
}
</style>
