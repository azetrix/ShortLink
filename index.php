<?php
if(isset($_COOKIE['EM'])) {
    $EM = $_COOKIE['EM'];
    setcookie('EM', '', '0', '/');
}
if(isset($_COOKIE['BL'])) {
    $BL = $_COOKIE['BL'];
    setcookie('BL', '', '0', '/');
}
include_once('./inc/page.header.php');
?>

   <section class="section">
     <div class="container">

    <div class="column">
      <div class="box">
       <form action="create.php" method="post">
              <h2 class="title">Create a ShortLink</h2>
              <label class="label">Enter URL *</label>
              <p style="border-bottom: 1px solid #f1f1f1; padding-bottom: 15px;" class="control has-icon has-addons">
                <input style="min-width: 90%;" class="input" type="text" required name="url" id="url" placeholder="http://phenomena.nationalgeographic.com/2016/06/28/you-can-help-make-maps-for-science-no-experience-needed/">
                <span style="margin-top: -1px;" class="icon">
                  <i class="fa fa-chain"></i>
                </span>
                <input style="min-width: 10%;" type="submit" class="button is-info" value="Shorten">
              </p>

              <div style="display: flex;" class="columns">
                <div style="width: 300px; flex: none;" class="column">

                    <label class="label">Custom ShortLink</label>
                    <p class="control has-icon">
                      <input style="max-width: 100%;" class="input" type="text" name="customcode" id="customcode" placeholder="Maps4Science">
                      <span style="margin-top: -1px;" class="icon">
                        <i class="fa fa-pencil-square-o"></i>
                      </span>
                      <span style="display: block; margin-left: 14px;">
                          ↳
                          <kbd style="background-color: #444444;color: white;font-size: 90%; padding: 2px 8px; border-radius: 10px; margin-top: 5px; margin-left: 5px;">
                              a<span style="color: #888888;">-</span>z A<span style="color: #888888;">-</span>Z 0<span style="color: #888888;">-</span>9 -
                          </kbd>
                      </span>
                    </p>

                </div>
                <div style="border-left: 1px solid #f1f1f1;" class="column">
                  <p>Are you sick of posting URLs in emails only to have it break when sent causing
                    the recipient to have to cut and paste it back together? Then you've come to
                    the right place. By entering in a URL in the text field above, we will create
                    a short URL that will not break in email postings and never expires.</p>
                </div>
              </div>

       </form>
       <?php
       include_once('./inc/EM.php');
       ?>
     </div>
   </div>

</div>
</section>

<?php
include_once('./inc/page.footer.php');
?>
