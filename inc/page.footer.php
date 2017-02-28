<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.footer.php")) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
  	exit;
}
?><footer class="footer">
  <div class="container">
    <div class="content has-text-centered">
      <p>
        <strong>ShortLink</strong> by <b>azetrix.xyz</b><br>Phoenix Eve C. Aspacio
      </p>
      <p>
        <ul style="list-style: none;">
          <li><a style="vertical-align: top; color: #444444;" href="http://bulma.io/"><img style="height: 20px; padding-right: 5px;" src="/img/bulma-logo.png"> Bulma</a></li>
          <li><a style="vertical-align: top; color: #444444;" href="https://m.do.co/c/39c6ad8c42ee"><img style="height: 20px; padding-left: 5px;" src="/img/digitalocean-logo.png"> DigitalOcean</a></li>
          <li><a style="vertical-align: top; color: #444444;" href="http://letsencrypt.org/"><img style="height: 20px; padding-left: 5px;" src="/img/letsencrypt-logo.png"> Let's Encrypt</a></li>
        </ul>
      </p>



    </div>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
<script>

var clipboard = new Clipboard('.copy');



// Get all elements with class="closebtn"
var close = document.getElementsByClassName("delete");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement.parentElement.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
</body>
</html>
