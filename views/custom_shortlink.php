<?php

global $ShortLink;

$data = $ShortLink->fetch_shortlink($arguments['shortlink'], true);

if (empty($data)) {
    require 'not-found.php';
    exit;
}

$complete_url = $data['long_url'];

?>

<a href="<?=$complete_url?>"><?=$complete_url?></a>

