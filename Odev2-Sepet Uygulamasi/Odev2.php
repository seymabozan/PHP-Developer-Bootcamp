<?php

session_start(); //Session start ile session başlatıyorum.
//error_reporting(0);

$adet = $_POST["deger"];
?>


<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sepet Uygulaması</title>
</head>

<body>
    <?php
    $urunler = array( //Burada bir dizi içerisinde ürünlerimin adını, fiyatını ve adet sayısını tanımlıyorum.
        array("urun" => "Ülker Çikolatalı Gofret 40 gr.", "fiyat" => "10", "no" => "u1"),
        array("urun" => "Eti Damak Kare Çikolata 60 gr.", "fiyat" => "20", "no" => "u2"),
        array("urun" => "Nestle Bitter Çikolata 50 gr.", "fiyat" => "20", "no" => "u3"),
    );
    echo "<form method='post' action='Odev2.php'>
        <table border='1' style='border-collapse: collapse; width: 42%;'>
        <tr style='height: 30px;'>
        <td>Ürün Adı</td>
        <td style='text-align: center;'>Ürün Fiyat</td>
        <td style='text-align: center;'>Adet</td>
        </tr>";

    foreach ($urunler as $urun) {
        echo "<tr style='height: 30px;'>
            <td >$urun[urun]</td>
            <td style='text-align: center;'>$urun[fiyat]</td>
            <td><input type='number' name='deger' style='border:solid;width:18%;position:relative;right:-85px' value='deger'></td>
            </tr>";
    }
    echo "</table>
        <br>
        <input type='submit' style='background-color: blue; color:white; border:1; border-color: royalblue; width:12%; height: 30px;' name='ekle' value='Ürünü Sepete Ekle'>
        </form>
        ";
    echo "<br><br><h3>Sepetiniz:</h3>";
    $sepeticerik = $_SESSION["urunlistesi"];
    echo "<table border='1' style='border-collapse: collapse; width: 42%;'>
        <tr style='height: 30px;'>
        <td>Ürün Adı</td>
        <td style='text-align: center;'>Adet</td>
        <td style='text-align: center;'>Toplam</td>
        </tr>";
        $sepettoplam = 0;
   
        foreach ($sepeticerik as $urunid => $urunadeti) {
            $urunsira = array_search($urunid, array_column($urunler, 'no'));
            $urunad = $urunler[$urunsira]["urun"];
            $urunfiyat = $urunler[$urunsira]["fiyat"];
            //$uruntoplam = $urunadeti * $urunfiyat;
            //$sepettoplam += $uruntoplam;
   
            echo "<tr>
            <td>$urunad</td>
            <td>urunadet</td>
            <td>uruntoplam ₺</td>
            </tr>";
         }
        echo "
        </table>";
    ?>
</body>

</html>