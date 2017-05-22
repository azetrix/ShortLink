<?php
define("DB_PDODRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_DATABASE", "tiny");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

define("SHORTLINK_PREFIX", "http://".$_SERVER['SERVER_NAME']."/"); // with trailing slash
define("CONTACT_EMAIL", "abuse@".$_SERVER['SERVER_NAME']); // please provide a valid email

define("reCAPTCHA_ENABLED", false); // true or false; reCAPTCHA integration is an optional feature
define("reCAPTCHA_SITEKEY", ""); // please obtain your site key at https://www.google.com/recaptcha/admin and set reCAPTCHA_ENABLED to true
define("reCAPTCHA_SECRETKEY", ""); // please obtain your secret key at https://www.google.com/recaptcha/admin and set reCAPTCHA_ENABLED to true
define("reCAPTCHA_LANG", "en"); // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language and set reCAPTCHA_ENABLED to true

// Any ShortLink that matches with the keys of this array will be blocked. - ACCEPTS SHELL WILDCARD PATTERNS
$kw_blacklist = array (
'*--*',
'*fuck*',
'*shit*',
'*asshole*',
'*cunt*',
'*nigger*',
'*bitch*',
'*faggot*',
'*dick*',
'*dumbass*',
'*nigga*',
'*pussy*',
'*slut*',
'*whore*',
'*axwound*',
'*dildo*',
'*vagina*',
'*penis*',
'*clitoris*',
'*creampie*',
'*cum*'
);

// Any domain of a URL that matches with the keys of this array will be blocked. - ACCEPTS SHELL WILDCARD PATTERNS
$dom_blacklist = array (
'*porn*',
'*adult*',
'*sex*',
'*xxx*',
'*brazzers*',
'*bdsm*',
'*fuck*',
'*bigtit*',
'*bitch*',
'*homo*',
'*horny*',
'*virgin*',
'localhost',
$_SERVER['SERVER_NAME']
);
