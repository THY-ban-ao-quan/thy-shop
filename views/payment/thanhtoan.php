<?php
    $idKH = $_GET['idkh'];
    require_once('../../controllers/DonHangController.php');
    $controller_obj = new DonHangController();
    $controller_obj->thanhToan($idKH);
    echo "<script type='text/javascript'>alert('Đặt hàng thành công!');</script>";
    header("Location: ../cart/cart.php");
?>
