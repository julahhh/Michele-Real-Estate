<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="/" aria-label="Home">
      <span class="brand-mark">MR</span>
    </a>

    <nav class="nav" aria-label="Primary">
      <a class="nav-link <?= ($activePage ?? '') === 'about' ? 'is-active' : '' ?>" href="/about.php">About</a>
      <a class="nav-link <?= ($activePage ?? '') === 'buy' ? 'is-active' : '' ?>" href="/buy.php">Buy</a>
      <a class="nav-link <?= ($activePage ?? '') === 'sell' ? 'is-active' : '' ?>" href="/sell.php">Sell</a>
      <a class="nav-link <?= ($activePage ?? '') === 'blog' ? 'is-active' : '' ?>" href="/blog.php">Blog</a>
      <a class="nav-link <?= ($activePage ?? '') === 'contact' ? 'is-active' : '' ?>" href="/contact.php">Contact</a>
      <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">☰</button>
    </nav>
  </div>
</header>
