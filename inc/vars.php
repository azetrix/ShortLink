<?php
define("DB_PDODRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_DATABASE", "tiny");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

define("SHORTLINK_PREFIX", "http://localhost/"); // with trailing slash
define("CONTACT_EMAIL", "abuse@phoenixpeca.xyz"); // please provide a valid email

// Any ShortLink that matches with the keys of this array will be blocked.
$kw_blacklist = array (
'fuck',
'shit',
'asshole',
'cunt',
'nigger',
'bitch',
'faggot',
'dick',
'dumbass',
'nigga',
'niggers',
'pussy',
'slut',
'whore',
'iyot'
);

// Any domain of a URL that matches with the keys of this array will be blocked.
$dom_blacklist = array (
'pornhub.com'
);
