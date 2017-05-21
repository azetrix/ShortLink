<?php
include('./inc/vars.php');

if(isset($_COOKIE['EM'])) {
    $EM = $_COOKIE['EM'];
    setcookie('EM', '', '0', '/');
}
if(isset($_COOKIE['BL'])) {
    $BL = $_COOKIE['BL'];
    setcookie('BL', '', '0', '/');
}
if(!isset($EM) && $EM != '00' && !isset($BL)) {
    setcookie('EM', '10', '0', '/');
    header('Location: /');
  	exit;
}
$SLComplete = SHORTLINK_PREFIX.$BL;
include_once('./inc/page.header.php');
?>

       <section class="section main">
        <div class="container">
          <div class="column">
            <div class="box">
              <h2 class="title">ShortLink Created</h2>
              <label class="label">ShortLink URL</label>
              <p class="control has-icon has-addons">
                <input class="url-code-block" id="Rlink" value="<?php echo $SLComplete; ?>" readonly="true">
                <button class="button is-info copy" data-copytarget="#Rlink">copy</button>
                <a href="<?php echo $SLComplete; ?>"><button class="button is-primary copy">open</button></a>
              </p>

            </div>
          </div>
        </div>
       </section>
     </div>

<?php
include_once('./inc/page.footer.php');
?>
