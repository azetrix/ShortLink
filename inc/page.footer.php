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

<script>
(function() {

    'use strict';

  // click events
  document.body.addEventListener('click', copy, true);

    // event handler
    function copy(e) {

    // find target element
    var
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);

    // is element selectable?
    if (inp && inp.select) {

      // select text
      inp.select();

      try {
        // copy text
        document.execCommand('copy');
        inp.blur();

        // copied animation
        t.classList.add('copied');
        setTimeout(function() { t.classList.remove('copied'); }, 1500);
      }
      catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
      }

    }

    }

})();

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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96230601-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
