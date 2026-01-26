<?php
$form = $form ?? [
  "action" => "/contact.php",
  "title" => "Contact Us",
  "submitText" => "Send Message",
];

$title = htmlspecialchars($form["title"] ?? "Contact Us");
$action = htmlspecialchars($form["action"] ?? "/contact.php");
$submitText = htmlspecialchars($form["submitText"] ?? "Send Message");
?>

<form class="contact-form" method="post" action="<?= $action ?>">
  <h1 class="contact-form__title"><?= $title ?></h1>

  <div class="contact-form__grid">
    <label class="contact-form__field">
      <span>Name</span>
      <input name="name" type="text" autocomplete="name" required>
    </label>

    <label class="contact-form__field">
      <span>Email</span>
      <input name="email" type="email" autocomplete="email" required>
    </label>

    <label class="contact-form__field">
      <span>Phone</span>
      <input name="phone" type="tel" autocomplete="tel">
    </label>

    <label class="contact-form__field contact-form__field--full">
      <span>Message</span>
      <textarea name="message" rows="6" required></textarea>
    </label>
  </div>

  <!-- simple anti-spam honeypot -->
  <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp">

  <button class="contact-form__btn" type="submit"><?= $submitText ?></button>
</form>