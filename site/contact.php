<?php
$pageTitle = "Contact";
$activePage = "contact";

require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

// Basic POST handling (placeholder). Swap later for a real mailer/service.
$sent = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // honeypot check
  if (!empty($_POST["company"] ?? "")) {
    // silently pretend success
    $sent = true;
  } else {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
      // For now: mark as sent (later: send email or hit CRM webhook)
      $sent = true;

      // Example later:
      // mail("you@domain.com", "New Contact Form", $message, "From: $email");
    } else {
      $error = "Please fill in name, a valid email, and a message.";
    }
  }
}
?>

<main class="page">
  <section class="page__inner">
    <?php if ($sent): ?>
      <div class="notice notice--success">Thanks! Your message has been sent.</div>
    <?php elseif (!empty($error)): ?>
      <div class="notice notice--error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php
      $form = [
        "title" => "Contact Us",
        "action" => "/contact.php",
        "submitText" => "Send Message",
      ];
      require __DIR__ . "/partials/contact-form.php";
    ?>
  </section>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>