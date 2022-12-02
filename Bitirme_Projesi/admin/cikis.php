<?php
error_reporting(0);
include("baglanti.php");

session_destroy();
setcookie("giris","",time()-1);

echo "<script>
    window.location.href='admin.php';
    </script>";
?>