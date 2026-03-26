<?php
/* =====================================================
Footer Template Partial
- Allows each page to override footer content if needed
===================================================== */
  
  
  $footer = $footer ?? [
    "brand" => [
      "main" => "MICHELE RUEFF",
      "sub"  => "& ASSOCIATES"
    ],
    "phoneLabel" => "321.948.4332",
    "phoneHref" => "+13219484332",
    "emailLabel" => "michele.rueff@exprealty.com",
    "emailHref" => "michele.rueff@exprealty.com",
    "brokerageLogoText" => "exp\nREALTY", // fallback text if logo image missing
    "brokerageLogoImg" => "/assets/img/exp-logo.png",
    "bottomNote" => "© 2026 Michele Rueff & Associates",
  ];

  // Sanitize footer data
  $brandMain = htmlspecialchars($footer["brand"]["main"] ?? "");
  $brandSub  = htmlspecialchars($footer["brand"]["sub"] ?? "");
  $phoneLabel = htmlspecialchars($footer["phoneLabel"] ?? "");
  $phoneHref = htmlspecialchars($footer["phoneHref"] ?? "");
  $emailLabel = htmlspecialchars($footer["emailLabel"] ?? "");
  $emailHref = htmlspecialchars($footer["emailHref"] ?? "");
  $bottomNote = htmlspecialchars($footer["bottomNote"] ?? "");

  // Brokerage logo (image or text)
  $logoImg = $footer["brokerageLogoImg"] ?? "";
  $logoText = $footer["brokerageLogoText"] ?? "";
?>

  <!--  Site Footer Start -->
<footer class="site-footer">
  <div class="site-footer__inner">

    <!-- Brand / Brokerage name -->
    <div class="site-footer__brand">
      <span class="brand-line brand-line--main"><?= $brandMain ?></span>
      <span class="brand-line brand-line--sub"><?= $brandSub ?></span>
    </div>

    <!-- Contact info -->
    <div class="site-footer__contact">

      <!-- Clickable Phone Link -->
      <a class="site-footer__link" href="tel:<?= $phoneHref ?>"><?= $phoneLabel ?></a>
      <span class="site-footer__sep">|</span>

      <!-- Clickable Email Link -->
      <a class="site-footer__link" href="mailto:<?= $emailHref ?>"><?= $emailLabel ?></a>
    </div>

    <!-- Brokerage Logo / Text (Image Prefered but included text fallback) -->
    <div class="site-footer__brokerage">
      <?php if (!empty($logoImg)): ?>
        <!-- Display brokerage logo image -->
        <img class="site-footer__brokerage-img" src="<?= htmlspecialchars($logoImg) ?>" alt="Brokerage logo">
      <?php else: ?>
        <!-- Fallback: display brokerage text -->
        <div class="site-footer__brokerage-text"><?= nl2br(htmlspecialchars($logoText)) ?></div>
      <?php endif; ?>
    </div>

    <!-- Optional Bottom note / copyright -->
    <?php if (!empty($bottomNote)): ?>
      <div class="site-footer__note"><?= $bottomNote ?></div>
    <?php endif; ?>

  </div>
</footer>

<!-- Contact Modal Partial -->
<?php require ROOT_PATH . "/pages/partials/contact-modal.php"; ?>

<!-- Main site JavaScript (header behavior, modal logic, menu toggle) -->
<script src="/assets/js/main.js" defer></script>

</body>
</html>