<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
    echo "<script>window.location.href='../index.php';</script>";
}
error_reporting(0);
class baglanti {

    public $db;
    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=bootcamp_proje", "root", "");
    }
    
}
?>