<?php
// -------------------------------------------------
// Blog Post Page Template:
// Renders a single blog post by slug.
// Slug is passed via $_GET['slug'] from the router.
// -------------------------------------------------

require ROOT_PATH . "/pages/partials/head.php";

// Load all posts and find the one matching the slug
$allPosts = json_decode(file_get_contents(ROOT_PATH . "/data/blog.json"), true) ?? [];
$slug     = $_GET["slug"] ?? "";

$post = null;
foreach ($allPosts as $p) {
  if (($p["slug"] ?? "") === $slug && !empty($p["published"])) {
    $post = $p;
    break;
  }
}

// If not found, 404
if (!$post) {
  http_response_code(404);
  echo "404 — Post not found.";
  exit;
}

// Page meta (set before head.php runs — head.php already included above,
// so these are used in the <title> only if head.php reads them post-require;
// the title below in the hero is the canonical display title).
$pageTitle  = htmlspecialchars($post["title"]);
$activePage = "blog";

$title         = htmlspecialchars($post["title"]);
$category      = htmlspecialchars($post["category"] ?? "");
$author        = htmlspecialchars($post["author"] ?? "Michele Rueff");
$date          = htmlspecialchars($post["date"] ?? "");
$image         = htmlspecialchars($post["image"] ?? "");
$dateFormatted = $date ? date("F j, Y", strtotime($date)) : "";

// Body: split on double newline into paragraphs
$rawBody    = $post["body"] ?? "";
$paragraphs = array_filter(array_map('trim', explode("\n\n", $rawBody)));

require ROOT_PATH . "/pages/partials/header.php";
?>

<main>

  <!-- =====================================================
    Hero (compact) — Post title + meta
  ===================================================== -->
  <section class="hero hero--compact">
    <?php if ($image): ?>
      <div class="hero__bg" aria-hidden="true" style="background-image: url('<?= $image ?>');"></div>
    <?php else: ?>
      <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <?php endif; ?>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="hero__inner">
      <div class="hero__content">
        <?php if ($category): ?>
          <p class="post-hero__category"><?= $category ?></p>
        <?php endif; ?>
        <h1 class="hero__title post-hero__title"><?= $title ?></h1>
        <p class="hero__tagline"><?= $author ?> &nbsp;·&nbsp; <?= $dateFormatted ?></p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Post Body
  ===================================================== -->
  <section class="post-body">
    <div class="post-body__inner">

      <!-- Back link -->
      <a class="post-body__back" href="/blog">← Back to Blog</a>

      <!-- Article content -->
      <article class="post-body__article">
        <?php foreach ($paragraphs as $para): ?>
          <p><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
      </article>

      <!-- Post footer -->
      <div class="post-body__footer">
        <span class="post-body__author">Written by <?= $author ?></span>
        <a class="post-body__back-link" href="/blog">← All Posts</a>
      </div>

    </div>
  </section>

  <!-- Call to Action Partial -->
  <?php
    $cta = [
      "title"       => "READY TO MAKE A MOVE?",
      "buttonText"  => "CONTACT MICHELE",
      "buttonHref"  => "/contact",
      "bgImage"     => "/assets/img/cta-work-with-us.jpg",
      "bgAlt"       => "Luxury living room",
      "overlay"     => 0.50,
    ];
    require ROOT_PATH . "/pages/partials/cta.php";
  ?>

</main>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
