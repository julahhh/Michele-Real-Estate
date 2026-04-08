<?php
// -------------------------------------------------
// Admin — Blog Manager
// CRUD for blog posts stored in data/blog.json
// -------------------------------------------------

require __DIR__ . "/../../includes/data.php";

$file  = __DIR__ . "/../../data/blog.json";
$posts = readJson($file);

// --------------------
// HANDLE ADD / UPDATE
// --------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? null;

    $existingImage = "";
    if ($id) {
        foreach ($posts as $item) {
            if ($item["id"] == $id) {
                $existingImage = $item["image"] ?? "";
                break;
            }
        }
    }

    $uploadedPath = $existingImage;

    if (!empty($_FILES["imageFile"]["name"])) {
        $uploadDir = __DIR__ . "/../../assets/uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $filename   = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "", $_FILES["imageFile"]["name"]);
        $targetPath = $uploadDir . $filename;

        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetPath)) {
            $uploadedPath = "/assets/uploads/" . $filename;
        }
    }

    // Sanitize slug
    $slug = strtolower(trim($_POST["slug"] ?? ""));
    $slug = preg_replace("/[^a-z0-9-]/", "-", $slug);
    $slug = trim(preg_replace("/-+/", "-", $slug), "-");

    $newPost = [
        "id"        => $id ? (int)$id : time(),
        "slug"      => $slug,
        "title"     => trim($_POST["title"]    ?? ""),
        "excerpt"   => trim($_POST["excerpt"]  ?? ""),
        "body"      => trim($_POST["body"]     ?? ""),
        "image"     => $uploadedPath,
        "category"  => trim($_POST["category"] ?? ""),
        "date"      => trim($_POST["date"]     ?? date("Y-m-d")),
        "author"    => trim($_POST["author"]   ?? "Michele Rueff"),
        "published" => isset($_POST["published"]),
    ];

    if ($id) {
        foreach ($posts as &$item) {
            if ($item["id"] == $id) { $item = $newPost; break; }
        }
        unset($item);
    } else {
        $posts[] = $newPost;
    }

    writeJson($file, array_values($posts));
    header("Location: /admin/blog");
    exit;
}

// --------------------
// HANDLE DELETE
// --------------------
if (isset($_GET["delete"])) {
    $id    = (int)$_GET["delete"];
    $posts = array_values(array_filter($posts, fn($p) => $p["id"] != $id));
    writeJson($file, $posts);
    header("Location: /admin/blog");
    exit;
}

// --------------------
// HANDLE EDIT LOAD
// --------------------
$editPost = null;
if (isset($_GET["edit"])) {
    $id = (int)$_GET["edit"];
    foreach ($posts as $p) {
        if ($p["id"] == $id) { $editPost = $p; break; }
    }
}

// Sort newest first for display
$displayPosts = $posts;
usort($displayPosts, fn($a, $b) => strcmp($b["date"], $a["date"]));

$total     = count($posts);
$published = count(array_filter($posts, fn($p) => !empty($p["published"])));
$drafts    = $total - $published;

