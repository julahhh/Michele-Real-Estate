<?php
$cta = $cta ?? [
  "title" => "WORK WITH US",
  "buttonText" => "CONTACT US",
  "buttonHref" => "/contact",
  "bgImage" => "/assets/img/cta-work-with-us.jpg",
  "bgAlt" => "Luxury living room interior",
  "overlay" => 0.45,
];

$title = htmlspecialchars((string)($cta["title"] ?? "WORK WITH US"));
$buttonText = htmlspecialchars((string)($cta["buttonText"] ?? "CONTACT US"));
$bgImage = htmlspecialchars((string)($cta["bgImage"] ?? ""));
$bgAlt = htmlspecialchars((string)($cta["bgAlt"] ?? ""));
$overlay = max(0, min(1, (float)($cta["overlay"] ?? 0.45)));
?>

<section class="cta">
  <img class="cta__bg" src="<?= $bgImage ?>" alt="<?= $bgAlt ?>">
  <div class="cta__overlay" style="opacity: <?= $overlay ?>;"></div>

  <div class="cta__inner">
    <div class="cta__content">
      <h2 class="cta__title"><?= $title ?></h2>

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
