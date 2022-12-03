<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Kısaltma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method='' action='admin/admin.php'>
        <input type='submit' name='cikis' value='Admin Paneli' style='background: #2c87c5;
        font: bold 17px lato, arial;color: #fff;padding: 15px 20px;border: 0;border-radius: 3px;letter-spacing: -1px;
        text-decoration: none;position: relative;right: -1200px;font-size: 15px;bottom: -5px'>
    </form>
    <header>
        <div id="logo"><a href="index.php" class="logo">URL Kısaltma</a></div>
    </header>

    <main>
        <section id="urlbox">
            <h1>Kısaltılacak URL'yi yapıştırın</h1>
            <form method="post" action="index.php">
                <div id="formurl" style="margin-bottom:20px;">
                    <input type="text" name="u" id="url" placeholder="Bağlantıyı buraya girin">
                    <div id="formbutton">
                        <button>URL Kısalt</button>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <div id="sonuc"></div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $.ajax({ //$.get veya $.post kullanılabilir!
                    cache: false,
                    type: "POST",
                    url: "index.php",
                    data: "url=" + $("#url").val(),
                    success: function (result) {
                        $("#sonuc").html(result);
                    },
                    error: function (hxr) {
                        $("#sonuc").html("Hata: " + xhr.status + " " + xhr.statusText);
                    }
                })
            });
        });
    </script>

</body>
</html>

<?php
error_reporting(0);
define("URL", "http://");
require_once 'islemler/baglanti.php';
$baglanti = new baglanti();

if($_POST) {
    $url = strip_tags($_POST["u"]);
    if($url != "") {
        if(filter_var($url, FILTER_VALIDATE_URL)) {

            $kontrol = $baglanti->db->prepare("SELECT FROM url WHERE uzun_url = :url");
            $kontrol->bindParam(":url", $url, PDO::PARAM_STR);
            $kontrol->execute();
            $sonuc = $kontrol->rowCount();
            if($sonuc == 0){
                $kod = md5(uniqid());
                $kisakod = substr($kod, 0, 5);
                $kisaKod1 = URL.$kisakod;
                $ekle = $baglanti->db->prepare("INSERT INTO url(id,uzun_url,kisa_url) VALUES (?, ?, ?)");
                $calistir = $ekle->execute(array(NULL, $url, $kisaKod1));
                if($calistir) {
                    echo "<div class='goster' style='text-align: center;margin-block-start: 2.5em;font-size:22px'>
                    <b>Kısaltılmış URL: </b>".$kisaKod1."</div>";
                }
                else{
                    echo "<script>
                    alert('Bir Hata Oluştu');
                    window.location.href = 'index.php';
                    </script>";
                }
            }
            else{
                $bul = $baglanti->db->prepare("SELECT * FROM url WHERE uzun_url = :url");
                $bul->bindParam(":url", $url, PDO::PARAM_STR);
                $bul->execute();
                $sonuc = $bul->fetch(PDO::FETCH_ASSOC);
                echo "<div class='goster' style='text-align: center;margin-block-start: 2.5em;font-size:22px'>
                    <b>Kısaltılmış URL: </b>".$kisaKod1."</div>";
            }
        }
        else {
            echo "<script>
                alert('HATA: Geçerli Bir URL Giriniz!');
                window.location.href = 'index.php';
                </script>";
        }
    }
    else{
        echo "<script>
        alert('HATA: Boş Alan!');
        window.location.href = 'index.php';
        </script>";
    }
}
?>
