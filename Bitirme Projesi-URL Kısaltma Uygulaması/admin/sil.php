<?php
error_reporting(0);
require_once 'baglanti.php';

$sil = $_GET["id"]; 
$islem = $baglan->query("DELETE FROM url WHERE id=$sil");

echo "<script>
    alert('DİKKAT: URL SİLİNECEK!');
    window.location.href='liste.php';
    </script>";
?>
