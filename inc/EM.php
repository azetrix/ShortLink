<?php
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
      URL must be valid to create a ShortLink.
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
      Custom ShortLink is already in use.
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
      Custom ShortLink is must be less than 20 characters.
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
      <p><strong>Invalid ShortLink</strong>!</p>
      <button class="delete"></button>
      </div>
      <div class="message-body">
      ShortLink does not exist.
      </div>
      </div></article>';
  }
}
