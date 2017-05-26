<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.not_found.php")) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
    //echo "Access Denied";
  	exit;
}
include_once('./inc/page.header.php');
?>
    <section class="section main">
        <div class="container">
          <div class="column">
            <div class="box">
               <h2 class="title">NOT FOUND<br><br>
               The ShortLink that you are looking for could not be found.</h2>
             </div>
           </div>
         </div>
    </section>
  </div>
<?php
include_once('./inc/page.footer.php');
?>
