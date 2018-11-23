<?php

require "./src/autoload.php";

// warnig: you always need a dedicated route and view file for the standard and custom shortlinks
$routes = [
    "/" => "./views/index.php",
    "/create" => "./views/create.php",
    //"/robots.txt" => "./views/robots.php",
    "/s/{{shortlink}}" => "./views/shortlink.php",
    "/r/{{shortlink}}" => "./views/custom_shortlink.php"
];

// database initialization and conection establishment
$database = new ShortLink\Database;
$database->table = "short_links";
$database->connect('localhost', 'root', 'password', 'aaa');

$ShortLink = new ShortLink\Core($database); // bootstraps the shortlink core
$ShortLink->user_agent = $_SERVER["HTTP_USER_AGENT"]; // sets the database user agent

new ShortLink\Router($routes); // main process