<!-- =====================================================
Contact Modal
- Reusable popup modal containing the contact form.
===================================================== -->

<div class="modal" id="contactModal" aria-hidden="true">

  <!-- Clicking outside the panel or on close button will close the modal -->
  <div class="modal__backdrop" data-modal-close></div>

  <!-- Modal Panel -->
  <div class="modal__panel" role="dialog" aria-modal="true" aria-label="Contact form">

    <!-- Close Button -->
    <button class="modal__close" type="button" aria-label="Close" data-modal-close>✕</button>

    <?php
      // Contact form configuration
      $form = [
        "title" => "Contact Us",
        "action" => "/contact.php",
        "submitText" => "Send Message",
      ];
      // Load contact form partial
      require __DIR__ . "/contact-form.php";
    ?>
  </div>
</div>