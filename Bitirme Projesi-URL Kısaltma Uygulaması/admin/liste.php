<html>
<head>
    <style>
        #personel {
            width: 70%;
        }

        #personel td,
        #personel th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        #personel tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
    <title>URL Kısaltma Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: #f9f9f9"></body>
</html>

<?php

error_reporting(0);
require_once 'baglanti2.php';

echo "<html>
    <body>
    <form action='arama.php' method='post'>
    <input type='submit' name='ara' value='Arama' style='background: #2c87c5;
    font: bold 17px lato, arial;
    color: #fff;
    padding: 16px 26px;
    border: 0;
    border-radius: 3px;
    letter-spacing: -1px;
    text-decoration: none;
    position: relative;
    right: -590px;
    font-size: 15px;'>
    </form>
    </body>
    </html>";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<html><body>
    <form method='post' action='cikis.php'>
    <input type='submit' name='cikis' value='Çıkış Yap' style='background: #2c87c5;
    font: bold 17px lato, arial;
    color: #fff;
    padding: 15px 20px;
    border: 0;
    border-radius: 3px;
    letter-spacing: -1px;
    text-decoration: none;
    position: relative;
    right: -690px;
    font-size: 15px;
    bottom: 81px'>
    </form>
    </body></html>";

echo "<br><br>";

$sorgu = $baglanti->query("SELECT * FROM url");
$toplamkayit = $sorgu->rowCount();

echo "<link href='https://fonts.googleapis.com/css?family=Montserrat:100,300' rel='stylesheet'>
    <table align='center' style='border-collapse:collapse;height:125px;border-color:black;margin-block-start: -7em' id='personel'>
    <tr align='center'>
    <td><b>Kısa URL</b></td>
    <td><b>Uzun URL</b></td>
    <td><b>İşlem</b></td>
    </tr>";

while ($satir = $sorgu->fetchObject()) {
    echo "<tr align='center'>
    <td>$satir->kisa_url</td>
    <td>$satir->uzun_url</td>
    <td><a href='sil.php?id=$satir->id' style='text-decoration:none;color:black'><i class='fa-solid fa-trash-can'></i></a></td>
    </tr>";
}
echo "<td colspan='3' align='center'>Sistemde Toplam -$toplamkayit- Kayit Var</td>
    </table>";
?>