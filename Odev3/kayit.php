<?php
$baglanti = new PDO("mysql:host=localhost;dbname=odev", "root", "");
$baglanti->exec("SET NAMES utf8");
$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$adsoyad = $_POST["adsoyad"];
$telefon = $_POST["telefon"];

$sorgu = $baglanti->prepare("INSERT INTO kisiler(adsoyad, telefon) VALUES(?, ?)");
$sorgu->bindParam(1, $adsoyad, PDO::PARAM_STR);
$sorgu->bindParam(2, $telefon, PDO::PARAM_STR);

$sorgu->execute();

echo "<script>
alert('Bilgileriniz Kayıt Edildi!');
window.location.href = 'liste.php';
</script>";

?>