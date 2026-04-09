<?php
// -------------------------------------------------
// Buy Page Template:
// This page renders the "Buy" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Buy a Home with Michele";
$activePage = "buy";

// Global layout includes
require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

?>

<main>

  <!-- =====================================================
    Hero Section
  ===================================================== -->
  <section class="hero hero--compact">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">Buy</h1>
        <p class="hero__tagline">Find your dream home with Michele's expert guidance and unmatched local knowledge.</p>
      </div>
    </div>
  </section>

  <!-- Properties for Sale — Featured Properties Partial -->
  <?php require ROOT_PATH . "/pages/partials/featured-properties.php"; ?>

  <!-- =====================================================
    Why Buy with Michele Section
  ===================================================== -->
  <section class="buy-why">
    <div class="buy-why__inner">

      <h2 class="buy-why__title">WHY BUY WITH MICHELE</h2>
      <p class="buy-why__intro">With over 18 years of experience in Central Florida real estate, Michele brings unmatched local knowledge, negotiation skill, and personal dedication to every home search.</p>

      <div class="buy-why__grid">

        <div class="buy-why__card">
          <div class="buy-why__icon">01</div>
          <h3 class="buy-why__card-title">LOCAL EXPERTISE</h3>
          <p class="buy-why__card-desc">Deep knowledge of Clermont, Orlando, and surrounding communities — from neighborhoods and school districts to market trends and hidden gems.</p>
        </div>

        <div class="buy-why__card">
          <div class="buy-why__icon">02</div>
          <h3 class="buy-why__card-title">NEGOTIATION POWER</h3>
          <p class="buy-why__card-desc">Michele has personally bought and renovated 80+ homes. She knows how to structure offers, navigate inspections, and close on your terms.</p>
        </div>

        <div class="buy-why__card">
          <div class="buy-why__icon">03</div>
          <h3 class="buy-why__card-title">COMPLEX TRANSACTIONS</h3>
          <p class="buy-why__card-desc">Specialists in pre-foreclosures, short sales, distressed properties, and investment opportunities that other agents won't touch.</p>
        </div>

        <div class="buy-why__card">
          <div class="buy-why__icon">04</div>
          <h3 class="buy-why__card-title">ALWAYS AVAILABLE</h3>
          <p class="buy-why__card-desc">Michele and her team are responsive day or night. When you find the right home, you need an agent who moves as fast as you do.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- =====================================================
    Buying Process Section
  ===================================================== -->
  <section class="buy-process">
    <div class="buy-process__inner">

      <h2 class="buy-process__title">THE BUYING PROCESS</h2>

      <ol class="buy-process__steps">

        <li class="buy-process__step">
          <span class="buy-process__num">01</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">CONSULTATION</h3>
            <p class="buy-process__step-desc">We start with a conversation about your goals, budget, and timeline. Michele listens first, then builds a strategy tailored to you.</p>
          </div>
        </li>

        <li class="buy-process__step">
          <span class="buy-process__num">02</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">GET PRE-APPROVED</h3>
            <p class="buy-process__step-desc">Before you shop, get a mortgage pre-approval. Michele works with trusted local lenders and can connect you with the right fit for your situation.</p>
          </div>
        </li>

        <li class="buy-process__step">
          <span class="buy-process__num">03</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">HOME SEARCH</h3>
            <p class="buy-process__step-desc">Michele curates listings that match your criteria — including off-market and pre-foreclosure opportunities you won't find on Zillow.</p>
          </div>
        </li>

        <li class="buy-process__step">
          <span class="buy-process__num">04</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">MAKE AN OFFER</h3>
            <p class="buy-process__step-desc">When you find the one, Michele crafts a competitive offer and guides you through negotiations, contingencies, and timelines.</p>
          </div>
        </li>

        <li class="buy-process__step">
          <span class="buy-process__num">05</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">INSPECTIONS &amp; DUE DILIGENCE</h3>
            <p class="buy-process__step-desc">Michele's construction background means she knows exactly what to look for — and how to use inspection results to protect your investment.</p>
          </div>
        </li>

        <li class="buy-process__step">
          <span class="buy-process__num">06</span>
          <div class="buy-process__step-body">
            <h3 class="buy-process__step-title">CLOSING DAY</h3>
            <p class="buy-process__step-desc">Michele walks you through closing from start to finish so there are no surprises — just the keys to your new home.</p>
          </div>
        </li>

      </ol>
    </div>
  </section>

  <!-- Properties for Sale — Featured Properties Partial -->
  <?php require ROOT_PATH . "/pages/partials/featured-properties.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>


<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
