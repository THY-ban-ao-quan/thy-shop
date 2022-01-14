<?php
    $idKH = $_GET['idkh'];
    $idSM = $_GET['idsm'];
    $chon = $_GET['chon'];
    require_once('../../controllers/CartController1.php');
    $controller_obj = new CartController();
    $controller_obj->chon_sp($idKH, $idSM, $chon);
?>