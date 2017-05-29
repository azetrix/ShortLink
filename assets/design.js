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
        t.classList.add('copy-failed');
        setTimeout(function() { t.classList.remove('copy-failed'); }, 1500);
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

// Loading animation on click
function init_shorten(elem) {
  if (document.getElementById("url").value != '') {
    elem.classList.add('is-loading');
  }
}
