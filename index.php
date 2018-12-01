<?php

/*
 * GNU Affero General Public License
 *
 * Copyright (c) 2018 Phoenix Peca
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require "./src/autoload.php";

/**
 * warning:
 * a - you always need a dedicated route and a view file for the standard and custom shortlinks.
 * b - you should never declare duplicate routes. otherwise, the first match will override all other identical routes.
 * c - once used, the shortlink routes should never be changed regardless of the situation. broken links would be the consequence.
 */
$routes = [
    "/" => "./views/index.php",
    "/create" => "./views/create.php",
    "/robots.txt" => "./views/robots.txt",
    "/favicon.ico" => "./views/favicon.ico",
    "/s/{{shortlink}}" => "./views/shortlink.php",
    "/{{shortlink}}" => "./views/custom_shortlink.php"
];

// database initialization and conection establishment
$database = new ShortLink\Database;
$database->table = "short_links";
$database->connect('localhost', 'root', 'password', 'aaa');

$ShortLink = new ShortLink\Core($database); // bootstraps the shortlink core

new ShortLink\Router($routes, null, $ShortLink->error_handler); // main process