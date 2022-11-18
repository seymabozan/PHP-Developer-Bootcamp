<?php

$baglan = new PDO("mysql:host=localhost;dbname=odev;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sorgu = $baglan->query("select * from kisiler");
$toplamkayit = $sorgu->rowCount();
echo "<table width='70%' border='1' align='center' style='border-collapse:collapse;height:125px;border-color:black'>
    <tr align='center'>
    <td><b>Adı Soyadı</b></td>
    <td><b>Telefon Numarası</b></td>
    <td><b>İşlem</b></td>
    </tr>";

while($satir = $sorgu->fetchObject()){
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