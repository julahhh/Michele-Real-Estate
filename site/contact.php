<?php
// -------------------------------------------------
// Contact Page Template:
// Handles rendering the Contact page and processing basic form submissions.
// Designed to be swapped later with a real contact form handler/service.
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Contact";
$activePage = "contact";

// Global layout includes
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";

// Form submission handling (placeholder)
// validates basic inputs and simulates sending
$sent = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Honeypot spam protection
  // If this hidden field is filled, assume bot submission
  if (!empty($_POST["company"] ?? "")) {
    $sent = true;    // silently pretend success

  } else {
    // Sanitize and normalize user input
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Basic validation
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
      $sent = true;   // For now: mark as sent (later: connect to  email service, and actually send)
    
    } else {$error = "Please fill in name, a valid email, and a message.";} // Validation failed
  }
}
?>

<main class="page">
  <section class="page__inner">

    <!-- Display success or error messages -->
    <?php if ($sent): ?>
      <div class="notice notice--success">Thanks! Your message has been sent.</div>
    <?php elseif (!empty($error)): ?>
      <div class="notice notice--error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Contact form partial -->
    <?php
      // Configure form parameters
      $form = [
        "title" => "Contact Us",
        "action" => "/contact.php",
        "submitText" => "Send Message",
      ];
      // render the contact form
      require __DIR__ . "/partials/contact-form.php";
    ?>
  </section>
</main>


<?php 
// Site footer (global)
require __DIR__ . "/partials/footer.php"; 
?>