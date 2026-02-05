<?php
/* =====================================================
Contact Form Partial
- Displays a contact form with name, email, phone, and 
  message fields.
- Includes a honeypot field for anti-spam protection.
- can be included in modals or standalone pages.
=====================================================*/


// Default form configuration
$form = $form ?? [
  "action" => "/contact.php",      // form submission URL
  "title" => "Contact Us",         // form heading
  "submitText" => "Send Message",  // button label
];

// Sanitize and extract form data
$title = htmlspecialchars($form["title"] ?? "Contact Us");
$action = htmlspecialchars($form["action"] ?? "/contact.php");
$submitText = htmlspecialchars($form["submitText"] ?? "Send Message");
?>

<form class="contact-form" method="post" action="<?= $action ?>">

  <!-- Form Title -->
  <h1 class="contact-form__title"><?= $title ?></h1>

  <!-- Form Fields Layout -->
  <div class="contact-form__grid">

    <!-- Name Field -->
    <label class="contact-form__field">
      <span>Name</span>
      <input name="name" type="text" autocomplete="name" required>
    </label>

    <!-- Email Field -->
    <label class="contact-form__field">
      <span>Email</span>
      <input name="email" type="email" autocomplete="email" required>
    </label>

    <!-- Optional Phone Field -->
    <label class="contact-form__field">
      <span>Phone</span>
      <input name="phone" type="tel" autocomplete="tel">
    </label>

    <!-- Message Text Field -->
    <label class="contact-form__field contact-form__field--full">
      <span>Message</span>
      <textarea name="message" rows="6" required></textarea>
    </label>
  </div>

  <!-- simple anti-spam honeypot hidden from user -->
  <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp">

  <!-- Submit Button -->
  <button class="contact-form__btn" type="submit"><?= $submitText ?></button>
</form>