<?php
  $testimonials = $testimonials ?? [
    "title" => "TESTIMONIALS",
    "watermark" => "MR",
    "items" => [
      [
        "text" => "Michele did a great job helping me navigate buying a home in a new location. She was very responsive and worked through several challenges during the purchase process. She also has a number of resources for post sale home needs.",
        "name" => "Paige",
      ],
      [
        "text" => "Michele helped me sell my home and with 2 weeks close on my new home. She is a really dedicated sales woman. Michele knows her way around the real estate world! She was always available to me for questions or anything night or day. She is such a nice person and would do anything to get you into the house of your dreams!!",
        "name" => "Bryan",
      ],
      [
        "text" => "Michele has an amazing eye for decor. Her taste is beautiful. She decorate on a budget because she is a great shopper. My house looks amazing thanks to Michele. Thank you for bringing the beauty out in my home.",
        "name" => "Darlene",
      ],
    ],
  ];

  $title = htmlspecialchars((string)($testimonials["title"] ?? "TESTIMONIALS"));
  $watermark = htmlspecialchars((string)($testimonials["watermark"] ?? "MR"));
  $items = is_array($testimonials["items"] ?? null) ? $testimonials["items"] : [];
?>

<section class="tstm">
  <div class="tstm__watermark" aria-hidden="true"><?= $watermark ?></div>

  <div class="tstm__inner">
    <h2 class="tstm__title"><?= $title ?></h2>

    <div class="tstm__grid">
      <?php foreach ($items as $item): 
        $text = htmlspecialchars((string)($item["text"] ?? ""));
        $name = htmlspecialchars((string)($item["name"] ?? ""));
      ?>
        <article class="tstm__card">
          <div class="tstm__quote" aria-hidden="true">“</div>
          <p class="tstm__text"><?= $text ?></p>
          <div class="tstm__name"><?= $name ?></div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>