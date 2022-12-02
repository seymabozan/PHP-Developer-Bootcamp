<?php
error_reporting(0);
require_once 'baglanti.php';

$sil = $_GET["id"]; 
$islem = $baglan->query("DELETE FROM url WHERE id=$sil");
header("Location:liste.php");
?>