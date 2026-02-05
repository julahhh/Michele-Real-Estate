<?php
/* =====================================================
Header + Hero Template Partial
- Renders the main site header/navigation and homepage
  hero section.
- Designed as a reusable partial and is included at the 
  top of most site pages.
===================================================== */


  // Active navigation state
  // Each page sets $activePage so the correct nav link gets the "is-active" highlight class.
  // Possible values: about, buy, sell, blog, contact, home
  if (!isset($activePage)) $activePage = "";
?>

<!-- =====================================================
  Sticky Header / Navigation
  - Fixed header overlays hero image
  - Desktop nav left/right with centered logo
  - Mobile hamburger menu included
===================================================== -->
<header class="site-header" id="siteHeader">
  <div class="header-inner">

    <!-- Left-aligned nav links -->
    <nav class="topbar__nav topbar__nav--left" aria-label="Primary left">
      <a class="navlink <?= $activePage === 'about' ? 'is-active' : '' ?>" href="/about">ABOUT</a>
      <a class="navlink <?= $activePage === 'buy' ? 'is-active' : '' ?>" href="/buy">BUY</a>
      <a class="navlink <?= $activePage === 'sell' ? 'is-active' : '' ?>" href="/sell">SELL</a>
    </nav>

    <!-- Centered brand logo / home link-->
    <a class="brand" href="/" aria-label="Home">
      <img
        src="/assets/img/brand-logo.png"
        alt="Michele Rueff & Associates"
        class="brand__img"
      >
    </a>

    <!-- Right-aligned nav links + mobile menu button -->
    <nav class="topbar__nav topbar__nav--right" aria-label="Primary right">
      <a class="navlink <?= $activePage === 'blog' ? 'is-active' : '' ?>" href="/blog">BLOG</a>
      <a class="navlink <?= $activePage === 'contact' ? 'is-active' : '' ?>" href="/contact">CONTACT</a>

      <!-- Hamburger button for mobile navigation -->
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

  <!-- Mobile navigation menu (hidden by default) -->
  <div id="mobileMenu" class="mobilemenu" hidden>
    <a href="/about">ABOUT</a>
    <a href="/buy">BUY</a>
    <a href="/sell">SELL</a>
    <a href="/blog">BLOG</a>
    <a href="/contact">CONTACT</a>
  </div>

</header>


<!-- =====================================================
  Hero Section
  - Background image + overlay handled in CSS
  - Title branding + CTA buttons
===================================================== -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__overlay" aria-hidden="true"></div>

  <div class="hero__inner">
    <div class="hero__content">

      <!-- Main title / branding -->
      <h1 class="hero__title">
        MICHELE RUEFF<br>
        <span class="hero__subtitle">&amp; ASSOCIATES</span>
      </h1>

      <!-- Hero call to action buttons -->
      <div class="hero__buttons">
        <a class="btn btn--ghost" href="/about">ABOUT</a>
        <a class="btn btn--ghost" href="/search">SEARCH HOMES</a>
      </div>

    </div>
  </div>
</section>

<script>
   /* =====================================================
  Header + Navigation Behavior Script
  Handles:
  • Sticky header style change on scroll
  • Mobile hamburger menu open/close
  • Closing menu on: link click, Escape key, resize desktop
  ===================================================== */
  (function () {
    const header = document.getElementById('siteHeader');
    const btn = document.querySelector('.navtoggle');
    const menu = document.getElementById('mobileMenu');

    // Header scroll behavior
    // Add/remove "is-scrolled" class based on scroll position
    if (header) {
      const setScrolled = () => {
        if (window.scrollY > 30) header.classList.add('is-scrolled');
        else header.classList.remove('is-scrolled');
      };
      setScrolled();
      window.addEventListener('scroll', setScrolled, { passive: true });
    }

    // Mobile menu toggle
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

    // Close when resizing desktop width
    window.addEventListener('resize', () => {
      if (window.innerWidth > 860) closeMenu();
    });

    // Ensure menu is closed on initial load
    closeMenu();
  })();
</script>