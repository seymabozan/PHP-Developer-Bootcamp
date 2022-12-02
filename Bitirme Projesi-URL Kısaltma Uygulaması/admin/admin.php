<?php
require_once 'baglanti.php';
error_reporting(0);
session_start();
if ($_POST) {
    $admin = $_POST["admin"];
    $sifre = $_POST["sifre"];

    $sorgu = $baglan->query("SELECT * FROM admin WHERE (admin='$admin' && sifre='$sifre')");
    $kayit = $sorgu->num_rows;

    if ($kayit > 0) {
        setcookie("admin", "$admin", time() * 60 * 60);
        $_SESSION["giris"] = sha1(md5("var"));
        echo "<script>
        window.location.href='liste.php';
        </script>";
    } else {
        echo "<script>
        alert('HATALI ADMİN BİLGİSİ!');
        window.location.href='admin.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Kısaltma Admin</title>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            border: 0px;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            border-spacing: 0px;
            top: -250px;
        }

        #yonetim_giris_body {
            font-family: "Verdana", Lucida Grande, Tahoma, Arial, sans-serif;
            font-size: 13px;
        }

        #yonetim_giris_kapsayici {
            margin: 15% auto;
            width: 297px;
            height: 235px;
            padding: 37px 25px 0 25px;
            background: url('1.png');
        }

        #yonetim_giris_kapsayici input[type=text],
        #yonetim_giris_kapsayici input[type=password] {
            width: 190px;
            padding: 0 5px 0 5px;
            height: 46px;
            border: 1px solid #e1e1e1;
            margin-bottom: 12px;
            border-radius: 5px;
            color: #9e9696;
            float: left;
        }

        #yonetim_giris_kapsayici p {
            width: 90px;
            padding: 15px 5px 0 0;
            float: left;
            font-size: 13px;
        }

        #yonetim_giris_kapsayici input[type=submit] {
            width: 295px;
            height: 46px;
            border: 1px solid #2c87c5;
            margin-bottom: 12px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            color: #525b3d;
            background-color: #2c87c5;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
        }

        #yonetim_giris_kapsayici span {
            color: #990000;
        }

        #yonetim_giris_kapsayici a {
            color: #0000CC;
            text-decoration: underline;
        }

        .telif {
            padding: 3px;
            background: #000;
            color: #fff;
            transition: background 0.5s ease-in;
            text-decoration: none;
            position: absolute;
            right: 0px;
            bottom: 0px;
            font-weight: bold;
            border-radius: 3px 3px 0px 0px;
        }

        .telif:hover {
            background: gray;
            color: #ddd;
        }

        a {
            background: #2c87c5;
            font: bold 17px lato, arial;
            color: #fff;
            padding: 16px 116px;
            border-radius: 5px;
            letter-spacing: -1px;
            text-decoration: none;
            position: relative;
            right: -525px;
            font-size: 15px;
        }
    </style>
</head>
<body id="yonetim_giris_body" style="background-color: #f9f9f9">

    <form method="post" action="">
        <div id="yonetim_giris_kapsayici">
            <p>Kullanıcı Adı</p><input name="admin" type="text" required />
            <p>Şifre</p><input name="sifre" type="password" required />
            <input type="submit" value="Giriş Yap" />
        </div>
    </form>

    <a href="../index.php">Ana Sayfa</a>
    
</body>
</html>