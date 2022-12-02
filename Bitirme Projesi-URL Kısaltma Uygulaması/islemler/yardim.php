<?php
if(__FILE__ == $_SERVER["SCRIPT_FILENAME"]) {
    echo "<script>window.location.href='../index.php';</script>";
}

error_reporting(0);

class yardim {
    
    static function yonlendir($url) {
        header("Location: $url");
    }

}

?>