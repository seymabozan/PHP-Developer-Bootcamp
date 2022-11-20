<?php

include("kayit.php");
$sorgu = $baglan->query("select * from kisiler"); //Query ile select * from ile tüm tabloya/tüm bilgilere erişiyorum.
$toplamkayit = $sorgu->rowCount(); //RowCount() ile tabloda kaç tane kayıt olduğuna erişiyorum.
echo "<table width='70%' border='1' align='center' style='border-collapse:collapse;height:125px;border-color:black'>
    <tr align='center'>
    <td><b>Adı Soyadı</b></td>
    <td><b>Telefon Numarası</b></td>
    <td><b>İşlem</b></td>
    </tr>";

while($satir = $sorgu->fetchObject()){ //While tablodaki değerleri/verileri fetchObject() ile döngüye sokup ekrana yazdırıyorum.
    echo "<tr align='center'>
    <td>$satir->adsoyad</td>
    <td>$satir->telefon</td>
    <td><a href='sil.php?id=$satir->id' style='text-decoration:none;color:black'>Sil</a></td>
    </tr>";
}
echo "<td colspan='3' align='center'>Sistemde Toplam -$toplamkayit- Kayit Var</td>
</table>";
echo "<br><br>";
echo "<a href='index.html' style='float:right;padding-right:45%;text-decoration:none;'>YENİ KAYIT</a>";
?>
