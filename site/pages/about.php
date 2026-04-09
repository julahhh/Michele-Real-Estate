<?php
// -------------------------------------------------
// About Page Template
// -------------------------------------------------

$pageTitle  = "About Michele";
$activePage = "about";

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
        <h1 class="hero__title">About Michele</h1>
        <p class="hero__tagline">Your trusted agent.</p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Profile Section — Photo + Identity
  ===================================================== -->
  <section class="bio-profile">
    <div class="bio-profile__inner">

      <!-- Photo -->
      <div class="bio-profile__media">
        <img class="bio-profile__img" src="/assets/img/meet-michele.jpg" alt="Michele Rueff, Licensed Realtor">
        <div class="bio-profile__img-caption">
          <img src="/assets/img/exp-logo.webp" alt="eXp Realty" class="bio-profile__exp-logo">
        </div>
      </div>

      <!-- Identity & Intro -->
      <div class="bio-profile__content">

        <p class="bio-profile__eyebrow">Licensed Realtor · Central Florida</p>
        <h2 class="bio-profile__name">MICHELE RUEFF</h2>
        <p class="bio-profile__tagline">eXp-Winning Realty &nbsp;·&nbsp; Clermont, Florida</p>

        <p class="bio-profile__intro">
          Michele Rueff has been a fixture of the Central Florida real estate market since 2007.
          With a background in business, marketing, and hands-on construction, she brings a depth
          of expertise that few agents can match — whether you're buying your first home, selling
          an investment property, or navigating a complex distressed transaction.
        </p>

        <!-- Key stats -->
        <div class="bio-profile__stats">
          <div class="bio-profile__stat">
            <span class="bio-profile__stat-num">18+</span>
            <span class="bio-profile__stat-label">Years Licensed</span>
          </div>
          <div class="bio-profile__stat">
            <span class="bio-profile__stat-num">80+</span>
            <span class="bio-profile__stat-label">Homes Renovated</span>
          </div>
          <div class="bio-profile__stat">
            <span class="bio-profile__stat-num">UCF</span>
            <span class="bio-profile__stat-label">Business &amp; Marketing</span>
          </div>
        </div>

        <a class="btn btn--light" href="/contact">GET IN TOUCH</a>

      </div>

    </div>
  </section>

  <!-- =====================================================
    Story Section — Full Biography
  ===================================================== -->
  <section class="bio-story">
    <div class="bio-story__inner">

      <div class="bio-story__header">
        <h2 class="bio-story__title">HER STORY</h2>
        <div class="bio-story__rule"></div>
      </div>

      <div class="bio-story__body">

        <p>
          Michele's path into real estate wasn't accidental — it was a natural extension of a lifelong
          passion for homes, people, and community. Growing up with an eye for design and a head for
          numbers, she pursued a Bachelor's degree in Business and Marketing at the University of Central
          Florida before channeling that foundation into the local property market.
        </p>

        <p>
          Since earning her license in 2007, Michele has personally bought, sold, and renovated more
          than 80 homes across Clermont, Orlando, and the surrounding communities. That hands-on
          experience goes far beyond what most agents bring to the table — she understands construction
          costs, renovation timelines, interior design decisions, and the contractual nuances that
          determine whether a deal protects you or exposes you.
        </p>

        <!-- Pull quote -->
        <blockquote class="bio-story__quote">
          "Real estate isn't just about transactions — it's about people, their goals, and their futures.
          That's what drives me every single day."
          <cite class="bio-story__cite">— Michele Rueff</cite>
        </blockquote>

        <p>
          Michele has built a reputation for tackling the deals other agents walk away from. She
          specializes in pre-foreclosures, short sales, and distressed properties — complex transactions
          that require patience, expertise, and a calm hand under pressure. Her investors and repeat
          clients return to her precisely because she doesn't flinch when things get complicated.
        </p>

        <p>
          She is a proud member of Florida Realtors and the National Association of Realtors, and
          she calls eXp-Winning Realty in Clermont home. When she isn't closing deals, Michele brings
          the same attention to detail and dedication to her community — the place she has served,
          invested in, and loved for nearly two decades.
        </p>

      </div>

    </div>
  </section>

  <!-- =====================================================
    Expertise & Credentials Section
  ===================================================== -->
  <section class="about-credentials">
    <div class="about-credentials__inner">

      <h2 class="about-credentials__title">EXPERTISE &amp; CREDENTIALS</h2>

      <div class="about-credentials__grid">

        <div class="about-credentials__card">
          <div class="about-credentials__number">18+</div>
          <div class="about-credentials__label">Years of Experience</div>
          <p class="about-credentials__desc">Serving Clermont, Orlando, and surrounding Central Florida communities since 2007.</p>
        </div>

        <div class="about-credentials__card">
          <div class="about-credentials__number">80+</div>
          <div class="about-credentials__label">Homes Bought &amp; Renovated</div>
          <p class="about-credentials__desc">Hands-on expertise in rehabs, investment strategy, and interior design from personal experience.</p>
        </div>

        <div class="about-credentials__card">
          <div class="about-credentials__number">BSc</div>
          <div class="about-credentials__label">Business &amp; Marketing, UCF</div>
          <p class="about-credentials__desc">Bachelor's degree from the University of Central Florida with a focus on marketing and business strategy.</p>
        </div>

      </div>

      <div class="about-credentials__specialties">
        <h3 class="about-credentials__specialties-title">SPECIALIZATIONS</h3>
        <ul class="about-credentials__list">
          <li>Pre-Foreclosures &amp; Short Sales</li>
          <li>Distressed &amp; Complex Transactions</li>
          <li>Investment &amp; Rehab Properties</li>
          <li>Negotiation &amp; Contract Expertise</li>
          <li>Interior Design &amp; Staging</li>
          <li>Florida Realtors &amp; NAR Member</li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Testimonials Partial -->
  <?php require ROOT_PATH . "/pages/partials/testimonials.php"; ?>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>

