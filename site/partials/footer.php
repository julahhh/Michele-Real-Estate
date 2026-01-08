<?php
  // Allow per-site overrides
  $footer = $footer ?? [
    "brand" => "MICHELE RUEFF & ASSOCIATES",
    "phoneLabel" => "321.948.4332",
    "phoneHref" => "+13219484332",
    "emailLabel" => "michele.rueff@exprealty.com",
    "emailHref" => "michele.rueff@exprealty.com",
    "brokerageLogoText" => "exp\nREALTY", // simple fallback if no image
    "brokerageLogoImg" => "/assets/img/exp-logo.png",            // e.g. "/assets/img/exp-logo.png"
    "bottomNote" => ""                   // optional: "© 2026 Michele Rueff..."
  ];

  $brand = htmlspecialchars($footer["brand"] ?? "");
  $phoneLabel = htmlspecialchars($footer["phoneLabel"] ?? "");
  $phoneHref = htmlspecialchars($footer["phoneHref"] ?? "");
  $emailLabel = htmlspecialchars($footer["emailLabel"] ?? "");
  $emailHref = htmlspecialchars($footer["emailHref"] ?? "");
  $bottomNote = htmlspecialchars($footer["bottomNote"] ?? "");

  $logoImg = $footer["brokerageLogoImg"] ?? "";
  $logoText = $footer["brokerageLogoText"] ?? "";
?>

<footer class="site-footer">
  <div class="site-footer__inner">

    <div class="site-footer__brand"><?= $brand ?></div>

    <div class="site-footer__contact">
      <a class="site-footer__link" href="tel:<?= $phoneHref ?>"><?= $phoneLabel ?></a>
      <span class="site-footer__sep">|</span>
      <a class="site-footer__link" href="mailto:<?= $emailHref ?>"><?= $emailLabel ?></a>
    </div>

    <div class="site-footer__brokerage">
      <?php if (!empty($logoImg)): ?>
        <img class="site-footer__brokerage-img" src="<?= htmlspecialchars($logoImg) ?>" alt="Brokerage logo">
      <?php else: ?>
        <div class="site-footer__brokerage-text"><?= nl2br(htmlspecialchars($logoText)) ?></div>
      <?php endif; ?>
    </div>

    <?php if (!empty($bottomNote)): ?>
      <div class="site-footer__note"><?= $bottomNote ?></div>
    <?php endif; ?>

  </div>
</footer>

</body>
</html>
