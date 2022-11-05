<?php

$index = array(
    array("agil" => 5, "agilkapasite" => 30, "kapasite" => 150, "koyun" => 73),
    array("agil" => 4, "agilkapasite" => 40, "kapasite" => 160, "koyun" => 160),
    array("agil" => 3, "agilkapasite" => 35, "kapasite" => 105, "koyun" => 145)
);

echo "Toplam Ağıl: ".$index[0]["agil"]."<br>";
echo "Ağıl Kapasitesi: ".$index[0]["agilkapasite"]."<br>";
echo "Toplam Kapasite: ".$index[0]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[0]["koyun"]."<br><br>";

for($i=$index[0]["agil"]; $i>=1; $i--){
    if($index[0]["koyun"] >= $index[0]["agilkapasite"]){
    echo "$i. Agil: ".$index[0]["agilkapasite"]."<br>";
    }
    else{
        if($index[0]["koyun"] >= 0){
            echo "$i. Agil: ".$index[0]["koyun"]."<br>";
        }
        else{
            echo "$i. Agil: 0"."<br>";   
        }
    }
    $index[0]["koyun"] = $index[0]["koyun"] - $index[0]["agilkapasite"];
};

echo "<br><hr><br>";

echo "Toplam Ağıl: ".$index[1]["agil"]."<br>";
echo "Ağıl Kapasitesi: ".$index[1]["agilkapasite"]."<br>";
echo "Toplam Kapasite: ".$index[1]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[1]["koyun"]."<br><br>";

for($i=$index[1]["agil"]; $i>=1; $i--){
    if($index[1]["koyun"] >= $index[1]["agilkapasite"]){
    echo "$i. Agil: ".$index[1]["agilkapasite"]."<br>";
    }
};

echo "<br><hr><br>";

echo "Toplam Ağıl: ".$index[2]["agil"]."<br>";
echo "Ağıl Kapasitesi: ".$index[2]["agilkapasite"]."<br>";
echo "Toplam Kapasite: ".$index[2]["kapasite"]."<br>";
echo "Toplam Koyun: ".$index[2]["koyun"]."<br><br>";

for($i=$index[2]["agil"]; $i>=1; $i--){
    if($index[2]["koyun"] >= $index[2]["agilkapasite"]){
    echo "$i. Agil: ".$index[2]["agilkapasite"]."<br>";
    }
};

$kalankoyun = $index[2]["koyun"] - $index[2]["kapasite"];

if($kalankoyun > 0){
    echo "<br> Kalan Koyun: $kalankoyun";
}

/*Tamamlamış olduğum bu uygulamada Ağıl sayısı, Ağıl kapasitesi, Kapasite ve Toplam koyun sayısıyla ağıllara koyun yerleştirme uygulaması yaptım.
Bu uygulamada dizileri, for döngülerini, If-Else kontrol yapılarını kullandım.
İlk olarak ağıl sayısı, ağıl kapasitesi, kapasite ve toplam koyun sayısı için çok boyutlu bir dizi oluşturdum.
Daha sonra for döngüleri ile ağılları tersten ekrana yazdırdım. For döngüleri içinde if-else ile ağıl kapasitelerini ağıl karşılıklarına yazdırdım
ve boş ağıl kalırsa kapasite karşılığına sıfır(0) yazdırmasını istedim. For döngüsünün sonunda kalan koyunu kontrol etmek için koyun sayısından ağıl kapasitesini çıkarıp
yeni değeri tekrar koyuna atadım. Son olarak kalan koyun varsa koyun sayısından kapasiteyi çıkarıp onu $kalankoyuna atadım ve kalan koyun olursa bunu da ekrana yazdırmasını istedim.*/

/* Hocam dersten sonra projede birkaç eksiğim ve yanlışım olduğunu gördüm. O yüzden tekrar güncellemek istedim projeyi ve yanlış yaptığım kısımları düzelttim.*/
?>
