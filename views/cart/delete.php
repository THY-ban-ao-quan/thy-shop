<?php
    $idKH = $_GET['idkh'];
    $idSM = $_GET['idsm'];
    require_once('../../controllers/CartController1.php');
    $controller_obj = new CartController();
    $controller_obj->delete_cart($idKH, $idSM);
?>