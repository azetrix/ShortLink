<?php
define("DB_PDODRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_DATABASE", "tiny");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

define("SHORTLINK_PREFIX", "http://localhost/"); // with trailing slash
define("CONTACT_EMAIL", "abuse@phoenixpeca.xyz"); // please provide a valid email

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
'*virgin*'
);