<style>
/* =====================================================
   About Page — Profile & Story Sections
   (page-scoped styles)
===================================================== */

/* ---- Profile Section ---- */
.bio-profile {
  background: #000;
  padding: 80px 0;
}

.bio-profile__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
  display: grid;
  grid-template-columns: 420px 1fr;
  gap: 80px;
  align-items: center;
}

/* Photo */
.bio-profile__media {
  position: relative;
}

.bio-profile__img {
  display: block;
  width: 100%;
  height: auto;
}

.bio-profile__img-caption {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.55);
  backdrop-filter: blur(6px);
  padding: 14px 18px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.bio-profile__exp-logo {
  height: 26px;
  width: auto;
  opacity: 0.80;
  filter: brightness(0) invert(1);
}

/* Content */
.bio-profile__content {
  color: #fff;
}

.bio-profile__eyebrow {
  font-size: 11px;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.45);
  margin: 0 0 14px;
}

.bio-profile__name {
  font-size: 46px;
  font-weight: 100;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: #fff;
  margin: 0 0 10px;
  line-height: 1.05;
}

.bio-profile__tagline {
  font-size: 12px;
  letter-spacing: 0.14em;
  color: rgba(255, 255, 255, 0.40);
  text-transform: uppercase;
  margin: 0 0 32px;
}

.bio-profile__intro {
  font-size: 14px;
  line-height: 1.85;
  color: rgba(255, 255, 255, 0.70);
  font-weight: 100;
  margin: 0 0 40px;
  max-width: 540px;
}

/* Stats row */
.bio-profile__stats {
  display: flex;
  gap: 0;
  margin: 0 0 40px;
  border-top: 1px solid rgba(255, 255, 255, 0.10);
  border-bottom: 1px solid rgba(255, 255, 255, 0.10);
}

.bio-profile__stat {
  flex: 1;
  padding: 22px 0;
  display: flex;
  flex-direction: column;
  gap: 5px;
  border-right: 1px solid rgba(255, 255, 255, 0.10);
}

.bio-profile__stat:first-child { padding-left: 0; }
.bio-profile__stat:last-child  { border-right: none; padding-left: 28px; }

.bio-profile__stat + .bio-profile__stat { padding-left: 28px; }

.bio-profile__stat-num {
  font-size: 32px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: #fff;
  line-height: 1;
}

.bio-profile__stat-label {
  font-size: 10px;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.38);
}

