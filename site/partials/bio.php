<?php
/* =====================================================
Bio/Meet Section Partial
- Displays agent biography with image, text, and CTA.
=====================================================*/

// Default bio data (can be overridden)
$bio = $bio ?? [
  "heading" => "MEET MICHELE",
  "image" => "/assets/img/meet-michele.jpg",
  "imageAlt" => "Portrait of Michele Rueff",
  "ctaHref" => "/about",
  "ctaText" => "LEARN MORE",
  "body" => [
    "Michele Rueff is a Central Florida real estate professional serving Clermont, Orlando, and surrounding areas since 2007. She holds a Bachelor's degree in Business and Marketing from the University of Central Florida and brings a rare blend of real estate, construction, and negotiation expertise to every transaction.",
    "She has personally bought, sold, and renovated 80+ homes, giving her deep insight into rehabs, investment strategy, interior design, and contracts. She specializes in pre-foreclosures, short sales, distressed properties, and complex transactions. Michele is a member of Florida Realtors and the National Association of Realtors and is proud to be with eXp-Winning Realty in Clermont, Florida.",
  ],
];

// Make sure $bio is an array and merge with defaults
$bio = array_merge([
  "heading" => "",
  "image" => "",
  "imageAlt" => "",
  "ctaHref" => "#",
  "ctaText" => "",
  "body" => [],
], is_array($bio) ? $bio : []);

// Extract and sanitize individual fields
$heading  = htmlspecialchars((string)$bio["heading"]);
$image = htmlspecialchars($bio["image"], ENT_QUOTES, 'UTF-8');
$imageAlt = htmlspecialchars((string)$bio["imageAlt"]);
$ctaHref  = htmlspecialchars((string)$bio["ctaHref"]);
$ctaText  = htmlspecialchars((string)$bio["ctaText"]);
$body     = is_array($bio["body"]) ? $bio["body"] : [];
?>

<section class="meet">
  <div class="meet__inner">

    <!-- Agent Image -->
    <div class="meet__media">
      <img class="meet__img" src="<?= $image ?>" alt="<?= $imageAlt ?>">
    </div>

    <!-- Agent Biography Content -->
    <div class="meet__content">

      <!-- Agent Name -->
      <h2 class="meet__title"><?= $heading ?></h2>

      <!-- Agent Biography Text -->
      <div class="meet__text">
        <?php foreach ($body as $p): ?>
          <p><?= htmlspecialchars((string)$p) ?></p>
        <?php endforeach; ?>
      </div>

      <!-- Call to Action Button -->
      <a class="btn btn--light" href="<?= $ctaHref ?>"><?= $ctaText ?></a>
    </div>

  </div>
</section>