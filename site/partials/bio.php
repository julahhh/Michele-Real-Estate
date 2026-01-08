<?php
// Use $bio as the config for this module (recommended naming)
$bio = $bio ?? null;

// Backwards compatibility: if you already used $meet, accept it too
if ($bio === null && isset($meet) && is_array($meet)) {
  $bio = $meet;
}

// Defaults
$bio = array_merge([
  "heading" => "MEET MICHELE",
  "body" => [
    "Add your bio paragraph here.",
    "Add your second paragraph here."
  ],
  "image" => "/assets/img/meet-michele.jpg",
  "imageAlt" => "Portrait",
  "ctaText" => "LEARN MORE",
  "ctaHref" => "/about",
], is_array($bio) ? $bio : []);

// Extra safety: never pass null to htmlspecialchars
$bio["image"]    = $bio["image"]    ?: "";
$bio["imageAlt"] = $bio["imageAlt"] ?: "";
$bio["heading"]  = $bio["heading"]  ?: "";
$bio["ctaText"]  = $bio["ctaText"]  ?: "";
$bio["ctaHref"]  = $bio["ctaHref"]  ?: "#";
?>

<section class="meet">
  <div class="meet__inner">

    <div class="meet__media">
      <img
        class="meet__img"
        src="<?= htmlspecialchars($bio["image"]) ?>"
        alt="<?= htmlspecialchars($bio["imageAlt"]) ?>"
      >
    </div>

    <div class="meet__content">
      <h2 class="meet__title"><?= htmlspecialchars($bio["heading"]) ?></h2>

      <div class="meet__text">
        <?php foreach ((array)$bio["body"] as $p): ?>
          <p><?= htmlspecialchars((string)$p) ?></p>
        <?php endforeach; ?>
      </div>

      <a class="btn btn--light" href="<?= htmlspecialchars($bio["ctaHref"]) ?>">
        <?= htmlspecialchars($bio["ctaText"]) ?>
      </a>
    </div>

  </div>
</section>
