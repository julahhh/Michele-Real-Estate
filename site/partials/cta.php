<?php
/* =====================================================
Call to Action Partial
- Displays a prominent call-to-action section.
- section with background image, title, and button 
  linking to contact form.
=====================================================*/


// Default CTA data (can be overridden per-page)
$cta = $cta ?? [
  "title" => "WORK WITH US",
  "buttonText" => "CONTACT US",
  "buttonHref" => "/contact",
  "bgImage" => "/assets/img/cta-work-with-us.jpg",
  "bgAlt" => "Luxury living room interior",
  "overlay" => 0.45,
];

// Sanitize and extract data for rendering
$title = htmlspecialchars((string)($cta["title"] ?? "WORK WITH US"));
$buttonText = htmlspecialchars((string)($cta["buttonText"] ?? "CONTACT US"));
$bgImage = htmlspecialchars((string)($cta["bgImage"] ?? ""));
$bgAlt = htmlspecialchars((string)($cta["bgAlt"] ?? ""));

// Ensure overlay opacity is between 0 and 1
$overlay = max(0, min(1, (float)($cta["overlay"] ?? 0.45)));
?>

<!-- Call to Action Section -->
<section class="cta">

  <!-- Background Image and Overlay -->
  <img class="cta__bg" src="<?= $bgImage ?>" alt="<?= $bgAlt ?>">
  <div class="cta__overlay" style="opacity: <?= $overlay ?>;"></div>

  <!-- CTA Content -->
  <div class="cta__inner">
    <div class="cta__content">

      <!-- CTA Heading -->
      <h2 class="cta__title"><?= $title ?></h2>

      <!-- CTA Button using JS to open contact modal overlay-->
      <button
        class="cta__btn"
        type="button"
        data-modal-open="contact"
        aria-label="Open contact form"
      >
        <?= $buttonText ?>
      </button>
    </div>
  </div>
</section>