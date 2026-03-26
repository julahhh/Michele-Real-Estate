<?php
// -------------------------------------------------
// Simple PHP router for clean URLs
// To run: php -S localhost:8000 -t site site/router.php
// -------------------------------------------------

// Define the root path of the application
define('ROOT_PATH', __DIR__);

// Extract only the URL path
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// remove trailing slash [ /contact/ → /contact ]
if ($path !== "/" && str_ends_with($path, "/")) {
  $path = rtrim($path, "/");
}

// Define application routes
// Keys = clean URLs , Values = actual PHP files inside /site
$routes = [
  "/" => "/pages/index.php",
  "/about" => "/pages/about.php",
  "/buy" => "/pages/buy.php",
  "/sell" => "/pages/sell.php",
  "/blog" => "/pages/blog.php",
  "/contact" => "/pages/contact.php",

  // Admin routes
  "/admin" => "/pages/admin/manage.php", 
  "/admin/login" => "/pages/admin/login.php",
  "/admin/logout" => "/pages/admin/logout.php",
  "/admin/properties" => "/pages/admin/adm-properties.php",
  "/admin/blog" => "/pages/admin/adm-blog.php",
  "/admin/sell" => "/pages/admin/adm-sell.php",
];

// If the requested path matches a defined route, load the corresponding PHP file and stop execution
if (isset($routes[$path])) {
  require ROOT_PATH . $routes[$path];
  exit;
}

// Allow direct access to real files (CSS, JS, images)
// Returning false hands control back to PHP’s server
$file = ROOT_PATH . $path;
if ($path !== "/" && file_exists($file) && !is_dir($file)) {
  return false;
}

// If nothing matched, return a 404 response
http_response_code(404);
echo "404 Not Found";