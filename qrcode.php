<?php
    include "phpqrcode/qrlib.php" ;
    $content = "http://www.etutorialspoint.com/" ;
    QRcode::png($content) ;
?>