<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("EM.php")) {
  setcookie('EM', '09', '0', '/');
  header('Location: /');
	exit;
}
if(isset($EM)) {
  if($EM == '01') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Invalid URL</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      URL must be declared.
      </div>
      </div></article>';
  }
  if($EM == '02') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Invalid URL</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      URL must not be empty.
      </div>
      </div></article>';
  }
  if($EM == '03') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Invalid URL</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      URL must not be more than 1999 characters long.
      </div>
      </div></article>';
  }
  if($EM == '04') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Invalid URL</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      URL must be valid to create a ShortLink. Please include the scheme (`http://`, `https://`, `ftp://`, `mailto:`, etc) in creating ShortLink.
      </div>
      </div></article>';
  }
  if($EM == '05') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Custom ShortLink Unavailable</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Custom ShortLink is already in use. But we have created a new one for you.
      </div>
      </div></article>';
  }
  if($EM == '06') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Forbidden Custom ShortLink</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Custom ShortLink must be less than 20 characters.
      </div>
      </div></article>';
  }
  if($EM == '07') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Forbidden Custom ShortLink</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Custom ShortLink is must be at least 3 characters.
      </div>
      </div></article>';
  }
  if($EM == '08') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Forbidden Custom ShortLink</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Custom ShortLink is must contain dashes and alphanumeric characters only.
      </div>
      </div></article>';
  }
  if($EM == '09') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Access Denied</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Your access to this URI has been identified as unauthorized.
      </div>
      </div></article>';
  }
  if($EM == '10') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Invalid Action</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      Your actions are not applicable.
      </div>
      </div></article>';
  }
  if($EM == '11') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Forbidden ShortLink</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      This ShortLink has been banned by the Administrator for some reason.
      If you think we\'ve made a mistake, please contact us at <a href="mailto:'.CONTACT_EMAIL.'">'.CONTACT_EMAIL.'</a>
      </div>
      </div></article>';
  }
  if($EM == '12') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Forbidden Domain</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      This domain has been banned by the Administrator for some reason.
      If you think we\'ve made a mistake, please contact us at <a href="mailto:'.CONTACT_EMAIL.'">'.CONTACT_EMAIL.'</a>
      </div>
      </div></article>';
  }
  if(reCAPTCHA_ENABLED && $EM == '13') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Verification Failed</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      The verification system could not verify that you\'re not a robot. Please try again.
      </div>
      </div></article>';
  }
  if($EM == '14') {
    echo '<div class="msg2f"><hr><article class="message is-danger">
      <div class="message-header">
      <p><strong>Server Error</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      The server could not connect to the database.
      Please contact us at <a href="mailto:'.CONTACT_EMAIL.'">'.CONTACT_EMAIL.'</a>
      </div>
      </div></article>';
  }
}
