<?php

global $ShortLink;
$data = $ShortLink->create_shortlink($_POST['long_url'], $_POST['shortlink']);


print_r($arguments);

if (empty($data)) {
    exit;
}

$shortlink_url = ($data['custom_code'] ? '/'.urlencode($data['short_code']) : '/s/'.urlencode($data['short_code']));

?>

<a href="<?=$shortlink_url?>"><?=$shortlink_url?></a>

