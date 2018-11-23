<?php

global $ShortLink;

$data = $ShortLink->fetch_shortlink($arguments['shortlink'], false);

if (empty($data)) {
    echo "NOT FOUND.";
    exit;
}

$complete_url = $data['long_url'];

?>

<a href="<?=$complete_url?>"><?=$complete_url?></a>

