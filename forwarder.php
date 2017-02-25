<?php
include('./inc/vars.php');
include('./inc/ShortLink.php');

$forwardSC = ltrim(rtrim(preg_replace('~/+~', '/', trim(strtok($_SERVER['REQUEST_URI'], '?'))), '/'), '/');

if($forwardSC == 'forwarder.php') {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
  	exit;
}

try {
    $pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE,
        DB_USERNAME, DB_PASSWORD);
}
catch (\PDOException $e) {
    echo $e;
    exit;
}

$shortLink = new ShortLink($pdo);

try {
    $url = $shortLink->shortCodeToUrl($forwardSC);
}
catch (\Exception $e) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
    //echo "ShortLink does not exist";
    exit;

}

include_once('./inc/page.header.php');
?>

   <section class="section">
     <div class="container">

 <a href="<?=$url;?>"><?=$url;?></a>

</div>
</section>

<?php
include_once('./inc/page.footer.php');
?>
