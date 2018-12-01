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

namespace ShortLink;

use Shortlink\ContentType;

class Router
{

    private const super_match = "shortlink"; // you may change this as you like but make sure that you update the corresponding routes as well

    private static $requested_uri;

    public function __construct(array $routes, $requested_uri = null, ErrorHandler $error_handler) {
        $server_redirect_url = (isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : '/');
        $server_redirect_url = (isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : $server_redirect_url);
        $requested_uri = ($requested_uri !== null ? $requested_uri : $server_redirect_url);
        self::$requested_uri = (empty($requested_uri) ? "/" :  $requested_uri); // define the requested uri
        $arguments = [
            "requested_uri" => self::$requested_uri,
            "get_data" => $_GET,
            "post_data" => $_POST,
            "_errors" => $error_handler
         ];

        foreach ($routes as $uri => $view) {

            // standard routes
            if (self::is_super_matched_route($uri) === false) {
                if (self::regular_match($uri)) {
                    self::view($view, $arguments);
                    return true;
                }
            }

            // super-matched routes
            if(self::is_super_matched_route($uri) === true) {
                $shortlink = self::super_match($uri, 1);
                if ($shortlink !== false) {
                    $arguments["shortlink"] = $shortlink;
                    self::view($view, $arguments);
                    return true;
                }
            }

        }

        // non-existing routes
        self::view("./views/not-found.php", $arguments);
        return false;
    }

    private static function uri_sanitize(string $uri) {
        $uri = preg_replace('/[\/]+/m', '/', $uri); // allow multi-slashed uri
        $uri = preg_replace('/^([\/].*)\/$/m', '$1', $uri); // remove trailing slash in uri
        return strval($uri);
    }

    private static function route_to_regex(string $uri) {
        if (self::is_super_matched_route($uri) === true) {
            $uri = preg_quote($uri, '/'); // sanitize string for regex match
            $uri = str_replace(preg_quote("{{".self::super_match."}}", '/'), "([^\/]+)", $uri); // super-match to regex match
            $uri = '/' . $uri . '$/m'; // create a fully usable regex rule string
            return strval($uri);
        } else {
            throw new \Exception("Super-match Route Leak: \"this method is evaluating a standard route\".");
            return false;
        }
    }

    private static function is_super_matched_route(string $route) {
        if (strpos($route, '{{'.self::super_match.'}}') !== false) { // if `shortlink` super-match exists
            return true;
        } else {
            return false;
        }
    }

    private static function regular_match(string $route) {
        if (self::is_super_matched_route($route) === false) {
            return self::uri_sanitize(self::$requested_uri) === self::uri_sanitize($route); // does the requested uri matches any of the routes
        } else {
            throw new \Exception("Standard Route Leak: \"this is a super-matched route\".");
            return false;
        }
    }

    private static function super_match(string $route, int $index) {
        if (self::is_super_matched_route($route) === true) {
            preg_match_all(self::route_to_regex(self::uri_sanitize($route)), // parse the requested uri
                           self::uri_sanitize(self::$requested_uri),
                           $shortlink);
            $match = $shortlink[$index];
            return (!empty($match) ? strval($match[0]) : false); // get the shortlink from the uri
        } else {
            throw new \Exception("Super-match Route Leak: \"this is not a super-matched route\".");
            return false;
        }
    }

    private static function view(string $file, array $arguments = null) {
        if (file_exists($file)) {
            header("Content-Type: " . ContentType::get_mime_type($file)); // return the appropriate content type. add new if necessary
            require $file; // require the view file for browser display
            return true;
        } else {
            throw new \Exception("System View Resource Not Found: \"$file\".");
            return false;
        }
    }

}