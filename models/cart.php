<?php
require_once("model.php");
class Cart extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from SanPham where MaSP = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    function list_cart($id)
    {
        $query =  "SELECT giohang.idKH, giohang.idSM, linkAnh, tenSP, size_mau.size, size_mau.mau, sanpham.donGia, khuyenmai.phanTram, giohang.soLuong
                    FROM giohang
                    LEFT JOIN nguoidung ON giohang.idKH = nguoidung.idND
                    LEFT JOIN size_mau ON giohang.idSM = size_mau.idSM
                    LEFT JOIN sanpham ON size_mau.idSP = sanpham.idSP
                    LEFT JOIN hinhanh ON sanpham.idSP = hinhanh.idSP AND size_mau.mau = hinhanh.mau
                    LEFT JOIN chitietkhuyenmai ON sanpham.idSP = chitietkhuyenmai.idSP
                    LEFT JOIN khuyenmai ON chitietkhuyenmai.idKM = khuyenmai.idKM
                    WHERE nguoidung.idND = $id
                    GROUP BY giohang.idKH, giohang.idSM";
        $result = $this->conn->query($query);
        return $result;
    }
    function update_cart($idKH, $idSM, $donvi)
    {
        $sql = "UPDATE giohang
                SET soLuong = soLuong + $donvi
                WHERE idKH = '$idKH' AND idSM = '$idSM';";
        if(mysqli_query($this->conn, $sql)){
            echo "<script type='text/javascript'>alert('Cập nhật thành công');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Cập nhật không thành công');</script>";
        }
    }
    function delete_cart($idKH, $idSM)
    {
        $sql = "DELETE FROM giohang
                WHERE idKH = '$idKH' AND idSM = '$idSM';";
        mysqli_query($this->conn, $sql);
    }
    
    function chon_sp($idKH, $idSM, $chon) {
        $sql = "UPDATE giohang
                SET chon = $chon
                WHERE idKH = '$idKH' AND idSM = '$idSM';";
        mysqli_query($this->conn, $sql);
    }
    function chon_tatca($chon) {
        $sql = "UPDATE giohang
                SET chon = $chon";
        mysqli_query($this->conn, $sql);
    }

    function list_payment($id){
        $query =  "SELECT linkAnh, tenSP, size_mau.size, size_mau.mau, sanpham.donGia, khuyenmai.phanTram, giohang.soLuong
                    FROM giohang
                    LEFT JOIN nguoidung ON giohang.idKH = nguoidung.idND
                    LEFT JOIN size_mau ON giohang.idSM = size_mau.idSM
                    LEFT JOIN sanpham ON size_mau.idSP = sanpham.idSP
                    LEFT JOIN hinhanh ON sanpham.idSP = hinhanh.idSP AND size_mau.mau = hinhanh.mau
                    LEFT JOIN chitietkhuyenmai ON sanpham.idSP = chitietkhuyenmai.idSP
                    LEFT JOIN khuyenmai ON chitietkhuyenmai.idKM = khuyenmai.idKM
                    WHERE nguoidung.idND = $id AND chon = 1
                    GROUP BY giohang.idKH, giohang.idSM";
        $result = $this->conn->query($query);
        return $result;
    }
}