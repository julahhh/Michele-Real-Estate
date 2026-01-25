<?php
$featured = $featured ?? [
  "title" => "FEATURED PROPERTIES",
  "items" => [
    [
      "image" => "/assets/img/featured-1.jpg",
      "imageAlt" => "Featured property 1",
      "beds" => 4,
      "baths" => 3,
      "title" => "Property",
      "price" => "$1,250,000",
      "href" => "/property/1",
    ],
    [
      "image" => "/assets/img/featured-2.jpg",
      "imageAlt" => "Featured property 2",
      "beds" => 3,
      "baths" => 2,
      "title" => "Property",
      "price" => "$825,000",
      "href" => "/property/2",
    ],
    [
      "image" => "/assets/img/featured-3.jpg",
      "imageAlt" => "Featured property 3",
      "beds" => 5,
      "baths" => 4,
      "title" => "Property",
      "price" => "$1,980,000",
      "href" => "/property/3",
    ],
  ],
];

$title = htmlspecialchars((string)($featured["title"] ?? "FEATURED PROPERTIES"));
$items = is_array($featured["items"] ?? null) ? $featured["items"] : [];
?>

<section class="fp">
  <div class="fp__inner">
    <h2 class="fp__title"><?= $title ?></h2>

    <div class="fp__grid">
      <?php foreach ($items as $p): ?>
        <?php
          $img = htmlspecialchars((string)($p["image"] ?? ""));
          $alt = htmlspecialchars((string)($p["imageAlt"] ?? "Featured property"));
          $beds = htmlspecialchars((string)($p["beds"] ?? ""));
          $baths = htmlspecialchars((string)($p["baths"] ?? ""));
          $ptitle = htmlspecialchars((string)($p["title"] ?? "Property"));
          $price = htmlspecialchars((string)($p["price"] ?? ""));
          $href = htmlspecialchars((string)($p["href"] ?? "#"));
        ?>
        <a class="fp__card" href="<?= $href ?>">
          <div class="fp__media">
            <img class="fp__img" src="<?= $img ?>" alt="<?= $alt ?>">
          </div>

          <div class="fp__meta">
            <div class="fp__stats"><?= $beds ?> Bed | <?= $baths ?> Baths</div>
            <div class="fp__name"><?= $ptitle ?></div>
            <div class="fp__price"><?= $price ?></div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>