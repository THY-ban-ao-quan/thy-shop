<?php
    $idKH = $_GET['idkh'];
    $idSM = $_GET['idsm'];
    $soLuong = $_GET['soluong'];
    require_once('../../controllers/CartController1.php');
    $controller_obj = new CartController();
    $controller_obj->update_cart($idKH, $idSM, $soLuong);
?>