<?php

$baglan = new PDO("mysql:host=localhost;dbname=odev;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sil = $_GET["id"];
$islem = $baglan->query("delete from kisiler where id=$sil");

if($islem){
    echo "<script>
    alert('Kaydınız Silindi!);
    window.location.href = 'liste.php';
    </script>";
}
else{
    echo "<script>
    alert('Kaydınız Silinemedi!);
    window.location.href = 'liste.php';
    </script>";
}
?>