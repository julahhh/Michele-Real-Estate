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
  <section class="hero">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero-sunset.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">
          FIND YOUR<br>
          <span class="hero__subtitle">DREAM HOME</span>
        </h1>
        <div class="hero__buttons">
          <a class="btn btn--ghost" href="/contact">CONTACT MICHELE</a>
        </div>
      </div>
    </div>
  </section>

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

<style>
/* =====================================================
   Buy Page — Why Buy & Process Sections
   (page-scoped styles)
===================================================== */

/* ---- Why Buy with Michele ---- */
.buy-why {
  background: #f3efe8;
  padding: 70px 0;
}

.buy-why__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
  text-align: center;
}

.buy-why__title {
  margin: 0 0 18px;
  font-size: 30px;
  letter-spacing: 0.10em;
  font-weight: 300;
  text-transform: uppercase;
  color: #111;
}

.buy-why__intro {
  max-width: 620px;
  margin: 0 auto 50px;
  font-size: 14px;
  line-height: 1.80;
  color: rgba(0, 0, 0, 0.70);
}

.buy-why__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
  text-align: left;
}

.buy-why__card {
  border-top: 1px solid rgba(0, 0, 0, 0.15);
  padding-top: 24px;
}

.buy-why__icon {
  font-size: 28px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: rgba(0, 0, 0, 0.25);
  margin-bottom: 14px;
  line-height: 1;
}

.buy-why__card-title {
  font-size: 12px;
  letter-spacing: 0.18em;
  font-weight: 600;
  text-transform: uppercase;
  color: #111;
  margin: 0 0 10px;
}

.buy-why__card-desc {
  font-size: 13px;
  line-height: 1.75;
  color: rgba(0, 0, 0, 0.65);
  margin: 0;
}

/* ---- Buying Process ---- */
.buy-process {
  background: #000;
  padding: 70px 0;
}

.buy-process__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
}

.buy-process__title {
  margin: 0 0 50px;
  font-size: 30px;
  letter-spacing: 0.10em;
  font-weight: 300;
  text-transform: uppercase;
  color: #fff;
  text-align: center;
}

.buy-process__steps {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0;
}

.buy-process__step {
  display: flex;
  gap: 20px;
  padding: 32px 28px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  margin: -1px 0 0 -1px; /* collapse borders */
}

.buy-process__num {
  font-size: 28px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: rgba(255, 255, 255, 0.20);
  line-height: 1;
  flex-shrink: 0;
}

.buy-process__step-title {
  font-size: 11px;
  letter-spacing: 0.18em;
  font-weight: 600;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.85);
  margin: 0 0 10px;
}

.buy-process__step-desc {
  font-size: 13px;
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.55);
  font-weight: 100;
  margin: 0;
}

/* ---- Responsive ---- */
@media (max-width: 1024px) {
  .buy-why__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 24px 40px;
  }

  .buy-process__steps {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 680px) {
  .buy-why { padding: 54px 0; }
  .buy-process { padding: 54px 0; }

  .buy-why__inner,
  .buy-process__inner {
    padding: 0 28px;
  }

  .buy-why__grid {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .buy-process__steps {
    grid-template-columns: 1fr;
  }

  .buy-process__step {
    margin: 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    border-left: none;
    border-right: none;
    border-top: none;
    padding: 28px 0;
  }
}
</style>

<?php
// Site footer (global)
require ROOT_PATH . "/pages/partials/footer.php";
?>
