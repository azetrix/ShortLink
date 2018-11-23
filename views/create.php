<?php

global $ShortLink;

$data = $ShortLink->create_shortlink($_POST['long_url'], $_POST['shortlink']);

if (empty($data)) {
    echo "Shortlink is not available.";
    exit;
}

$shortlink_url = $data['custom_code'] ? '/r/'.urlencode($data['short_code']) : '/s/'.urlencode($data['short_code']);

?>

<a href="<?=$shortlink_url?>"><?=$shortlink_url?></a>

