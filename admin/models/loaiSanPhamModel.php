<?php
require_once("./models/model.php");
class loaiSanPhamModel extends Model
{
    function getLoaiSanPhamByIdDM($id){
        $query = "select * from loaisanpham where idDM ='$id' and trangThai = 1";
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

    public function add($data){
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO loaisanpham ($f) VALUES ($v);";
        $rs = $this->conn->query($query);
        if ($rs == true) {
                setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$data['idDM']);
                
            } else {
                setcookie('msg', 'Thêm mới không thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$data['idDM'].'&act=add');
            }
    }

    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE loaisanpham SET  $v   WHERE idLSP = " . $data['idLSP'];   
        $rs = $this->conn->query($query);
        return $rs;
    }
    public function getLoaiSanPhamByIdLSP($idLSP)
    {
        $query = "select * from loaisanpham where idLSP = '$idLSP' ";
        $rs = $this->conn->query($query)->fetch_assoc();
        return $rs;
    }

}