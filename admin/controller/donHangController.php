<?php
require_once('./models/donHangModel.php');

class donHangController
{
    var $dh_model;
    public function __construct()
    {
        $this->dh_model = new DonHangModel();
    }

    public function getAllDonHang()
    {
        $act = isset($_GET['act']) ? $_GET['act'] : "";
        $data =  array();
        if ($act != "") {
            if ($act == "daduyet") {
                $data = $this->dh_model->getAllDonHangDaDuyet();
            }
            if ($act == "chuaduyet") {
                $data = $this->dh_model->getAllDonHangChuaDuyet();
            }
        } else {
            $data = $this->dh_model->getAllDonHang();
        }

        return $data;
    }

    function getDonHangById($id)
    {
        return $this->dh_model->getDonHangById($id);
    }
    public function getChiTietDonHangByIdDH()
    {
        $idDH = $_GET['id'];
        $data =  array();
        $data = $this->dh_model->getChiTietDonHangByIdDH($idDH);
        return $data;
    }

    public function duyetonHang()
    {
        $this->dh_model->duyetonHang($_GET['id']);
        header('Location: ?mod=donhang');
    }

    public function countDonHang()
    {
        return $this->dh_model->countDonHang();
    }

    public function tongDoanhThu()
    {
        return $this->dh_model->tongDoanhThu();
    }

    public function countDaDuyet()
    {
        return $this->dh_model->countDaDuyet();
    }

    public function countChuaDuyet()
    {
        return $this->dh_model->countChuaDuyet();
    }

    public function doanhThuTheoThang()
    {
        return $this->dh_model->doanhThuTheoThang();
    }

    public function getAllDonHangDaDuyet()
    {
        return $this->dh_model->getAllDonHangDaDuyet();
    }

    public function getAllDonHangChuaDuyet()
    {
        return $this->dh_model->getAllDonHangChuaDuyet();
    }
}
