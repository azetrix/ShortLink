<?php

require "./src/autoload.php";

/**
 * warning:
 * a - you always need a dedicated route and view file for the standard and custom shortlinks.
 * b - you should never declare duplicate routes. otherwise, the first match will override all other identical routes.
 * c - once used, these routes should never be changed regardless of the situation. broken links would be the consequence.
 */
$routes = [
    "/" => "./views/index.php",
    "/create" => "./views/create.php",
    "/robots.txt" => "./views/robots.php",
    "/r/{{shortlink}}" => "./views/shortlink.php",
    "/{{shortlink}}" => "./views/custom_shortlink.php"
];

// database initialization and conection establishment
$database = new ShortLink\Database;
$database->table = "short_links";
$database->connect('localhost', 'root', 'password', 'aaa');

$ShortLink = new ShortLink\Core($database); // bootstraps the shortlink core

new ShortLink\Router($routes, null, $ShortLink->error_handler); // main process