<?php
include('./inc/vars.php');
include('./inc/ShortLink.php');

$forwardSC = ltrim(rtrim(preg_replace('~/+~', '/', trim(strtok($_SERVER['REQUEST_URI'], '?'))), '/'), '/');

if($forwardSC == 'forwarder.php') {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
    //echo "Access Denied";
  	exit;
}

if(substr($forwardSC, -11) == '/index.html') {
    $forwardSC = substr($forwardSC, 0, -11);
}
if(substr($forwardSC, -10) == '/index.htm') {
    $forwardSC = substr($forwardSC, 0, -10);
}
if(substr($forwardSC, -10) == '/index.php') {
    $forwardSC = substr($forwardSC, 0, -10);
}
if(substr($forwardSC, -11) == '/index.aspx') {
    $forwardSC = substr($forwardSC, 0, -11);
}
if(substr($forwardSC, -10) == '/index.asp') {
    $forwardSC = substr($forwardSC, 0, -10);
}

try {
    $pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE,
        DB_USERNAME, DB_PASSWORD);
}
catch (\PDOException $e) {
  setcookie('EM', '14', '0', '/');
  header('Location: /');
  //echo "Database connection failed";
  exit;
}

$shortLink = new ShortLink($pdo);

try {
    $url = $shortLink->shortCodeToUrl($forwardSC);
}
catch (\Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    include_once('./inc/page.not_found.php');
    exit;

}

if(!FORWADER_PREVIEW) {
    header($_SERVER["SERVER_PROTOCOL"]." 301 Moved Permanently");
    header('Location: '.$url);
  	exit;
}

include_once('./inc/page.header.php');
?>

  <section class="section main">
    <div class="container">
      <div class="column">
        <div class="box">
          <a href="<?=htmlspecialchars($url);?>"><?=htmlspecialchars($url);?></a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include_once('./inc/page.footer.php');
?>
