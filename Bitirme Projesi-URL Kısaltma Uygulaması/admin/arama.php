<?php
error_reporting(0);
require_once 'baglanti2.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>URL Kısaltma Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
</head>

<?php
$i = 0;
if ($_GET) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM url WHERE `kisa_url`  LIKE '%$search%'";
    $stmt = $baglanti->query($sql);
}
?>

<body style="background-color: #f9f9f9">

    <form action='liste.php' method='post'>
        <input type='submit' name='ara' value='Liste' style='background: #2c87c5;
        font: bold 17px lato, arial;color: #fff;padding: 16px 26px;border: 0;border-radius: 3px;letter-spacing: 0px;
        text-decoration: none;position: relative;right: -558px;font-size: 15px;bottom: -2px'>
    </form>
    <form method='post' action='cikis.php'>
        <input type='submit' name='cikis' value='Çıkış Yap' style='background: #2c87c5;
        font: bold 17px lato, arial;color: #fff;padding: 15px 20px;border: 0;border-radius: 3px;letter-spacing: -1px;
        text-decoration: none;position: relative;right: -650px;font-size: 15px;bottom: 47px'>
    </form>

    <form class="form search-bar dropdown show" method="GET" style="margin: -1rem;width:70%;right:-215px">

        <div class="input-group form-group">

            <div class="input-group-prepend">
                <label class="input-group-text" for="search1">Arama:</label>
            </div>

            <input id="search1" type="search" name="search" class="form-control" value="Aramak istediğiniz URL...">

            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" id="searchBtn1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: #2c87c5;"><i title="Submit Search" class="fa fa-search"></i></button>
            </div>

        </div>

        <?php if ($_GET) { ?>
            <div class="dropdown-menu w-100 mt-2" aria-labelledby="searchBtn1">

                <?php if ($stmt->rowCount() < 1) { ?>
                    <div class="dropdown-item">
                        <p class="text-center">Sonuç bulunamadı</p>
                    </div>

                <?php } ?>

                <ul class="list-group">

                    <?php foreach ($stmt as $row) {
                        $i++ ?>

                        <li class="list-group-item">
                            <?php echo $i . "-" . $row['kisa_url']; ?>
                        </li>

                    <?php } ?>
                </ul>

            </div>

        <?php } else {  ?>

            <div class="alert alert-danger mt-5" role="alert" style="color:#000000;background-color:#c6ddfe;border-color:#c6ddfe;border-radius:17px;bottom:20px">
                Arama Çubuğuna Bir URL Giriniz
            </div>

        <?php } ?>

    </form>
    </div>

    <script>
        let searchBtn = document.getElementById('search1');
        searchBtn.addEventListener('click', () => {
            searchBtn.value = "";

        })
    </script>
    
</body>
</html>