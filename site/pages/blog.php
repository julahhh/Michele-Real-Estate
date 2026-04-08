<?php
// -------------------------------------------------
// Blog Page Template:
// Displays all published blog posts as a card grid.
// Posts are loaded from data/blog.json.
// -------------------------------------------------

$pageTitle  = "Blog";
$activePage = "blog";

require ROOT_PATH . "/pages/partials/head.php";
require ROOT_PATH . "/pages/partials/header.php";

// Load and filter to published posts only, newest first
$allPosts = json_decode(file_get_contents(ROOT_PATH . "/data/blog.json"), true) ?? [];
$posts    = array_filter($allPosts, fn($p) => !empty($p["published"]));
usort($posts, fn($a, $b) => strcmp($b["date"], $a["date"]));
?>

<main>

  <!-- =====================================================
    Hero Section (compact)
  ===================================================== -->
  <section class="hero hero--compact">
    <div class="hero__bg" aria-hidden="true" style="background-image: url('/assets/img/hero.jpg');"></div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__inner">
      <div class="hero__content">
        <h1 class="hero__title">THE BLOG</h1>
        <p class="hero__tagline">Real estate insights, market updates, and expert advice from Michele.</p>
      </div>
    </div>
  </section>

  <!-- =====================================================
    Blog Post Grid
  ===================================================== -->
  <section class="blog-grid">
    <div class="blog-grid__inner">

      <?php if (empty($posts)): ?>
        <p class="blog-grid__empty">No posts yet — check back soon.</p>

      <?php else: ?>
        <div class="blog-grid__cards">
          <?php foreach ($posts as $post):
            $slug     = htmlspecialchars($post["slug"] ?? "#");
            $title    = htmlspecialchars($post["title"] ?? "");
            $excerpt  = htmlspecialchars($post["excerpt"] ?? "");
            $category = htmlspecialchars($post["category"] ?? "");
            $date     = htmlspecialchars($post["date"] ?? "");
            $image    = htmlspecialchars($post["image"] ?? "");
            $imageAlt = htmlspecialchars($post["title"] ?? "Blog post image");
            $dateFormatted = $date ? date("F j, Y", strtotime($date)) : "";
          ?>

            <a class="blog-card" href="/blog/<?= $slug ?>">

              <!-- Post image -->
              <div class="blog-card__media">
                <?php if ($image): ?>
                  <img class="blog-card__img" src="<?= $image ?>" alt="<?= $imageAlt ?>">
                <?php endif; ?>
              </div>

              <!-- Post meta -->
              <div class="blog-card__body">
                <?php if ($category): ?>
                  <span class="blog-card__category"><?= $category ?></span>
                <?php endif; ?>
                <h2 class="blog-card__title"><?= $title ?></h2>
                <p class="blog-card__excerpt"><?= $excerpt ?></p>
                <div class="blog-card__footer">
                  <span class="blog-card__date"><?= $dateFormatted ?></span>
                  <span class="blog-card__read">Read More →</span>
                </div>
              </div>

            </a>

          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <!-- Call to Action Partial -->
  <?php require ROOT_PATH . "/pages/partials/cta.php"; ?>

</main>

<?php require ROOT_PATH . "/pages/partials/footer.php"; ?>
