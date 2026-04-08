<?php
/* =====================================================
Featured Properties Partial
- Displays a grid of highlighted listings.
- Loads featured properties from data/properties.json
  by default. Can be overridden per-page by setting
  $featured before including this partial.
=====================================================*/


if (!isset($featured)) {
  // Load all properties and keep only featured, non-sold ones
  $allProperties = json_decode(
    file_get_contents(ROOT_PATH . "/data/properties.json"),
    true
  ) ?? [];

  $featuredItems = array_values(
    array_filter($allProperties, fn($p) => !empty($p["featured"]) && empty($p["sold"]))
  );

  // Map properties.json schema → partial's item schema
  $mappedItems = array_map(fn($p) => [
    "image"    => $p["image"]    ?? "",
    "imageAlt" => $p["title"]    ?? "Featured property",
    "beds"     => $p["beds"]     ?? 0,
    "baths"    => $p["baths"]    ?? 0,
    "sqft"     => $p["sqft"]     ?? 0,
    "title"    => $p["title"]    ?? "Property",
    "city"     => $p["city"]     ?? "",
    "price"    => !empty($p["price"]) ? "$" . number_format((int)$p["price"]) : "",
    "href"     => "/property/" . ($p["id"] ?? "#"),
  ], $featuredItems);

  $featured = [
    "title" => "FEATURED PROPERTIES",
    "items" => $mappedItems,
  ];
}

// Sanitize and extract data for rendering
$title = htmlspecialchars((string)($featured["title"] ?? "FEATURED PROPERTIES"));
$items = is_array($featured["items"] ?? null) ? $featured["items"] : [];
?>

<!-- Featured Properties Section -->
<section class="fp">
  <div class="fp__inner">

    <!-- Section Title -->
    <h2 class="fp__title"><?= $title ?></h2>

    <?php if (empty($items)): ?>

      <!-- Empty state — shown when no properties are marked featured -->
      <p class="fp__empty">No featured properties at this time. Check back soon.</p>

    <?php else: ?>

      <!-- Properties Card Grid -->
      <div class="fp__grid">
        <?php foreach ($items as $p):
          $img   = htmlspecialchars((string)($p["image"]    ?? ""));
          $alt   = htmlspecialchars((string)($p["imageAlt"] ?? "Featured property"));
          $beds  = htmlspecialchars((string)($p["beds"]     ?? ""));
          $baths = htmlspecialchars((string)($p["baths"]    ?? ""));
          $sqft  = !empty($p["sqft"]) ? number_format((int)$p["sqft"]) : "";
          $ptitle = htmlspecialchars((string)($p["title"]   ?? "Property"));
          $city  = htmlspecialchars((string)($p["city"]     ?? ""));
          $price = htmlspecialchars((string)($p["price"]    ?? ""));
          $href  = htmlspecialchars((string)($p["href"]     ?? "#"));
        ?>

          <!-- Individual Property Card -->
          <a class="fp__card" href="<?= $href ?>">

            <!-- Property Image -->
            <div class="fp__media">
              <?php if ($img): ?>
                <img class="fp__img" src="<?= $img ?>" alt="<?= $alt ?>">
              <?php else: ?>
                <div class="fp__img-placeholder"></div>
              <?php endif; ?>
            </div>

            <!-- Property Meta Info -->
            <div class="fp__meta">
              <div class="fp__stats">
                <?= $beds ?> Bed &nbsp;|&nbsp; <?= $baths ?> Bath
                <?= $sqft ? "&nbsp;|&nbsp; $sqft sqft" : "" ?>
              </div>
              <div class="fp__name"><?= $ptitle ?><?= $city ? " — $city" : "" ?></div>
              <?php if ($price): ?>
                <div class="fp__price"><?= $price ?></div>
              <?php endif; ?>
            </div>

          </a>

        <?php endforeach; ?>
      </div>

    <?php endif; ?>

  </div>
</section>
