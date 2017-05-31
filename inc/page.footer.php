<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.footer.php")) {
  setcookie('EM', '09', '0', '/');
  header('Location: /');
  //echo "Access Denied";
  exit;
}
?>    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <span><a style="color: #999999;" href="https://github.com/azetrix/ShortLink"><b>ShortLink</b></a><br><i><?=FOOTER_TXT?></i></span>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="/assets/design.js<?='?'.slugify(FOOTER_TXT);?>"></script>
  </body>
</html>
