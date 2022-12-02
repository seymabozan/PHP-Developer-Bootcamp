<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
  echo "<script>
  window.location.href='../index.php';
  </script>";
}

error_reporting(0);

try {
    $baglanti = new PDO("mysql:host=localhost;dbname=bootcamp_proje", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
  echo $e->getMessage();                         
}
?>