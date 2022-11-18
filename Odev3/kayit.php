<?php
$baglanti = new PDO("mysql:host=localhost;dbname=odev", "root", ""); //New PDO ile veritabanı ile bağlantı kurdum.
$baglanti->exec("SET NAMES utf8");
$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$adsoyad = $_POST["adsoyad"]; //Form'da name olarak verdiğim isimleri burada bir değişkene atıyorum
$telefon = $_POST["telefon"];

$sorgu = $baglanti->prepare("INSERT INTO kisiler(adsoyad, telefon) VALUES(?, ?)"); //Prepare ile verileri hangi tabloya ve değerlere atayacağını/ekleyeceğini belirtiyorum.
$sorgu->bindParam(1, $adsoyad, PDO::PARAM_STR); //bindParam ile eklenicek verileri tanımlıyoruz.
$sorgu->bindParam(2, $telefon, PDO::PARAM_STR);

$sorgu->execute();

echo "<script> 
alert('Bilgileriniz Kayıt Edildi!'); 
window.location.href = 'liste.php';
</script>"; //Som olarak script ile kayıt yapıldıysa ekrana mesaj yazdırıyoruz.

?>
