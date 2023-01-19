<?php

require_once "sql.php";

require_once "affiche.php";

require_once "header.php";

require_once "mail.php";

require_once "aside.php";

require_once "paypal.php";

include "_install.php";

if (file_exists("./config.php")) {

  $mail = new \mails\mail(true);

}

$sql = new \data\sql();

$affiche = new \affiche\afficher();

$menu_header = new \menu_header\menu_header();

$aside = new \aside\aside();

$paypal = new \paypal\paypal();


?>