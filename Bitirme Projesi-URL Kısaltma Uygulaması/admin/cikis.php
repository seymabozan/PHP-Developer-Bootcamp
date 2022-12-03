<?php
error_reporting(0);
include("baglanti.php");

session_destroy();
setcookie("giris","",time()-1);

echo "<script>
    alert('ADMİN PANELİNDEN ÇIKIŞ YAPTINIZ!');
    window.location.href='admin.php';
    </script>";
?>
