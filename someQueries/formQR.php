<?php
    require_once("../phpqrcode/qrlib.php");
    $form_id = $_GET["form"];
    $path = "localhost/quequee/answer.php?form=".$form_id;
    QRcode::png("localhost/quequee/");
?>