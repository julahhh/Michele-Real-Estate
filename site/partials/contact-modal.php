<div class="modal" id="contactModal" aria-hidden="true">
  <div class="modal__backdrop" data-modal-close></div>

  <div class="modal__panel" role="dialog" aria-modal="true" aria-label="Contact form">
    <button class="modal__close" type="button" aria-label="Close" data-modal-close>✕</button>

    <?php
      $form = [
        "title" => "Contact Us",
        "action" => "/contact.php",
        "submitText" => "Send Message",
      ];
      require __DIR__ . "/contact-form.php";
    ?>
  </div>
</div>