$categories = ["Buying Tips", "Selling Tips", "Market Update", "Investment", "Home Tips", "Community"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Blog Manager</title>
    <link rel="stylesheet" href="/pages/admin/admin.css">
</head>
<body>
<div class="admin-app">

    <!-- ── Header ── -->
    <header class="admin-header">
        <div class="admin-header__left">
            <a class="admin-header__back" href="/admin">← Dashboard</a>
            <h1 class="admin-header__title">Blog Manager</h1>
        </div>
    </header>

    <main class="admin-main">

        <!-- ── Stats row ── -->
        <div class="admin-stats">
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $total ?></span>
                <span class="admin-stat__label">Total Posts</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $published ?></span>
                <span class="admin-stat__label">Published</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $drafts ?></span>
                <span class="admin-stat__label">Drafts</span>
            </div>
        </div>

        <!-- ── Add / Edit Form ── -->
        <div class="admin-form-card">
            <h2 class="admin-form-card__title">
                <?= $editPost ? "✏️ Edit Post" : "＋ New Blog Post" ?>
            </h2>

            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editPost["id"] ?? "") ?>">

                <div class="admin-form-grid">

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Post Title</label>
                        <input class="admin-form-group__input" name="title" required
                            placeholder="e.g. 5 Things to Know Before Buying in Clermont"
                            value="<?= htmlspecialchars($editPost["title"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">URL Slug</label>
                        <input class="admin-form-group__input" name="slug" required
                            placeholder="e.g. buying-tips-clermont"
                            value="<?= htmlspecialchars($editPost["slug"] ?? "") ?>">
                        <span class="admin-form-group__hint">Lowercase letters, numbers, and hyphens only. Used in the page URL.</span>
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Category</label>
                        <select class="admin-form-group__input" name="category">
                            <option value="">— Select a category —</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat) ?>"
                                    <?= ($editPost["category"] ?? "") === $cat ? "selected" : "" ?>>
                                    <?= htmlspecialchars($cat) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Excerpt</label>
                        <textarea class="admin-form-group__input admin-form-group__input--textarea"
                            name="excerpt" rows="3"
                            placeholder="1–2 sentence summary shown on the blog listing page..."><?= htmlspecialchars($editPost["excerpt"] ?? "") ?></textarea>
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Post Body</label>
                        <textarea class="admin-form-group__input admin-form-group__input--textarea"
                            name="body" rows="12"
                            placeholder="Write your full post here. Separate paragraphs with a blank line."><?= htmlspecialchars($editPost["body"] ?? "") ?></textarea>
                        <span class="admin-form-group__hint">Separate paragraphs by leaving a blank line between them.</span>
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Publish Date</label>
                        <input class="admin-form-group__input" name="date" type="date"
                            value="<?= htmlspecialchars($editPost["date"] ?? date("Y-m-d")) ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Author</label>
                        <input class="admin-form-group__input" name="author"
                            placeholder="Author name"
                            value="<?= htmlspecialchars($editPost["author"] ?? "Michele Rueff") ?>">
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Featured Image</label>
                        <div class="admin-upload-zone">
                            <input type="file" name="imageFile" accept="image/*"
                                onchange="document.getElementById('blogFilename').textContent = this.files[0]?.name ?? ''">
                            <p class="admin-upload-zone__hint">Click to upload or drag &amp; drop an image</p>
                            <p class="admin-upload-zone__filename" id="blogFilename">
                                <?= !empty($editPost["image"]) ? basename($editPost["image"]) : "" ?>
                            </p>
                        </div>
                        <?php if (!empty($editPost["image"])): ?>
                            <img src="<?= htmlspecialchars($editPost["image"]) ?>"
                                alt="Current image" style="margin-top:10px; max-width:200px; border-radius:8px; display:block;">
                        <?php endif; ?>
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label style="display:flex; align-items:center; gap:10px; font-size:0.92rem; cursor:pointer;">
                            <input type="checkbox" name="published"
                                <?= !empty($editPost["published"]) ? "checked" : "" ?>>
                            <span><strong>Published</strong> — visible to visitors on the site</span>
                        </label>
                        <span class="admin-form-group__hint" style="margin-top:4px;">Uncheck to save as a draft without publishing.</span>
                    </div>

                </div><!-- /.admin-form-grid -->

                <div class="admin-form-actions">
                    <button class="admin-btn admin-btn--save" type="submit">
                        <?= $editPost ? "Save Changes" : "Publish Post" ?>
                    </button>
                    <?php if ($editPost): ?>
                        <a class="admin-btn admin-btn--cancel" href="/admin/blog">Cancel</a>
                    <?php endif; ?>
                    <?php if ($editPost && !empty($editPost["published"]) && !empty($editPost["slug"])): ?>
                        <a class="admin-btn admin-btn--edit"
                            href="/blog/<?= htmlspecialchars($editPost["slug"]) ?>"
                            target="_blank" style="margin-left:auto;">View Live →</a>
                    <?php endif; ?>
                </div>

            </form>
        </div><!-- /.admin-form-card -->

        <!-- ── Posts Table ── -->
        <div class="admin-table-card">
            <div class="admin-table-card__header">
                <h2 class="admin-table-card__title">All Posts</h2>
                <span class="admin-table-card__count"><?= $total ?> total</span>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($displayPosts)): ?>
                            <tr><td colspan="6" class="admin-table__empty">No posts yet. Write your first one above.</td></tr>
                        <?php endif; ?>

                        <?php foreach ($displayPosts as $post): ?>
                            <tr>
                                <!-- Thumbnail -->
                                <td>
                                    <div class="admin-table__thumb"
                                        style="background-image: url('<?= htmlspecialchars($post["image"] ?? "") ?>'); background-color:#eee;"></div>
                                </td>

                                <!-- Title + slug -->
                                <td>
                                    <div class="admin-table__title-cell"><?= htmlspecialchars($post["title"]) ?></div>
                                    <div class="admin-table__date">/blog/<?= htmlspecialchars($post["slug"] ?? "") ?></div>
                                </td>

                                <!-- Category -->
                                <td>
                                    <?php if (!empty($post["category"])): ?>
                                        <span class="admin-table__badge"><?= htmlspecialchars($post["category"]) ?></span>
                                    <?php else: ?>
                                        <span style="color:#ccc">—</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Date -->
                                <td class="admin-table__date">
                                    <?= htmlspecialchars($post["date"] ?? "") ?>
                                </td>

                                <!-- Status -->
                                <td>
                                    <?php if (!empty($post["published"])): ?>
                                        <span class="admin-table__badge" style="background:#e8f5e9; color:#1e7e34;">Published</span>
                                    <?php else: ?>
                                        <span class="admin-table__badge" style="background:#fff3cd; color:#856404;">Draft</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="admin-table__actions">
                                        <a class="admin-btn admin-btn--edit"
                                            href="/admin/blog?edit=<?= (int)$post["id"] ?>">Edit</a>
                                        <?php if (!empty($post["published"])): ?>
                                            <a class="admin-table__link"
                                                href="/blog/<?= htmlspecialchars($post["slug"]) ?>"
                                                target="_blank">View</a>
                                        <?php endif; ?>
                                        <a class="admin-btn admin-btn--delete"
                                            href="/admin/blog?delete=<?= (int)$post["id"] ?>"
                                            onclick="return confirm('Delete \'<?= htmlspecialchars(addslashes($post["title"])) ?>\'?')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.admin-table-card -->

    </main>
</div><!-- /.admin-app -->
</body>
</html>
