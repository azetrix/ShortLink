<?php
if(!isset($_GET['result']) || $_GET['result'] != 'success') {
  header('Location: /');
  exit();
}
include_once('./inc/page.header.php');
if(isset($_GET['result']) && $_GET['result'] == 'success') {
?>
    <section class="section main">
        <div class="container">
          <div class="column">
            <div class="box">
               <h2 class="title">Dear Stranger,<br><br>I would like to express my appreciation for your generosity
                 in support of ShortLink. Your personal commitment was incredibly
                 helpful and allowed us to reach our goal. Your assistance means so much
                 to us. Thank you from all of us here at Phoenix Peca.<br><br><br>With gratitude,<br><br>Phoenix Eve C. Aspacio</h2>
             </div>
           </div>
         </div>
    </section>
  </div>
<?php
}
include_once('./inc/page.footer.php');
?>
