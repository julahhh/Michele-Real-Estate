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
      <img
        src="/assets/img/brand-logo.png"
        alt="Michele Rueff & Associates"
        class="brand__img"
      >
    </a>

    <nav class="topbar__nav topbar__nav--right" aria-label="Primary right">
      <a class="navlink <?= $activePage === 'blog' ? 'is-active' : '' ?>" href="/blog">BLOG</a>
      <a class="navlink <?= $activePage === 'contact' ? 'is-active' : '' ?>" href="/contact">CONTACT</a>

      <button
        class="navtoggle"
        type="button"
        aria-label="Open menu"
        aria-expanded="false"
        aria-controls="mobileMenu"
      >
        <span class="navtoggle__bar"></span>
        <span class="navtoggle__bar"></span>
        <span class="navtoggle__bar"></span>
      </button>
    </nav>

  </div>

  <div id="mobileMenu" class="mobilemenu" hidden>
    <a href="/about">ABOUT</a>
    <a href="/buy">BUY</a>
    <a href="/sell">SELL</a>
    <a href="/blog">BLOG</a>
    <a href="/contact">CONTACT</a>
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

    // Header scroll state
    if (header) {
      const setScrolled = () => {
        if (window.scrollY > 30) header.classList.add('is-scrolled');
        else header.classList.remove('is-scrolled');
      };
      setScrolled();
      window.addEventListener('scroll', setScrolled, { passive: true });
    }

    // Mobile menu
    if (!btn || !menu) return;

    const closeMenu = () => {
      btn.setAttribute('aria-expanded', 'false');
      menu.setAttribute('hidden', '');
    };

    const openMenu = () => {
      btn.setAttribute('aria-expanded', 'true');
      menu.removeAttribute('hidden');
    };

    btn.addEventListener('click', () => {
      const isOpen = btn.getAttribute('aria-expanded') === 'true';
      if (isOpen) closeMenu();
      else openMenu();
    });

    // Close when a menu link is clicked
    menu.addEventListener('click', (e) => {
      if (e.target && e.target.tagName === 'A') closeMenu();
    });

    // Close on ESC
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMenu();
    });

    // Close when resizing to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth > 860) closeMenu();
    });

    // Ensure it starts closed on load
    closeMenu();
  })();
</script>
