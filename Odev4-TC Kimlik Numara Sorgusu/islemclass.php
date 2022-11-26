<?php
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=odev", "root", "");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die($e->getMessage());
}

/*
* İlk olarak TC Kimlik No'su 11 haneli olmalı.
* İlk hanedeki rakam sıfır(0) olamaz.
* 1,3,5,7,9. yani tek sayıların bulunduğu hanelerdeki sayıları topluyoruz ve 7 ile çarpıyoruz. 
* Çıkan sonucu 2,4,6,8. çift sayıların bulunduğu hanelerdeki sayılar toplamından ile birlikte çıkartıyoruz.
* Çıkan sonuctan geriye kalan sayının 10ʹa göre modu 10. haneye eşittir..
* 1,2,3,4,5,6,7,8,9 ve 10. hanelerin toplamının 10ʹa göre modu 11. haneye eşittir.
*/

class tcKimlik {
    public $tckimlik;

    function __construct($tckimlik) {
        if(strlen($tckimlik) != 11) {
            return false;
        }
        if(strstr($tckimlik, '.') || strstr($tckimlik, ',')) {
            return false;
        }
        $this -> tckimlik = (double)$tckimlik;
    }

    public function algoritmaKontrol() {

        $tekSayiToplami = 0;
        $ciftSayiToplami = 0;
        
        if(substr($this->tckimlik, 0, 1) == 0){
            return false;
        }

        for($i=0; $i<=8; $i++) {
            if(($i%2) == 0) {
                $tekSayiToplami += substr($this->tckimlik, $i, 1);
            }
            else{
                $ciftSayiToplami += substr($this->tckimlik, $i, 1);
            }
        }

        $onuncuRakam = ((($tekSayiToplami * 7) + 10) - $ciftSayiToplami) % 10;
        if($onuncuRakam != substr($this->tckimlik, 8, 1)) {
            return false;
        }

        $onbirinciRakam = ($tekSayiToplami + $ciftSayiToplami + $onuncuRakam) % 10;
        if($onbirinciRakam != substr($this->tckimlik, 9, 1)) {
            return false;
        }

        return true;
    }

    public function dogrulama($adsoyad,$durum) {
        if(!$this->algoritmaKontrol()) {
            return false;
        }

        $kayitlar = array(
            'AdSoyad' => $this->$adsoyad,
            'TCKimlikNo' => $this->tckimlik,
            'Durum' => $this->$durum 
        );
    }
}
?>
