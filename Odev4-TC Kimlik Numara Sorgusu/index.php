<?php
require_once('islemclass.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TC Kimlik Numara Sorgusu</title>
</head>

<body style="text-align:center;padding:10px">
    <form method="post" action="index.php">
        <b>Adı Soyadı:</b><br>
        <input type="text" name="adsoyad" style="width:14%;height:20px" required><br><br>
        <b>TC Kimlik Numarası:</b><br>
        <input type="text" name="tcno" style="width:14%;height:20px" required><br><br>
        <input type="submit" name="kayıt" value="Doğrula ve Kaydet" style="background-color:royalblue; border-color:royalblue;color:white;height:35px">
    </form>
    <br><br>
    <a href="kayitliste.php" style="text-decoration:none"><b>KAYIT LİSTESİ</b></a>

    <?php
    if($_POST) {
        $adsoyad = $_POST["adsoyad"];
        $tckimlik = $_POST["tcno"];
        $durum = $_GET["durum"];
        
        $tc = new tcKimlik($tckimlik);
        
        $sonuc = $tc->dogrulama($adsoyad,$durum);

        if($sonuc) {
            $sorgu = $baglanti->prepare("INSERT INTO kayit VALUES(?, ?, 'TC Kimlik Geçerli')");
            $sorgu->bindParam(1, $adsoyad, PDO::PARAM_STR);
            $sorgu->bindParam(2, $tckimlik, PDO::PARAM_STR);
            $sorgu->bindParam(3, $durum, PDO::PARAM_STR);
            echo "<script>
            alert('TC Kimlik Geçerli');
            window.location.href = 'index.php';
            </script>";
        }
        else {
            $sorgu = $baglanti->prepare("INSERT INTO kayit VALUES(?, ?, 'TC Kimlik Geçersiz')");
            $sorgu->bindParam(1, $adsoyad, PDO::PARAM_STR);
            $sorgu->bindParam(2, $tckimlik, PDO::PARAM_STR);
            $sorgu->bindParam(3, $durum, PDO::PARAM_STR);
            echo "<script>
            alert('TC Kimlik Geçersiz');
            window.location.href = 'index.php';
            </script>";
        }
    }
    ?>
</body>
</html>
