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
  <style>
    body { font-family: Arial; padding: 20px; max-width: 900px; margin: auto; }
    input, textarea { display: block; margin: 8px 0; padding: 8px; width: 100%; }
    button { padding: 10px 16px; cursor: pointer; }
    .card { border: 1px solid #ccc; padding: 12px; margin-bottom: 10px; }
    .actions a { margin-right: 10px; }
    img { margin: 10px 0; display: block; }
  </style>
</head>
<body>

<h1>Manage properties</h1>

<h2><?= $editItem ? "Edit Property" : "Add Property" ?></h2>

<form method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= htmlspecialchars($editItem["id"] ?? "") ?>">

    <input name="title" placeholder="Title"
        value="<?= htmlspecialchars($editItem["title"] ?? "") ?>">

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

    <label>
        Upload Image:
        <input type="file" name="imageFile" accept="image/*">
    </label>

    <?php if (!empty($editItem["image"])): ?>
        <img src="<?= htmlspecialchars($editItem["image"]) ?>" style="max-width:200px;">
    <?php endif; ?>

    <br>

    <label>
        <input type="checkbox" name="featured"
        <?= !empty($editItem["featured"]) ? "checked" : "" ?>>
        Featured
    </label>

    <br>

    <label>
        <input type="checkbox" name="sold"
        <?= !empty($editItem["sold"]) ? "checked" : "" ?>>
        Sold
    </label>

    <br>

    <button type="submit">
        <?= $editItem ? "Update Property" : "Add Property" ?>
    </button>

    <button type="button" onclick="window.location='/admin/properties'">Cancel</button>

</form>

<hr>

<h2>All Properties</h2>

<?php if (empty($properties)): ?>
  <p>No properties yet.</p>
<?php endif; ?>

<?php foreach ($properties as $item): ?>
    <div class="card">
        <strong><?= htmlspecialchars($item["title"])?>, <?= htmlspecialchars($item["city"]) ?></strong><br>

        $<?= number_format($item["price"]) ?><br>

        <?= $item["beds"] ?> Bed | <?= $item["baths"] ?> Bath | <?= $item["sqft"] ?> sqft<br>

        <?php if (!empty($item["featured"])): ?>
            <span style="color:green;">FEATURED</span>
        <?php endif; ?>

        <?php if (!empty($item["sold"])): ?>
            <span style="color:red;">SOLD</span>
        <?php endif; ?>

        <div class="actions">
            <a href="/admin/properties?edit=<?= $item["id"] ?>">Edit</a>
            <a href="/admin/properties?delete=<?= $item["id"] ?>"
               onclick="return confirm('Delete this property?')">Delete</a>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>