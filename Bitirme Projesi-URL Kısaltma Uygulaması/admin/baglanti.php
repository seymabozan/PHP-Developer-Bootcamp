<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
    echo "<script>window.location.href='../index.php';</script>";
}

error_reporting(0);

$baglan = new mysqli("localhost","root","","bootcamp_proje");
$baglan -> set_charset("utf8");

if ($baglan->connect_errno > 0) {
    die("<b>BAĞLANTI HATASI:</b> " . $baglan->connect_error);
}

?>