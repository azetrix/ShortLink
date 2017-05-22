<?php
include('./inc/vars.php');
include('./inc/ShortLink.php');
include('./inc/reCAPTCHA/autoload.php');

try {
    $pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $pdo->exec("CREATE TABLE IF NOT EXISTS short_links (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  long_url VARCHAR(2000) NOT NULL,
  short_code VARCHAR(2000) NOT NULL,
  date_created INTEGER UNSIGNED NOT NULL,
  counter INTEGER UNSIGNED NOT NULL DEFAULT '0',
  custom_short_code BOOLEAN NOT NULL DEFAULT FALSE,

  PRIMARY KEY (id),
  KEY short_code (short_code)
)
ENGINE=InnoDB COLLATE=latin1_general_cs;");
}
catch (\PDOException $e) {
    echo $e;
    exit;
}

$shortLink = new ShortLink($pdo);

if(!isset($_POST['url'])) {
  setcookie('EM','01', '0', '/');
  header('Location: /');
	//echo "URL not declared.";
	exit;
}

if(empty($_POST['url'])) {
  setcookie('EM','02', '0', '/');
  header('Location: /');
	//echo "URL is empty.";
	exit;
}

if(strlen($_POST['url']) >= 2000) {
  setcookie('EM','03', '0', '/');
  header('Location: /');
	//echo "URL is too long.";
	exit;
}

if(!$shortLink->validateUrlFormat($_POST['url'])) {
  setcookie('EM','04', '0', '/');
  header('Location: /');
	//echo "URL structure is not valid.";
	exit;
}

if($shortLink->is_profane($_POST['url'], 'domain')) {
  setcookie('EM','12', '0', '/');
  header('Location: /');
  //echo "This ShortLink has been blocked.";
  exit;
}

if(isset($_POST['customcode']) AND !empty($_POST['customcode'])) { // if custom code is set
  if($shortLink->codeExistsInDb($_POST['customcode'])) {
    setcookie('EM','05', '0', '/');
    header('Location: /');
    //echo "Code is not available.";
    exit;
  }

  if(strlen($_POST['customcode']) >= 20) {
    setcookie('EM','06', '0', '/');
    header('Location: /');
    //echo "Custom short code is too long.";
    exit;
  }

  if(strlen($_POST['customcode']) <= 2) {
    setcookie('EM','07', '0', '/');
    header('Location: /');
    //echo "Custom code must be at least 3 characters long.";
    exit;
  }

  if(preg_match("/[^a-z\-0-9]/i", $_POST['customcode'])) {
    setcookie('EM','08', '0', '/');
    header('Location: /');
    //echo "We only accept dashes and aplphanumeric characters.";
    exit;
  }

  if($shortLink->is_profane($_POST['customcode'], 'keyword')) {
    setcookie('EM','11', '0', '/');
    header('Location: /');
    //echo "This ShortLink has been blocked.";
    exit;
  }
}

if(reCAPTCHA_ENABLED) {
  if(!isset($_POST['g-recaptcha-response'])) {
    setcookie('EM','13', '0', '/');
    header('Location: /');
    //echo "Verification failed.";
    exit;
  }

  $recaptcha = new \ReCaptcha\ReCaptcha(reCAPTCHA_SECRETKEY);
  $$recaptcha_resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
  if(!$$recaptcha_resp->isSuccess()) {
    setcookie('EM','13', '0', '/');
    header('Location: /');
    //echo "Verification failed.";
    exit;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || !empty($_POST["url"])) {
    if (isset($_POST["customcode"]) && !empty($_POST["customcode"])) {
        $code = $shortLink->urlToShortCode($_POST["url"], $_POST["customcode"]);
    } else {
        $code = $shortLink->urlToShortCode($_POST["url"]);
    }
}

setcookie('EM', '00', '0', '/');
setcookie('BL', $code, '0', '/');
header('Location: /display.php');
exit;
