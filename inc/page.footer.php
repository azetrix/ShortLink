<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.footer.php")) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
  	exit;
}
?>    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <span><strong>ShortLink</strong> by <b>azetrix.xyz</b><br>Phoenix Eve C. Aspacio</span>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="/assets/design.js"></script>
  </body>
</html>
