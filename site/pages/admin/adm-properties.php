<?php
// -------------------------------------------------
// Admin — Properties Manager
// CRUD for property listings stored in data/properties.json
// -------------------------------------------------

require __DIR__ . "/../../includes/data.php";

$file       = __DIR__ . "/../../data/properties.json";
$properties = readJson($file);

// --------------------
// HANDLE ADD / UPDATE
// --------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? null;

    $existingImage = "";
    if ($id) {
        foreach ($properties as $item) {
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

    $newItem = [
        "id"          => $id ? (int)$id : time(),
        "title"       => trim($_POST["title"]       ?? ""),
        "address"     => trim($_POST["address"]     ?? ""),
        "city"        => trim($_POST["city"]        ?? ""),
        "description" => trim($_POST["description"] ?? ""),
        "price"       => (int)($_POST["price"]      ?? 0),
        "beds"        => (int)($_POST["beds"]       ?? 0),
        "baths"       => (int)($_POST["baths"]      ?? 0),
        "sqft"        => (int)($_POST["sqft"]       ?? 0),
        "image"       => $uploadedPath,
        "featured"    => isset($_POST["featured"]) && !isset($_POST["sold"]),
        "sold"        => isset($_POST["sold"]),
    ];

    if ($id) {
        foreach ($properties as &$item) {
            if ($item["id"] == $id) { $item = $newItem; break; }
        }
        unset($item);
    } else {
        $properties[] = $newItem;
    }

    writeJson($file, $properties);
    header("Location: /admin/properties");
    exit;
}

// --------------------
// HANDLE DELETE
// --------------------
if (isset($_GET["delete"])) {
    $id         = (int)$_GET["delete"];
    $properties = array_values(array_filter($properties, fn($p) => $p["id"] != $id));
    writeJson($file, $properties);
    header("Location: /admin/properties");
    exit;
}

// --------------------
// HANDLE EDIT LOAD
// --------------------
$editItem = null;
if (isset($_GET["edit"])) {
    $id = (int)$_GET["edit"];
    foreach ($properties as $item) {
        if ($item["id"] == $id) { $editItem = $item; break; }
    }
}

// Stats for the header
$total    = count($properties);
$active   = count(array_filter($properties, fn($p) => empty($p["sold"])));
$sold     = count(array_filter($properties, fn($p) => !empty($p["sold"])));
$featured = count(array_filter($properties, fn($p) => !empty($p["featured"])));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Properties Manager</title>
    <link rel="stylesheet" href="/pages/admin/admin.css">
</head>
<body>
<div class="admin-app">

    <!-- ── Header ── -->
    <header class="admin-header">
        <div class="admin-header__left">
            <a class="admin-header__back" href="/admin">← Dashboard</a>
            <h1 class="admin-header__title">Properties Manager</h1>
        </div>
    </header>

    <main class="admin-main">

        <!-- ── Stats row ── -->
        <div class="admin-stats">
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $total ?></span>
                <span class="admin-stat__label">Total</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $active ?></span>
                <span class="admin-stat__label">Active</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $featured ?></span>
                <span class="admin-stat__label">Featured</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $sold ?></span>
                <span class="admin-stat__label">Sold</span>
            </div>
        </div>

        <!-- ── Add / Edit Form ── -->
        <div class="admin-form-card">
            <h2 class="admin-form-card__title">
                <?= $editItem ? "✏️ Edit Listing" : "＋ Add New Listing" ?>
            </h2>

            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editItem["id"] ?? "") ?>">

                <div class="admin-form-grid">

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Property Title</label>
                        <input class="admin-form-group__input" name="title" placeholder="e.g. Lakefront Home in Clermont"
                            value="<?= htmlspecialchars($editItem["title"] ?? "") ?>" required>
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">City</label>
                        <input class="admin-form-group__input" name="city" placeholder="e.g. Clermont"
                            value="<?= htmlspecialchars($editItem["city"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Street Address</label>
                        <input class="admin-form-group__input" name="address" placeholder="e.g. 123 Lake Shore Dr"
                            value="<?= htmlspecialchars($editItem["address"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Price ($)</label>
                        <input class="admin-form-group__input" name="price" type="number" placeholder="e.g. 450000"
                            value="<?= htmlspecialchars($editItem["price"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Square Feet</label>
                        <input class="admin-form-group__input" name="sqft" type="number" placeholder="e.g. 2400"
                            value="<?= htmlspecialchars($editItem["sqft"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Bedrooms</label>
                        <input class="admin-form-group__input" name="beds" type="number" min="0" placeholder="e.g. 4"
                            value="<?= htmlspecialchars($editItem["beds"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group">
                        <label class="admin-form-group__label">Bathrooms</label>
                        <input class="admin-form-group__input" name="baths" type="number" min="0" step="0.5" placeholder="e.g. 3"
                            value="<?= htmlspecialchars($editItem["baths"] ?? "") ?>">
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Description</label>
                        <textarea class="admin-form-group__input admin-form-group__input--textarea" name="description"
                            rows="4" placeholder="Brief description of the property..."><?= htmlspecialchars($editItem["description"] ?? "") ?></textarea>
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Property Image</label>
                        <div class="admin-upload-zone" id="uploadZone">
                            <input type="file" name="imageFile" accept="image/*" id="imageFile"
                                onchange="document.getElementById('uploadFilename').textContent = this.files[0]?.name ?? ''">
                            <p class="admin-upload-zone__hint">Click to upload or drag &amp; drop an image</p>
                            <p class="admin-upload-zone__filename" id="uploadFilename">
                                <?= !empty($editItem["image"]) ? basename($editItem["image"]) : "" ?>
                            </p>
                        </div>
                        <?php if (!empty($editItem["image"])): ?>
                            <img src="<?= htmlspecialchars($editItem["image"]) ?>"
                                alt="Current image" style="margin-top:10px; max-width:200px; border-radius:8px; display:block;">
                        <?php endif; ?>
                    </div>

                    <div class="admin-form-group admin-form-group--full">
                        <label class="admin-form-group__label">Status</label>
                        <div style="display:flex; gap:24px; margin-top:4px;">
                            <label style="display:flex; align-items:center; gap:8px; font-size:0.92rem; cursor:pointer;">
                                <input type="checkbox" name="featured"
                                    <?= !empty($editItem["featured"]) ? "checked" : "" ?>>
                                Mark as Featured
                            </label>
                            <label style="display:flex; align-items:center; gap:8px; font-size:0.92rem; cursor:pointer;">
                                <input type="checkbox" name="sold"
                                    <?= !empty($editItem["sold"]) ? "checked" : "" ?>>
                                Mark as Sold
                            </label>
                        </div>
                        <p class="admin-form-group__hint" style="margin-top:6px;">Featured is automatically removed when marked as Sold.</p>
                    </div>

                </div><!-- /.admin-form-grid -->

                <div class="admin-form-actions">
                    <button class="admin-btn admin-btn--save" type="submit">
                        <?= $editItem ? "Save Changes" : "Add Listing" ?>
                    </button>
                    <?php if ($editItem): ?>
                        <a class="admin-btn admin-btn--cancel" href="/admin/properties">Cancel</a>
                    <?php endif; ?>
                </div>

            </form>
        </div><!-- /.admin-form-card -->

        <!-- ── Listings Table ── -->
        <div class="admin-table-card">
            <div class="admin-table-card__header">
                <h2 class="admin-table-card__title">All Listings</h2>
                <span class="admin-table-card__count"><?= $total ?> total</span>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Property</th>
                            <th>Price</th>
                            <th>Specs</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($properties)): ?>
                            <tr><td colspan="6" class="admin-table__empty">No listings yet. Add one above.</td></tr>
                        <?php endif; ?>

                        <?php foreach ($properties as $item): ?>
                            <tr>
                                <!-- Thumbnail -->
                                <td>
                                    <?php if (!empty($item["image"])): ?>
                                        <div class="admin-table__thumb"
                                            style="background-image: url('<?= htmlspecialchars($item["image"]) ?>');"></div>
                                    <?php else: ?>
                                        <div class="admin-table__thumb" style="background:#eee;"></div>
                                    <?php endif; ?>
                                </td>

                                <!-- Title + Address -->
                                <td>
                                    <div class="admin-table__title-cell"><?= htmlspecialchars($item["title"]) ?></div>
                                    <div class="admin-table__date">
                                        <?= htmlspecialchars($item["address"] ?? "") ?>
                                        <?php if (!empty($item["city"])): ?>
                                            <?= !empty($item["address"]) ? ", " : "" ?><?= htmlspecialchars($item["city"]) ?>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td>
                                    <?php if (!empty($item["price"])): ?>
                                        $<?= number_format($item["price"]) ?>
                                    <?php else: ?>
                                        <span style="color:#ccc">—</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Specs -->
                                <td class="admin-table__date">
                                    <?= $item["beds"] ?? 0 ?> bd
                                    &nbsp;·&nbsp;
                                    <?= $item["baths"] ?? 0 ?> ba
                                    <?php if (!empty($item["sqft"])): ?>
                                        &nbsp;·&nbsp; <?= number_format($item["sqft"]) ?> sqft
                                    <?php endif; ?>
                                </td>

                                <!-- Status badges -->
                                <td>
                                    <?php if (!empty($item["sold"])): ?>
                                        <span class="admin-table__badge" style="background:#ffeaea; color:#c0392b;">Sold</span>
                                    <?php elseif (!empty($item["featured"])): ?>
                                        <span class="admin-table__badge" style="background:#e8f5e9; color:#1e7e34;">Featured</span>
                                    <?php else: ?>
                                        <span class="admin-table__badge">Active</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="admin-table__actions">
                                        <a class="admin-btn admin-btn--edit"
                                            href="/admin/properties?edit=<?= (int)$item["id"] ?>">Edit</a>
                                        <a class="admin-btn admin-btn--delete"
                                            href="/admin/properties?delete=<?= (int)$item["id"] ?>"
                                            onclick="return confirm('Delete \'<?= htmlspecialchars(addslashes($item["title"])) ?>\'?')">Delete</a>
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
