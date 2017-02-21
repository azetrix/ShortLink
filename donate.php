<?php
if(!isset($_GET['result']) || $_GET['result'] != 'success') {
  header('Location: /');
  exit();
}
include_once('./inc/page.header.php');
if(isset($_GET['result']) && $_GET['result'] == 'success') {
?>
    <section class="section">
        <div class="container">
           <h2 class="title">Dear Stranger,<br><br><br>I would like to express my appreciation for your generosity
             in support of ShortLink. Your personal commitment was incredibly
             helpful and allowed us to reach our goal. Your assistance means so much
             to me. Thank you from all of us here at Phoenix Peca.<br><br><br>With gratitude,<br><br>Phoenix Eve C. Aspacio</h2>
         </div>
    </section>
<?php
}
include_once('./inc/page.footer.php');
?>
