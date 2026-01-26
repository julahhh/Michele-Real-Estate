<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// normalize trailing slash
if ($path !== "/" && str_ends_with($path, "/")) {
  $path = rtrim($path, "/");
}

$routes = [
  "/" => "/index.php",
  "/about" => "/about.php",
  "/buy" => "/buy.php",
  "/sell" => "/sell.php",
  "/blog" => "/blog.php",
  "/contact" => "/contact.php",
];

if (isset($routes[$path])) {
  require __DIR__ . $routes[$path];
  exit;
}

// if requesting a real file, let the server handle it
$file = __DIR__ . $path;
if ($path !== "/" && file_exists($file) && !is_dir($file)) {
  return false;
}

http_response_code(404);
echo "404 Not Found";