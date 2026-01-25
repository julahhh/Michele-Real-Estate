<?php
// Allow override via $bio (optional)
$bio = $bio ?? [
  "heading" => "MEET MICHELE",
  "image" => "/assets/img/meet-michele.jpg",
  "imageAlt" => "Portrait of Michele Rueff",
  "ctaHref" => "/about",
  "ctaText" => "LEARN MORE",
  "body" => [
    "Michele Rueff is a Central Florida real estate professional serving Clermont, Orlando, and surrounding areas since 2007. She holds a Bachelor's degree in Business and Marketing from the University of Central Florida and brings a rare blend of real estate, construction, and negotiation expertise to every transaction.",
    "She has personally bought, sold, and renovated 80+ homes, giving her deep insight into rehabs, investment strategy, interior design, and contracts. She specializes in pre-foreclosures, short sales, distressed properties, and complex transactions."
  ],
];

// Safety to avoid null -> htmlspecialchars warnings
$bio = array_merge([
  "heading" => "",
  "image" => "",
  "imageAlt" => "",
  "ctaHref" => "#",
  "ctaText" => "",
  "body" => [],
], is_array($bio) ? $bio : []);

$heading  = htmlspecialchars((string)$bio["heading"]);
$image    = htmlspecialchars((string)$bio["image"]);
$imageAlt = htmlspecialchars((string)$bio["imageAlt"]);
$ctaHref  = htmlspecialchars((string)$bio["ctaHref"]);
$ctaText  = htmlspecialchars((string)$bio["ctaText"]);
$body     = is_array($bio["body"]) ? $bio["body"] : [];
?>

<section class="meet">
  <div class="meet__inner">

    <div class="meet__media">
      <img class="meet__img" src="<?= $image ?>" alt="<?= $imageAlt ?>">
    </div>

    <div class="meet__content">
      <h2 class="meet__title"><?= $heading ?></h2>

      <div class="meet__text">
        <?php foreach ($body as $p): ?>
          <p><?= htmlspecialchars((string)$p) ?></p>
        <?php endforeach; ?>
      </div>

      <a class="btn btn--light" href="<?= $ctaHref ?>"><?= $ctaText ?></a>
    </div>

  </div>
</section>