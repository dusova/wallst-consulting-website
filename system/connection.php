<?php

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'yetkin_krnwallst');
define('DB_PASSWORD', 'Mstarda1337$');
define('DB_NAME', 'yetkin_wallstcons');

$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_set_charset($link, "utf8mb4");

if ($link->connect_error) {
    die("Bağlantı hatası: " . $link->connect_error);
}

?>