<?php

include 'kayit.php';

$sil = $_GET["id"]; //Get metoduyla gelen id, $sil değişkenine atıyorum.
$islem = $baglan->query("delete from kisiler where id=$sil"); //Delete ile id'sine göre silme islemi gerçekleştiriyoruz.

if($islem){ //Sil dedikten sonra döngü oluşturuyoruz.
    echo "<script>
    alert('Kaydınız Silindi!);
    window.location.href = 'liste.php';
    </script>"; //Verimiz/kaydımız silindi ise ekrana mesaj vericek ve bizi liste.php dosyasına yönlendirecek.
}
else{
    echo "<script>
    alert('Kaydınız Silinemedi!);
    window.location.href = 'liste.php';
    </script>"; //Verimiz/kaydımız silinmedi ise ekrana 'Kaydınız Silinemedi!' mesajını vericek ve bizi yine liste.php dosyasına yönlendirecek.
}
?>