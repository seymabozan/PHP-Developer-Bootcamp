<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sepet Uygulaması</title>
</head>
<body>
    <form method="post" action="Odev2.php"> <!-- İlk önce html formatında bir form oluşturuyorum post metoduyla ve aynı sayfaya yönlendiriyorum -->
        <table border="1" style="border-collapse: collapse; width: 42%;"> <!-- Form içinde daha sonra bir table tanımlıyorum -->
            <tr style="height: 30px;"> <!-- Table içine dört satır oluşturuyorum ve bu <tr> içinde birer input tanımlayıp değer girmelerini istiyorum --> 
                <td><b>Ürün Adı</b></td>
                <td style="text-align: center;"><b>Ürün Fiyatı</b></td>
                <td style="text-align: center;"><b>Adet</b></td>
            </tr>
            <tr style="height: 30px;">
                <td>Ülker Çikolatalı Gofret 40 gr.</td>
                <td style="text-align: center;">10 TL</td>
                <td><input style="border:solid;width:18%;position:relative;right:-85px" type="number" name="adet1"></td>
            </tr>
            <tr style="height: 30px;">
                <td>Eti Damak Kare Çikolata 60 gr.</td>
                <td style="text-align: center;">20 TL</td>
                <td><input style="border:solid;width:18%;position:relative;right:-85px" type="number" name="adet2"></td>
            </tr>
            <tr style="height: 30px;">
                <td>Nestle Bitter Çikolata 50 gr.</td>
                <td style="text-align: center;">20 TL</td>
                <td><input style="border:solid;width:18%;position:relative;right:-85px" type="number" name="adet3"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="sepetekle" value="Ürünü Sepete Ekle" style="background-color: blue; color:white; border:1; border-color: royalblue; width:12%; height: 30px;"> <!-- Table kapattıktan sonra başka submit özelliğiyle bir input oluşturuyorum --> 
    </form>
    <br><br>
</body>
</html>
<?php
if ($_POST) { //Burada artık post ile gelen değer varmı onu kontrol ediyorum.
    session_start(); //Session start ile session başlatıyorum.
    $urunler = array( //Burada bir dizi içerisinde ürünlerimin adını, fiyatını ve adet sayısını tanımlıyorum.
        array("urun1" => "Ülker Çikolatalı Gofret 40 gr.", "fiyat1" => 10, "adet1" => ''),
        array("urun2" => "Eti Damak Kare Çikolata 60 gr.", "fiyat2" => 20, "adet2" => ''),
        array("urun3" => "Nestle Bitter Çikolata 50 gr.", "fiyat3" => 20, "adet3" => ''),
    );

    $urunler[0]["adet1"] = $_POST["adet1"]; //HTML içinde formda tanımladığım name'leri burada başka bir değişkene atıyorum 
    $urunler[1]["adet2"] = $_POST["adet2"];
    $urunler[2]["adet3"] = $_POST["adet3"];
    $adet1 = $urunler[0]["adet1"];
    $adet2 = $urunler[1]["adet2"];
    $adet3 = $urunler[2]["adet3"];

    if ($adet1 < 0 || $adet2 < 0 || $adet3 < 0) { //Burada eksi(-) değer girdiğimiz zaman hata verip tekrar en başa dönmesi için koşul oluşturdum
        echo "<script>
            alert('Hatalı Girdi Yaptınız. Lütfen Dikkat Ediniz!');
            window.top.location='Odev2.php';
            </script>";
        die();
    } elseif ($adet1 == "" || $adet2 == "" || $adet3 == "") { //Burada ise herhangi bir değer girilmediğinde en az 0(sıfır) değerinin girilmesini istedim
        echo "<script>
            alert('Eksik Bilgi Girdiniz En az 0(Sıfır) Değerini Giriniz.');
            window.top.location='Odev2.php';
            </script>";
        die();
    }

    $toplam = $adet1 * 10; //Burada her bir ürünün ayrı ayrı satıldığı adet ile çarparak kaç TL tuttuğunu hesapladım.
    $toplam2 = $adet2 * 20;
    $toplam3 = $adet3 * 20;
    $sonuc = $toplam + $toplam2 + $toplam3; //Toplam fiyat içinse her bir ürünün toplam değerlerini toplayıp $sonuc değişkenine atatdım


    $_SESSION["urunlistesi"] = $urunler; //Burada urunlistesi adlı bir session oluşturuyorum ve bu sessionu da $urunler dizisine eşitliyorum
    echo"
    <h3><b>Sepetiniz:</b></h3>
    <table border='1' style='border-collapse: collapse; width: 42%;'>
        <tr style='height: 30px;'>
            <td><b>Ürün Adı</b></td>
            <td style='text-align: center;'><b>Adet</b></td>
            <td style='text-align: center;'><b>Toplam</b></td>
        </tr>
        <tr style='height: 30px;'>
                <td>Ülker Çikolatalı Gofret 40 gr.</td>
                <td style='text-align: center;'>$adet1</td>
                <td style='text-align: center;'>$toplam TL</td>
        </tr>
        <tr style='height: 30px;'>
                <td>Eti Damak Kare Çikolata 60 gr.</td>
                <td style='text-align: center;'>$adet2</td>
                <td style='text-align: center;'>$toplam2 TL</td>
        </tr>
        <tr style='height: 30px;'>
                <td>Nestle Bitter Çikolata 50 gr.</td>
                <td style='text-align: center;'>$adet3</td>
                <td style='text-align: center;'>$toplam3 TL</td>
        </tr>
        <tr style='height: 30px;'>
                <td colspan='2'>Toplam Fiyat</td>
                <td style='text-align: center;'>$sonuc TL</td>
        </tr>
    </table>"; /* Son olarak da echo ile sepet için değerler girdikten sonra sepetin son halini ekrana yazdırmasını istedim 
                ve burada ürün adını, kaç adet satıldığını, kaç TL tuttuğunu yazdıktan sonra en son da toplam fiyatı yazdırdım */
}
?>
