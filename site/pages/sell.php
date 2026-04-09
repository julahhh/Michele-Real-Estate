<?php
// -------------------------------------------------
// Sell Page Template:
// This page renders the "Sell" section of the site
// -------------------------------------------------

// Page-specific metadata
$pageTitle = "Sell Your Home with Michele";
$activePage = "sell";

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
        <h1 class="hero__title">Sell Your Home</h1>
        <p class="hero__tagline">Get the best possible price for your home with Michele's expert guidance and unmatched local knowledge.</p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Why Sell with Michele Section
  ===================================================== -->
  <section class="sell-why">
    <div class="sell-why__inner">

      <h2 class="sell-why__title">WHY SELL WITH MICHELE</h2>
      <p class="sell-why__intro">Selling a home is one of the biggest financial decisions you'll make. Michele brings 18+ years of Central Florida market expertise, renovation knowledge, and proven negotiation skills to get you the best possible outcome.</p>

      <div class="sell-why__grid">

        <div class="sell-why__card">
          <div class="sell-why__icon">01</div>
          <h3 class="sell-why__card-title">EXPERT PRICING</h3>
          <p class="sell-why__card-desc">Pricing a home correctly from day one is everything. Michele's deep market knowledge and construction background mean your home is never undervalued or sitting unsold.</p>
        </div>

        <div class="sell-why__card">
          <div class="sell-why__icon">02</div>
          <h3 class="sell-why__card-title">MAXIMUM EXPOSURE</h3>
          <p class="sell-why__card-desc">Your listing reaches serious buyers through MLS, digital marketing, and Michele's network of investors and agents across Central Florida.</p>
        </div>

        <div class="sell-why__card">
          <div class="sell-why__icon">03</div>
          <h3 class="sell-why__card-title">STAGING &amp; DESIGN</h3>
          <p class="sell-why__card-desc">Michele has an eye for design honed across 80+ personal renovations. She'll guide you on exactly what to update, stage, or leave alone to maximize your sale price.</p>
        </div>

        <div class="sell-why__card">
          <div class="sell-why__icon">04</div>
          <h3 class="sell-why__card-title">SKILLED NEGOTIATOR</h3>
          <p class="sell-why__card-desc">From the first offer through to closing, Michele fights for your terms — protecting your equity while keeping the deal on track.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- =====================================================
    Selling Process Section
  ===================================================== -->
  <section class="sell-process">
    <div class="sell-process__inner">

      <h2 class="sell-process__title">THE SELLING PROCESS</h2>

      <ol class="sell-process__steps">

        <li class="sell-process__step">
          <span class="sell-process__num">01</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">FREE HOME VALUATION</h3>
            <p class="sell-process__step-desc">Michele starts with a no-obligation valuation of your home, drawing on current market data and her firsthand knowledge of Central Florida neighborhoods.</p>
          </div>
        </li>

        <li class="sell-process__step">
          <span class="sell-process__num">02</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">PRICING STRATEGY</h3>
            <p class="sell-process__step-desc">Together you'll set a price that attracts strong offers quickly without leaving money on the table — backed by comparable sales and Michele's market instinct.</p>
          </div>
        </li>

        <li class="sell-process__step">
          <span class="sell-process__num">03</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">PREP &amp; STAGING</h3>
            <p class="sell-process__step-desc">Michele advises on cost-effective improvements and staging that make buyers fall in love — from curb appeal to interior presentation.</p>
          </div>
        </li>

        <li class="sell-process__step">
          <span class="sell-process__num">04</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">LISTING &amp; MARKETING</h3>
            <p class="sell-process__step-desc">Professional photography, MLS listing, digital campaigns, and Michele's investor network go to work putting your property in front of the right buyers fast.</p>
          </div>
        </li>

        <li class="sell-process__step">
          <span class="sell-process__num">05</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">OFFERS &amp; NEGOTIATION</h3>
            <p class="sell-process__step-desc">Michele reviews every offer with you, explains the trade-offs, and negotiates hard on price, contingencies, and timeline to secure the best possible deal.</p>
          </div>
        </li>

        <li class="sell-process__step">
          <span class="sell-process__num">06</span>
          <div class="sell-process__step-body">
            <h3 class="sell-process__step-title">CLOSING DAY</h3>
            <p class="sell-process__step-desc">Michele coordinates with title, lenders, and buyers to ensure a smooth closing — so you walk away with your proceeds and peace of mind.</p>
          </div>
        </li>

      </ol>
    </div>
  </section>

  <!-- Testimonials Partial -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>

<style>
/* =====================================================
   Sell Page — Why Sell & Process Sections
   (page-scoped styles)
===================================================== */

/* ---- Why Sell with Michele ---- */
.sell-why {
  background: #f3efe8;
  padding: 70px 0;
}

.sell-why__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
  text-align: center;
}

.sell-why__title {
  margin: 0 0 18px;
  font-size: 30px;
  letter-spacing: 0.10em;
  font-weight: 300;
  text-transform: uppercase;
  color: #111;
}

.sell-why__intro {
  max-width: 620px;
  margin: 0 auto 50px;
  font-size: 14px;
  line-height: 1.80;
  color: rgba(0, 0, 0, 0.70);
}

.sell-why__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
  text-align: left;
}

.sell-why__card {
  border-top: 1px solid rgba(0, 0, 0, 0.15);
  padding-top: 24px;
}

.sell-why__icon {
  font-size: 28px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: rgba(0, 0, 0, 0.25);
  margin-bottom: 14px;
  line-height: 1;
}

.sell-why__card-title {
  font-size: 12px;
  letter-spacing: 0.18em;
  font-weight: 600;
  text-transform: uppercase;
  color: #111;
  margin: 0 0 10px;
}

.sell-why__card-desc {
  font-size: 13px;
  line-height: 1.75;
  color: rgba(0, 0, 0, 0.65);
  margin: 0;
}

/* ---- Selling Process ---- */
.sell-process {
  background: #000;
  padding: 70px 0;
}

.sell-process__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
}

.sell-process__title {
  margin: 0 0 50px;
  font-size: 30px;
  letter-spacing: 0.10em;
  font-weight: 300;
  text-transform: uppercase;
  color: #fff;
  text-align: center;
}

.sell-process__steps {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0;
}

.sell-process__step {
  display: flex;
  gap: 20px;
  padding: 32px 28px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  margin: -1px 0 0 -1px;
}

.sell-process__num {
  font-size: 28px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: rgba(255, 255, 255, 0.20);
  line-height: 1;
  flex-shrink: 0;
}

.sell-process__step-title {
  font-size: 11px;
  letter-spacing: 0.18em;
  font-weight: 600;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.85);
  margin: 0 0 10px;
}

.sell-process__step-desc {
  font-size: 13px;
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.55);
  font-weight: 100;
  margin: 0;
}

/* ---- Responsive ---- */
@media (max-width: 1024px) {
  .sell-why__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 24px 40px;
  }

  .sell-process__steps {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 680px) {
  .sell-why  { padding: 54px 0; }
  .sell-process { padding: 54px 0; }

  .sell-why__inner,
  .sell-process__inner {
    padding: 0 28px;
  }

  .sell-why__grid {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .sell-process__steps {
    grid-template-columns: 1fr;
  }

  .sell-process__step {
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
