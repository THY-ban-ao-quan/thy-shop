<?php
require_once("../../models/donhang.php");
// require_once("models/donhang.php");
class DonHangController
{
    var $donhang_model;
    public function __construct()
    {
        $this->donhang_model = new donhang();
    }
    function addDonHang($idKH, $tinhTrang)
    {
        $this->donhang_model->addDonHang($idKH, $tinhTrang);
    }
    function addChiTietDH($idDH, $idSM, $soLuong, $giaBan, $phanTramKM)
    {
        $this->donhang_model->addChiTietDH($idDH, $idSM, $soLuong, $giaBan, $phanTramKM);
    }
    function getGioHang($idKH)
    {
        return $this->donhang_model->getGioHang($idKH);
    }
    function getMaDH()
    {
        return $this->donhang_model->getMaDH();
    }
    
    function delete_cart_tt()
    {
        $this->donhang_model->delete_cart_tt();
    }
    function thanhToan($idKH)
    {
        $this->donhang_model->addDonHang($idKH, 1);
        $idDH = $this->donhang_model->getMaDH();
        $result = $this->donhang_model->getGioHang($idKH);
        while($row=mysqli_fetch_array($result)) {
            if(empty($row['phanTram'])) $phanTramKM = 0;
            $this->donhang_model->addChiTietDH($idDH, $row['idSM'], $row['soLuong'], $row['donGia'], $phanTramKM);
        }
        $this->donhang_model->delete_cart_tt();
    }
}