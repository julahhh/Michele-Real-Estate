<?php
$quickLinks = $quickLinks ?? [
  "items" => [
    [
      "title" => "SEARCH HOMES",
      "href" => "/search",
      "image" => "/assets/img/tile-search-homes.png",
      "alt" => "Search homes",
    ],
    [
      "title" => "HOME<br>VALUATION",
      "href" => "/valuation",
      "image" => "/assets/img/tile-home-valuation.png",
      "alt" => "Home valuation",
    ],
    [
      "title" => "PAST SALES",
      "href" => "/past-sales",
      "image" => "/assets/img/tile-past-sales.png",
      "alt" => "Past sales",
    ],
  ],
];

$items = is_array($quickLinks["items"] ?? null) ? $quickLinks["items"] : [];
?>

<section class="ql">
  <div class="ql__inner">
    <div class="ql__grid">
      <?php foreach ($items as $item): ?>
        <?php
          $title = htmlspecialchars((string)($item["title"] ?? ""));
          $href  = htmlspecialchars((string)($item["href"] ?? "#"));
          $img   = htmlspecialchars((string)($item["image"] ?? ""));
          $alt   = htmlspecialchars((string)($item["alt"] ?? ""));
        ?>
        <a class="ql__card" href="<?= $href ?>">
          <img class="ql__img" src="<?= $img ?>" alt="<?= $alt ?>">
          <div class="ql__label"><?= $item["title"] ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
