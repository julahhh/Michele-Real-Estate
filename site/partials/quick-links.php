<?php
/* =====================================================
Quick Links Section Partial
- Renders a grid of quick-access tiles linking to
  key site actions (e.g., Search Homes, Home Valuation).
- Allows override if $quickLinks already exists
===================================================== */

$quickLinks = $quickLinks ?? [
  "items" => [
    /* Example item structure:
    [
      "title" => "Displayed Title",
      "href" => "/linkURL",
      "image" => "imageURL.png",
      "alt" => "IMG Alt Text",
    ],
    */
    [
      "title" => "SEARCH HOMES",
      "href" => "/buy",
      "image" => "/assets/img/tile-search-homes.png",
      "alt" => "Search homes",
    ],
    [
      "title" => "HOME<br>VALUATION",
      "href" => "/sell",
      "image" => "/assets/img/tile-home-valuation.png",
      "alt" => "Home valuation",
    ],
    [
      "title" => "PAST SALES",
      "href" => "/sell",
      "image" => "/assets/img/tile-past-sales.png",
      "alt" => "Past sales",
    ],
  ],
];

// Ensure quick links items are an array -- prevent errors if data is missing or malformed
$items = is_array($quickLinks["items"] ?? null) ? $quickLinks["items"] : [];
?>

<!-- =====================================================
  Quick Links Tile Section
  Displays image tiles linking to key site actions
===================================================== -->
<section class="ql">
  <div class="ql__inner">
    <div class="ql__grid">
      <?php foreach ($items as $item): ?>
        <?php
          // Sanitize individual quick link data
          $title = htmlspecialchars((string)($item["title"] ?? ""));
          $href  = htmlspecialchars((string)($item["href"] ?? "#"));
          $img   = htmlspecialchars((string)($item["image"] ?? ""));
          $alt   = htmlspecialchars((string)($item["alt"] ?? ""));
        ?>

        <!-- Individual tile card -->
        <a class="ql__card" href="<?= $href ?>">
          <!-- Tile image -->
          <img class="ql__img" src="<?= $img ?>" alt="<?= $alt ?>">

          <!-- Tile label -->
          <div class="ql__label"><?= $item["title"] ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
