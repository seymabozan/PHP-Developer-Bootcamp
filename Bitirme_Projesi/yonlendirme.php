<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
    echo "<script>
    window.location.href='index.php';
    </script>";
}
error_reporting(0);
require_once 'islemler/baglanti.php';
require_once 'islemler/yardim.php';
require_once 'islemler/islemler.php';
require_once 'index.php';

$baglanti = new baglanti();
$islem = new islemler();

$kod = strip_tags($_GET["kisa_url"]);

if($kod != "") {
    $sonuc = $islem->sayibul($kod);
    if($sonuc != 0) {
        $bilgi = $islem->bilgial($kod);
        helper::yonlendir($bilgi["kisa_url"]);
    }
    else{
        helper::yonlendir("http:://");
    }
}
else{
    /*echo "<script>
    alert('Kod Yok');
    window.location.href = 'index.php';
    </script>";*/
}
?>