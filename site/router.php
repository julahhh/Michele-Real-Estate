<?php
// -------------------------------------------------
// Simple PHP router for clean URLs
// To run: php -S localhost:8000 -t site site/router.php
// -------------------------------------------------

// Extract only the URL path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// remove trailing slash [ /contact/ → /contact ]
if ($path !== "/" && str_ends_with($path, "/")) {
  $path = rtrim($path, "/");
}

// Define application routes
// Keys = clean URLs , Values = actual PHP files inside /site
$routes = [
  "/" => "/index.php",
  "/about" => "/about.php",
  "/buy" => "/buy.php",
  "/sell" => "/sell.php",
  "/blog" => "/blog.php",
  "/contact" => "/contact.php",
];

// If the requested path matches a defined route, load the corresponding PHP file and stop execution
if (isset($routes[$path])) {
  require __DIR__ . $routes[$path];
  exit;
}

// Allow direct access to real files (CSS, JS, images)
// Returning false hands control back to PHP’s server
$file = __DIR__ . $path;
if ($path !== "/" && file_exists($file) && !is_dir($file)) {
  return false;
}

// If nothing matched, return a 404 response
http_response_code(404);
echo "404 Not Found";