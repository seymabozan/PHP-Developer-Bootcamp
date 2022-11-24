<?php
require_once('islem.php');

$sorgu = $baglanti->query("SELECT * FROM kayit");
$toplamkayit = $sorgu->rowCount(); 

echo "<table width='70%' border='1' align='center' style='border-collapse:collapse;height:95px;border-color:black'>
    <tr align='center'>
    <td><b>Adı Soyadı</b></td>
    <td><b>TC Kimlik Numarası</b></td>
    <td><b>Durum</b></td>
    </tr>";

while($satir = $sorgu->fetchObject()) {
    echo "<tr align='center'>
    <td>$satir->adsoyad</td>
    <td>$satir->tckimlik</td>
    <td>$satir->durum</td>
    </tr>";
}

echo "</table>";
echo "<br><br>";
echo "<a href='index.php' style='float:right;padding-right:45%;text-decoration:none;'><b>YENİ KAYIT</b></a>";
?>