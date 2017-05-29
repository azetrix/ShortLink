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
              <iframe src="https://notfound-static.fwebservices.be/404/index.html?&amp;key=421aa90e079fa326b6494f812ad13e79" width="100%" height="650" frameborder="0"></iframe>
             </div>
           </div>
         </div>
    </section>
  </div>
<?php
include_once('./inc/page.footer.php');
?>
