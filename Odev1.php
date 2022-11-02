<?php

$index = array(
    array("agil" => 5, "kapasite" => 150, "koyun" => 73),
    array("agil" => 4, "kapasite" => 160, "koyun" => 160),
    array("agil" => 3, "kapasite" => 135, "koyun" => 147)
);

echo "Toplam Ağıl: ".$index[0]["agil"]."<br>";
echo "Toplam Kapasite: ".$index[0]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[0]["koyun"]."<br><br>";

$agil = array("1. Agil" => 0, "2. Agil" => 0, "3. Agil" => 13, "4. Agil" => 30, "5. Agil" => 30);
$tersagil = array_reverse($agil);
if($index[0]["agil"]==5 && $index[0]["kapasite"]==150){
    foreach($tersagil as $agilsayisi => $kapasitesi){
        echo $agilsayisi.": ".$kapasitesi."<br>";
    }
}
else{
    echo "ÇIKTI HATASI";
}

echo "<hr>";

echo "Toplam Ağıl: ".$index[1]["agil"]."<br>";
echo "Toplam Kapasite: ".$index[1]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[1]["koyun"]."<br><br>";

$agil2 = array("1. Agil" => 40, "2. Agil" => 40, "3. Agil" => 40, "4. Agil" => 40);
$tersagil2 = array_reverse($agil2);
if($index[1]["agil"]==4 && $index[1]["kapasite"]==160){
    foreach($tersagil2 as $agilsayisi2 => $kapasitesi2){
        echo $agilsayisi2.": ".$kapasitesi2."<br>";
    }
}
else{
    echo "ÇIKTI HATASI";
}

echo "<hr>";

echo "Toplam Ağıl: ".$index[2]["agil"]."<br>";
echo "Toplam Kapasite: ".$index[2]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[2]["koyun"]."<br><br>";
$disarida_kalan= $index[2]["koyun"] - $index[2]["kapasite"]." Koyun";

$agil3 = array("1. Agil" => 45, "2. Agil" => 45, "3. Agil" => 45);
$tersagil3 = array_reverse($agil3);
if($index[2]["agil"]==3 && $index[2]["kapasite"]==135){
    foreach($tersagil3 as $agilsayisi3 => $kapasitesi3){
        echo $agilsayisi3.": ".$kapasitesi3."<br>";
    }
    echo "<br>Dışarıda Kalan: $disarida_kalan";
}
else{
    echo "ÇIKTI HATASI";
}

/*Tamamlamış olduğum bu uygulamada Ağıl sayısı, Ağıl kapasitesi ve Toplam koyun sayısıyla ağıllara koyun yerleştirme uygulaması yaptım.
Bu uygulamada dizileri, dizi değişkenlerini, If-Else kontrol yapılarını kullandım.
İlk olarak agil sayısı, agıl kapasitesi ve toplam koyun sayısı için çoklu boyutlu bir dizi oluşturdum.
If-Else yapsısı ile de ağıl sayısı ile ağıl kapasitesini kontrol ediyorum.
Agıllara yerleşen koyun sayısını ekrana yazmak içinse farklı bir dizi oluşturdum ve bu diziyi ters çevirip sondan ekrana basa bilmesi için array_reverse() fonksiyonunu kullandım.
Aynı zamanda dizileri ekrana bastırmak içinse foreach döngüsünü kullandım.*/
?>
