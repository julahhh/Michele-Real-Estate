<?php
$pageTitle = "Home";
$activePage = "home";

require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/header.php";
?>

<main>

  <?php
    $meet = [
      "heading" => "MEET MICHELE",
      "image" => "/assets/img/meet-michele.jpg",
      "ctaHref" => "/about",
      "ctaText" => "LEARN MORE",
      "body" => [
        "Michele Rueff is a Central Florida real estate professional serving Clermont, Orlando, and surrounding areas since 2007. She holds a Bachelor's degree in Business and Marketing from the University of Central Florida and brings a rare blend of real estate, construction, and negotiation expertise to every transaction.",
        "She has personally bought, sold, and renovated 80+ homes, giving her deep insight into rehabs, investment strategy, interior design, and contracts. She specializes in pre-foreclosures, short sales, distressed properties, and complex transactions."
      ],
    ];
    require __DIR__ . "/partials/bio.php";
  ?>

  <?php require __DIR__ . "/partials/testimonials.php";?>

  <?php
    $cta = [
      "title" => "WORK WITH US",
      "buttonText" => "CONTACT US",
      "buttonHref" => "/contact",
      "bgImage" => "/assets/img/cta-work-with-us.jpg",
      "bgAlt" => "Luxury living room interior",
      "overlay" => 0.45,
    ];
    require __DIR__ . "/partials/cta.php";
    ?>

</main>

<?php require __DIR__ . "/partials/footer.php"; ?>
