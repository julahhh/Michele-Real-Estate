<?php
  // $activePage can be: about, buy, sell, blog, contact, home
  if (!isset($activePage)) $activePage = "";
?>

<!-- Sticky header -->
<header class="site-header" id="siteHeader">
  <div class="header-inner">

    <nav class="topbar__nav topbar__nav--left" aria-label="Primary left">
      <a class="navlink <?= $activePage === 'about' ? 'is-active' : '' ?>" href="/about">ABOUT</a>
      <a class="navlink <?= $activePage === 'buy' ? 'is-active' : '' ?>" href="/buy">BUY</a>
      <a class="navlink <?= $activePage === 'sell' ? 'is-active' : '' ?>" href="/sell">SELL</a>
    </nav>

    <a class="brand" href="/" aria-label="Home">
      <span class="brand__mark">MR</span>
    </a>

    <nav class="topbar__nav topbar__nav--right" aria-label="Primary right">
      <a class="navlink <?= $activePage === 'blog' ? 'is-active' : '' ?>" href="/blog.php">BLOG</a>
      <a class="navlink <?= $activePage === 'contact' ? 'is-active' : '' ?>" href="/contact.php">CONTACT</a>

      <button class="navtoggle" type="button"
        aria-label="Open menu"
        aria-expanded="false"
        aria-controls="mobileMenu">
        <span class="navtoggle__bar"></span>
        <span class="navtoggle__bar"></span>
        <span class="navtoggle__bar"></span>
      </button>
    </nav>

  </div>

  <div id="mobileMenu" class="mobilemenu" hidden>
    <a href="/about.php">ABOUT</a>
    <a href="/buy.php">BUY</a>
    <a href="/sell.php">SELL</a>
    <a href="/blog.php">BLOG</a>
    <a href="/contact.php">CONTACT</a>
  </div>
</header>

<!-- Hero section -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__overlay" aria-hidden="true"></div>

  <div class="hero__inner">
    <div class="hero__content">
      <h1 class="hero__title">
        MICHELE RUEFF<br>
        <span class="hero__subtitle">&amp; ASSOCIATES</span>
      </h1>

      <div class="hero__buttons">
        <a class="btn btn--ghost" href="/about">ABOUT</a>
        <a class="btn btn--ghost" href="/search">SEARCH HOMES</a>
      </div>
    </div>
  </div>
</section>

<script>
  (function () {
    const header = document.getElementById('siteHeader');
    const btn = document.querySelector('.navtoggle');
    const menu = document.getElementById('mobileMenu');

    // Safe guards (so it won't error on pages without the button/menu)
    if (btn && menu) {
      btn.addEventListener('click', function () {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', String(!expanded));
        if (menu.hasAttribute('hidden')) menu.removeAttribute('hidden');
        else menu.setAttribute('hidden', '');
      });
    }

    // Sticky header "scrolled" state
    if (header) {
      const setScrolled = () => {
        if (window.scrollY > 30) header.classList.add('is-scrolled');
        else header.classList.remove('is-scrolled');
      };
      setScrolled();
      window.addEventListener('scroll', setScrolled, { passive: true });
    }
  })();
</script>
