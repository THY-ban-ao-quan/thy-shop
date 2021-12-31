<?php
require_once("./models/model.php");
class loaiSanPhamModel extends Model
{
    function getLoaiSanPham($id){
        $query = "select * from loaisanpham where idDM ='$id' ";
        $rs = $this->conn->query($query);
        $data = array();
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTenLoaiSanPham($id){
        $query = "select tenLSP from loaisanpham where idLSP ='$id' ";
        $rs = $this->conn->query($query)->fetch_assoc();
        return $rs['tenLSP'];
    }

    public function getIdDanhMuc($id)
    {
        $query = "select idDM from loaisanpham where idLSP ='$id' ";
        $rs = $this->conn->query($query)->fetch_assoc();
        return $rs['idDM'];
    }

    public function getAllLoaiSanPham()
    {
        $query = "select * from loaisanpham ";
        $rs = $this->conn->query($query);
        $data = array();
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }
}