<?php
  // Configurable CTA module (override $cta before including)
  $cta = $cta ?? [
    "title" => "WORK WITH US",
    "buttonText" => "CONTACT US",
    "buttonHref" => "/contact",
    "bgImage" => "/assets/img/cta-work-with-us.jpg",
    "bgAlt" => "Luxury living room interior",
    "overlay" => 0.45, // 0 to 1
  ];

  $title = htmlspecialchars((string)($cta["title"] ?? ""));
  $buttonText = htmlspecialchars((string)($cta["buttonText"] ?? ""));
  $buttonHref = htmlspecialchars((string)($cta["buttonHref"] ?? "#"));
  $bgImage = htmlspecialchars((string)($cta["bgImage"] ?? ""));
  $bgAlt = htmlspecialchars((string)($cta["bgAlt"] ?? ""));
  $overlay = (float)($cta["overlay"] ?? 0.45);
  if ($overlay < 0) $overlay = 0;
  if ($overlay > 1) $overlay = 1;
?>

<section class="cta">
  <!-- Use an img tag for the background so you can set alt text and get better loading behavior -->
  <img class="cta__bg" src="<?= $bgImage ?>" alt="<?= $bgAlt ?>">

  <div class="cta__overlay" style="opacity: <?= $overlay ?>;"></div>

  <div class="cta__inner">
  <div class="cta__content">
    <h2 class="cta__title">WORK WITH US</h2>
    <a class="cta__btn" href="/contact">CONTACT US</a>
  </div>
</div>
</section>