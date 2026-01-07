<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$routes = [
  "/" => "index.php",
  "/about" => "about.php",
  "/buy" => "buy.php",
  "/sell" => "sell.php",
  "/contact" => "contact.php",
];

if (isset($routes[$path])) {
  require __DIR__ . "/" . $routes[$path];
  exit;
}

http_response_code(404);
echo "Page not found";