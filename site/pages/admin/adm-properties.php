<?php
require __DIR__ . "/../../includes/auth.php";
requireAdmin();

require __DIR__ . "/../../includes/data.php";

$file = __DIR__ . "/../../data/properties.json";
$properties = readJson($file);

// --------------------
// HANDLE ADD / UPDATE
// --------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? null;

    // Get existing image if editing
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

    // HANDLE FILE UPLOAD
    if (!empty($_FILES["imageFile"]["name"])) {

        $uploadDir = __DIR__ . "/../../assets/uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "", $_FILES["imageFile"]["name"]);
        $targetPath = $uploadDir . $filename;

        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetPath)) {
            $uploadedPath = "/assets/uploads/" . $filename;
        }
    }

    // BUILD OBJECT
    $newItem = [
        "id" => $id ? (int)$id : time(),

        "title" => trim($_POST["title"] ?? ""),
        "city" => trim($_POST["city"] ?? ""),
        "description" => trim($_POST["description"] ?? ""),

        "price" => (int)($_POST["price"] ?? 0),
        "beds" => (int)($_POST["beds"] ?? 0),
        "baths" => (int)($_POST["baths"] ?? 0),
        "sqft" => (int)($_POST["sqft"] ?? 0),

        "image" => $uploadedPath,

        // Prevent featured if sold
        "featured" => isset($_POST["featured"]) && !isset($_POST["sold"]),
        "sold" => isset($_POST["sold"]),
    ];

    // EDIT
    if ($id) {
        foreach ($properties as &$item) {
            if ($item["id"] == $id) {
                $item = $newItem;
                break;
            }
        }
        unset($item);
    } 
    // ADD
    else {
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
    $id = (int)$_GET["delete"];

    $properties = array_filter($properties, fn($item) => $item["id"] != $id);

    writeJson($file, array_values($properties));

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
        if ($item["id"] == $id) {
            $editItem = $item;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <button type="button" onclick="window.location='/admin'">Return to Admin Panel</button>
    <title>Manage properties</title>
    <link rel="stylesheet" href="/admin.css">
</head>
<body>
    <div class = "admin-container"> 
        <h1>Manage properties</h1>

        <div class="card">
            <h2><?= $editItem ? "Edit Listing" : "Add Listing" ?></h2>

            <form method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= htmlspecialchars($editItem["id"] ?? "") ?>">

                <input name="title" placeholder="Title"
                    value="<?= htmlspecialchars($editItem["title"] ?? "") ?>">

                <input name="address" placeholder="Address"
                    value="<?= htmlspecialchars($editItem["address"] ?? "") ?>">

                <input name="city" placeholder="City"
                    value="<?= htmlspecialchars($editItem["city"] ?? "") ?>">

                <textarea name="description" placeholder="Description" rows="4"><?= htmlspecialchars($editItem["description"] ?? "") ?></textarea>

                <input name="price" type="number" placeholder="Price"
                    value="<?= htmlspecialchars($editItem["price"] ?? "") ?>">

                <input name="beds" type="number" placeholder="Beds"
                    value="<?= htmlspecialchars($editItem["beds"] ?? "") ?>">

                <input name="baths" type="number" placeholder="Baths"
                    value="<?= htmlspecialchars($editItem["baths"] ?? "") ?>">

                <input name="sqft" type="number" placeholder="Square Feet"
                    value="<?= htmlspecialchars($editItem["sqft"] ?? "") ?>">

                <label>Upload Image:</label>
                <input type="file" name="imageFile" accept="image/*">

                <?php if (!empty($editItem["image"])): ?>
                    <img src="<?= htmlspecialchars($editItem["image"]) ?>" style="max-width:200px;">
                <?php endif; ?>

                <div class="form-row">
                    <label>
                        <input type="checkbox" name="featured"
                        <?= !empty($editItem["featured"]) ? "checked" : "" ?>>
                        Featured
                    </label>

                    <label>
                        <input type="checkbox" name="sold"
                        <?= !empty($editItem["sold"]) ? "checked" : "" ?>>
                        Sold
                    </label>
                </div>

                <button type="submit">
                    <?= $editItem ? "Update Listing" : "Add Listing" ?>
                </button>

                <button type="button" onclick="window.location='/admin/properties'">Cancel</button>
            </form>
        </div>
 

        <hr>

        <div class="card">
            <h2>All Properties</h2>

            <?php if (empty($properties)): ?>
            <p>No properties yet.</p>
            <?php endif; ?>

            <?php foreach ($properties as $item): ?>
                <div class="listing">

                    <img src="<?= htmlspecialchars($item["image"]) ?>" alt="">

                    <div class="listing-details">
                        <div class="listing-title">
                            <?= htmlspecialchars($item["title"]) ?>
                        </div>

                        <?= htmlspecialchars($item["address"] ?? "") ?>, <?= htmlspecialchars($item["city"]) ?><br>

                        $<?= number_format($item["price"]) ?><br>

                        <?= $item["beds"] ?> Bed | <?= $item["baths"] ?> Bath | <?= $item["sqft"] ?> sqft<br>

                        <div class="badges">
                            <?php if (!empty($item["featured"])): ?>
                                <span class="badge-featured">FEATURED</span>
                            <?php endif; ?>

                            <?php if (!empty($item["sold"])): ?>
                                <span class="badge-sold">SOLD</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="actions">
                        <a href="/admin/properties?edit=<?= $item["id"] ?>">Edit</a>
                        <a href="/admin/properties?delete=<?= $item["id"] ?>"
                        onclick="return confirm('Delete this listing?')">Delete</a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
</body>
</html>