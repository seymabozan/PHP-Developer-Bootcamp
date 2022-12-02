<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
    echo "<script>window.location.href='../index.php';</script>";
}
error_reporting(0);

class islemler extends baglanti {
    
    public function sayibul($kod) {
        $kontrol = $this->db->prepare("SELECT * FROM url WHERE kisa_url = :kod");
        $kontrol->bindParam(":kod", $kod, PDO::PARAM_STR);
        $kontrol->execute();
        $sonuc = $kontrol->rowCount();
        return $sonuc;
    }

    public function bilgial($kod) {
        $kontrol = $this->db->prepare("SELECT * FROM url WHERE kisa_url = :kod");
        $kontrol->bindParam(":kod", $kod, PDO::PARAM_STR);
        $kontrol->execute();
        $sonuc = $kontrol->fetch(PDO::FETCH_ASSOC);
        return $sonuc;
    }
}
?>