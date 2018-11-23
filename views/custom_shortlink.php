<?php

global $ShortLink;

$data = $ShortLink->fetch_shortlink($arguments['shortlink'], true);

if (empty($data)) {
    echo "Not found.";
    exit;
}

$complete_url = $data['long_url'];

?>

<a href="<?=$complete_url?>"><?=$complete_url?></a>

