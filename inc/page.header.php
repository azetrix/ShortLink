<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.header.php")) {
  setcookie('EM', '09', '0', '/');
  header('Location: /');
  //echo "Access Denied";
	exit;
}
?><html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>ShortLink | URL Shortener</title>
    <link rel="stylesheet" href="/assets/design.css">
    <link rel="stylesheet" href="/assets/bulma.css">
    <link rel="stylesheet" href="/assets/font-awesome.css">

    <meta property="og:title" content="ShortLink | URL Shortener"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>"/>
    <meta property="og:image" content="<?php echo "http://".$_SERVER['SERVER_NAME']."/"; ?>logo/banner.jpg"/>
    <meta property="og:site_name" content="ShortLink"/>
    <meta property="og:description" content="ShortLink is a simple and open-source URL shortening web application."/>

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
  <?php if(reCAPTCHA_ENABLED): ?>  <script src='https://www.google.com/recaptcha/api.js?hl=<?=reCAPTCHA_LANG?>'></script><?php endif; ?></head>
  <body style="min-width: 800px;">
     <div class="design">
       <section class="hero is-dark">
         <div class="hero-body">
           <div class="container">
             <div style="display: flex;" class="columns">
               <div style="text-align: left;" class="column">
                 <a href="/"><h1 style="font-size: 50px;" class="title">
                   <?=$_SERVER['SERVER_NAME']?>
                 </h1></a>
                 <h2 class="subtitle">
                   ShortLink <span style="margin-left: 14px; margin-right: 14px;">|</span> URL Shortener
                 </h2>
               </div>
               <div class="column donate">
                 <p>Want to make a <b>donation</b>?</p>
                 <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7ZHJQTCW4UZ8A"><img src="/img/paypal-donate.svg"></a>
               </div>
            </div>
           </div>
         </div>
       </section>
