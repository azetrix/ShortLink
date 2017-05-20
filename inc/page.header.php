<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.header.php")) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
  	exit;
}
?><html lang="en" style="overflow-x: initial; overflow-y: initial; background-color: #f5f5f5;" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
 <head>
  <title>ShortLink | URL Shortener</title>
  <style>
      .msg2f {
          opacity: 1;
          transition: opacity 0.6s; /* 600ms to fade out */
      }
      .input {
          box-shadow: none !important;
          border-radius: 0px !important;
      }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

  <meta property="og:title" content="ShortLink - azetrix.xyz"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="https://azetrix.xyz/"/>
  <meta property="og:image" content="https://azetrix.xyz/logo/banner.jpg"/>
  <meta property="og:site_name" content="ShortLink - azetrix.xyz"/>
  <meta property="og:description" content="An open source url shortening service by Phoenix Eve Aspacio."/>

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/logo/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/logo/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/logo/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/logo/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/logo/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/logo/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/logo/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/logo/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="/logo/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="/logo/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="/logo/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/logo/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="/logo/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="ShortLink"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="/logo/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="/logo/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="/logo/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="/logo/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="/logo/mstile-310x310.png" />

 </head>
 <body style="min-width: 800px;">
   <section class="hero is-dark">
     <div class="hero-body">
       <div class="container">
         <div style="display: flex;" class="columns">
           <div style="text-align: left;" class="column">
             <a href="/"><h1 style="font-size: 50px;" class="title">
               azetrix.xyz
             </h1></a>
             <h2 class="subtitle">
               ShortLink <span style="margin-left: 14px; margin-right: 14px;">|</span> URL Shortener
             </h2>
           </div>
           <div style="text-align: right;" class="column">

             <form style="margin-top: 10px;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <p>Want to make a <b>donation</b>?</p>
               <input type="hidden" name="cmd" value="_s-xclick">
               <input type="hidden" name="hosted_button_id" value="7ZHJQTCW4UZ8A">
               <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
               <img style="margin-right: 30px; margin-top: 30px;" alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
             </form>


           </div>
        </div>
       </div>
     </div>
   </section>
