<?php
if(strtolower(basename($_SERVER["SCRIPT_FILENAME"])) === strtolower("page.not_found.php")) {
    setcookie('EM', '09', '0', '/');
    header('Location: /');
    //echo "Access Denied";
  	exit;
}
?>
