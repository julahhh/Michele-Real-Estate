<?php
/* =====================================================
Featured Properties Partial
- Displays a grid of highlighted listings.
- Data can be overridden per-page or later pulled from
  a database / MLS feed / API.
=====================================================*/


$featured = $featured ?? [
  "title" => "FEATURED PROPERTIES",

  // Default featured properties data (replace with DB/MLS Data later)
  "items" => [
    /* Example item structure:
    [
      "image" => "/assets/img/PROPERTY_IMAGE_NAME.jpg",
      "imageAlt" => "Featured Property #",
      "beds" => 4,
      "baths" => 3,
      "title" => "PROPERTY NAME",
      "price" => "$1,250,000",
      "href" => "/property/#",
    ],
    */

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

// Sanitize and extract data for rendering
$title = htmlspecialchars((string)($featured["title"] ?? "FEATURED PROPERTIES"));

// Ensure featured items are an array
$items = is_array($featured["items"] ?? null) ? $featured["items"] : [];
?>

<!-- Featured Properties Section -->
<section class="fp">
  <div class="fp__inner">

    <!-- Section Title -->
    <h2 class="fp__title"><?= $title ?></h2>

    <!-- Properties Card Grid -->
    <div class="fp__grid">
      <?php foreach ($items as $p): ?>
        <?php
          // Sanitize individual property data
          $img = htmlspecialchars((string)($p["image"] ?? ""));
          $alt = htmlspecialchars((string)($p["imageAlt"] ?? "Featured property"));
          $beds = htmlspecialchars((string)($p["beds"] ?? ""));
          $baths = htmlspecialchars((string)($p["baths"] ?? ""));
          $ptitle = htmlspecialchars((string)($p["title"] ?? "Property"));
          $price = htmlspecialchars((string)($p["price"] ?? ""));
          $href = htmlspecialchars((string)($p["href"] ?? "#"));
        ?>

        <!-- Individual Property Card -->
        <a class="fp__card" href="<?= $href ?>">

          <!-- Property Image -->
          <div class="fp__media">
            <img class="fp__img" src="<?= $img ?>" alt="<?= $alt ?>">
          </div>

          <!-- Property Meta Info -->
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