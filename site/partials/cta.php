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
$buttonHref = htmlspecialchars((string)($cta["buttonHref"] ?? "#"));
$bgImage = htmlspecialchars((string)($cta["bgImage"] ?? ""));
$bgAlt = htmlspecialchars((string)($cta["bgAlt"] ?? ""));
$overlay = (float)($cta["overlay"] ?? 0.45);
if ($overlay < 0) $overlay = 0;
if ($overlay > 1) $overlay = 1;
?>

<section class="cta">
  <img class="cta__bg" src="<?= $bgImage ?>" alt="<?= $bgAlt ?>">
  <div class="cta__overlay" style="opacity: <?= $overlay ?>;"></div>

  <div class="cta__inner">
    <div class="cta__content">
      <h2 class="cta__title"><?= $title ?></h2>
      <a class="cta__btn" href="<?= $buttonHref ?>"><?= $buttonText ?></a>
    </div>
  </div>
</section>