/* ---- Story Section ---- */
.bio-story {
  background: #f3efe8;
  padding: 80px 0;
}

.bio-story__inner {
  max-width: 780px;
  margin: 0 auto;
  padding: 0 40px;
}

.bio-story__header {
  display: flex;
  align-items: center;
  gap: 24px;
  margin-bottom: 48px;
}

.bio-story__title {
  font-size: 13px;
  letter-spacing: 0.24em;
  font-weight: 600;
  text-transform: uppercase;
  color: rgba(0, 0, 0, 0.35);
  white-space: nowrap;
  margin: 0;
}

.bio-story__rule {
  flex: 1;
  height: 1px;
  background: rgba(0, 0, 0, 0.12);
}

.bio-story__body p {
  font-size: 16px;
  line-height: 1.90;
  color: rgba(0, 0, 0, 0.72);
  margin: 0 0 24px;
}

/* Pull quote */
.bio-story__quote {
  margin: 40px 0;
  padding: 28px 32px;
  border-left: 3px solid rgba(0, 0, 0, 0.18);
  background: rgba(0, 0, 0, 0.04);
  font-size: 17px;
  font-style: italic;
  line-height: 1.75;
  color: rgba(0, 0, 0, 0.65);
}

.bio-story__cite {
  display: block;
  margin-top: 14px;
  font-size: 12px;
  font-style: normal;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(0, 0, 0, 0.35);
}

/* ---- About Credentials (kept from original) ---- */
.about-credentials {
  background: #111;
  padding: 70px 0;
}

.about-credentials__inner {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 40px;
  text-align: center;
}

.about-credentials__title {
  margin: 0 0 50px;
  font-size: 30px;
  letter-spacing: 0.10em;
  font-weight: 300;
  text-transform: uppercase;
  color: #fff;
}

.about-credentials__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
  margin-bottom: 60px;
}

.about-credentials__card {
  border: 1px solid rgba(255, 255, 255, 0.12);
  padding: 36px 24px;
}

.about-credentials__number {
  font-size: 44px;
  font-weight: 100;
  letter-spacing: 0.06em;
  color: #fff;
  line-height: 1;
  margin-bottom: 10px;
}

.about-credentials__label {
  font-size: 12px;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.75);
  margin-bottom: 14px;
}

.about-credentials__desc {
  font-size: 13px;
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.60);
  font-weight: 100;
  margin: 0;
}

.about-credentials__specialties {
  border-top: 1px solid rgba(255, 255, 255, 0.12);
  padding-top: 50px;
}

.about-credentials__specialties-title {
  margin: 0 0 28px;
  font-size: 16px;
  letter-spacing: 0.18em;
  font-weight: 300;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.75);
}

.about-credentials__list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px 40px;
  text-align: left;
}

.about-credentials__list li {
  font-size: 13px;
  letter-spacing: 0.06em;
  color: rgba(255, 255, 255, 0.80);
  font-weight: 100;
  padding-left: 16px;
  position: relative;
}

.about-credentials__list li::before {
  content: "—";
  position: absolute;
  left: 0;
  color: rgba(255, 255, 255, 0.35);
}

/* ---- Responsive ---- */
@media (max-width: 960px) {
  .bio-profile__inner {
    grid-template-columns: 1fr;
    gap: 40px;
    padding: 0 28px;
  }

  .bio-profile__media {
    max-width: 440px;
    margin: 0 auto;
  }

  .bio-profile__name { font-size: 34px; }
}

@media (max-width: 680px) {
  .bio-profile { padding: 54px 0; }
  .bio-story   { padding: 54px 0; }

  .bio-story__inner { padding: 0 28px; }

  .bio-profile__stats { flex-direction: column; }

  .bio-profile__stat,
  .bio-profile__stat + .bio-profile__stat,
  .bio-profile__stat:last-child {
    padding: 18px 0;
    border-right: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.10);
  }

  .bio-story__quote { padding: 20px 20px; }

  .about-credentials { padding: 54px 0; }
  .about-credentials__inner { padding: 0 28px; }
  .about-credentials__grid  { grid-template-columns: 1fr; gap: 20px; }
  .about-credentials__list  { grid-template-columns: 1fr; }
}
</style>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
