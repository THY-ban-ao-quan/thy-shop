<?php
    $idKH = $_GET['idkh'];
    require_once('../../controllers/DonHangController.php');
    $controller_obj = new DonHangController();
    $controller_obj->thanhToan($idKH);
    header("Location: ../../index.php");
?>