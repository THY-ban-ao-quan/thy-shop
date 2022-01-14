<?php
require_once("model.php");
class DonHang extends model
{
    function addDonHang($idKH, $tinhTrang)
    {
        $query = "INSERT INTO donhang(idKH, tinhTrang)
                VALUES ($idKH, $tinhTrang);";
        $this->conn->query($query);
    }
    function addChiTietDH($idDH, $idSM, $soLuong, $giaBan, $phanTramKM)
    {
        $query =  "INSERT INTO chitietdonhang(idDH, idSM, soLuong, giaBan, phanTramKM)
                VALUES ($idDH, $idSM, $soLuong, $giaBan, $phanTramKM);";
        $this->conn->query($query);
    }
    function getGioHang($idKH)
    {
        $query =  "SELECT giohang.idSM, sanpham.donGia, khuyenmai.phanTram, giohang.soLuong
                FROM giohang
                LEFT JOIN nguoidung ON giohang.idKH = nguoidung.idND
                LEFT JOIN size_mau ON giohang.idSM = size_mau.idSM
                LEFT JOIN sanpham ON size_mau.idSP = sanpham.idSP
                LEFT JOIN hinhanh ON sanpham.idSP = hinhanh.idSP AND size_mau.mau = hinhanh.mau
                LEFT JOIN chitietkhuyenmai ON sanpham.idSP = chitietkhuyenmai.idSP
                LEFT JOIN khuyenmai ON chitietkhuyenmai.idKM = khuyenmai.idKM
                WHERE nguoidung.idND = $idKH AND chon = 1
                GROUP BY giohang.idKH, giohang.idSM";
        $result = $this->conn->query($query);
        return $result;
    }
    function getMaDH()
    {
        $query =  "SELECT idDH
                    FROM donhang
                    ORDER BY idDH DESC
                    LIMIT 1;";
        $result = $this->conn->query($query);
        $dong = $result->fetch_assoc();
        return $dong['idDH'];
    }
    function delete_cart_tt()
    {
        $sql = "DELETE FROM giohang
                WHERE chon = 1;";
        mysqli_query($this->conn, $sql);
    }
}