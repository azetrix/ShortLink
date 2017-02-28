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

   <section class="section">
     <div class="container">

    <div class="column">
      <div class="box">

        <h2 class="title">ShortLink Created</h2>
        <figure class="highlight" style="position: relative;box-shadow: none;font-weight: 400;max-width: 100%;overflow: hidden;padding: 0;display: block;"><pre style="
    white-space: pre-wrap;
    overflow: auto;
    max-width: 100%;
    background-color: whitesmoke;
    color: #4a4a4a;
    font-size: 0.8em;
    white-space: pre;
    word-wrap: normal;
"><code id="Rlink" style="
    background: none;
    color: inherit;
    display: block;
    font-size: 1em;
    overflow-x: auto;
    padding: 1.25rem 1.5rem;
"><?php echo $SLComplete; ?></code></pre><button class="copy" data-clipboard-target="#Rlink" style="
    position: absolute;
    background: white;
    border: solid #dbdbdb;
    border-width: 0 0 1px 1px;
    color: #7a7a7a;
    cursor: pointer;
    outline: none;
    position: absolute;
    right: 0;
    top: 0;
">Copy</button></figure>

     </div>
   </div>

</div>
</section>

<?php
include_once('./inc/page.footer.php');
?>
