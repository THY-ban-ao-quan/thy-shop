<?php
require_once("model.php");
class Product extends Model
{
    function GetInfo($id) {
        $query = "SELECT tenSP, donGia, moTa FROM sanpham sp WHERE idSP = $id";
        return $this->conn->query($query)->fetch_assoc();
    }

    function GetColors($id) {
        $query = "SELECT
            sm.idSP,
            sm.mau,
            ha.linkAnh
        FROM
            size_mau sm
        JOIN hinhanh ha ON
            sm.idSP = ha.idSP AND sm.mau = ha.mau
        WHERE
            sm.idSP = $id
        GROUP BY
            mau";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function GetSizes($id, $color) {
        $query = "SELECT
            sm.idSM,
            sm.size,
            sm.soLuong
        FROM
            size_mau sm
        WHERE
            sm.idSP = $id
            AND sm.mau = '$color'";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function GetImages($id, $color) {
        $query = "SELECT
            ha.linkAnh
        FROM
            hinhanh ha
        WHERE
            ha.idSP = $id
            AND ha.mau = '$color'
        LIMIT 4";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function Search($keyword) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        WHERE sp.tenSP like '%$keyword%'
        AND sp.trangThai = '1'
        GROUP BY sp.idSP";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function FeaturedProducts($rank) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        JOIN size_mau sm on sm.idSP = sp.idSP
        JOIN chitietdonhang ct on ct.idSM = sm.idSM
        AND sp.trangThai = '1'
        AND ct.idSM IN (
            SELECT idSM FROM (
                SELECT (DENSE_RANK() OVER (ORDER BY  sum(soLuong) DESC)) rank, idSM, sum(soLuong) FROM `chitietdonhang`
                GROUP BY idSM
                ORDER BY sum(soLuong) DESC) hot
            WHERE hot.rank <= $rank)
        GROUP BY sp.idSP
        LIMIT $rank";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function MaxPrice() {
        $query = "SELECT MAX(donGia) donGia from sanpham";
        return $this->conn->query($query)->fetch_assoc();
    }

    function Categories($idDM) {
        $query = "SELECT  donGia from sanpham";
        return $this->conn->query($query)->fetch_assoc();
    }

    function Filter($idCate, $idDm, $sizes, $colors, $price1, $price2, $limit, $start, $sort) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        JOIN loaisanpham l ON l.idLSP = sp.idLSP
        JOIN size_mau sm ON sm.idSP = sp.idSP
        WHERE sp.trangThai = '1'";

        if($idCate != -1)
            $query .= " AND sp.idLSP = $idCate ";

        if($idDm != -1)
            $query .= " AND l.idDM = $idDm ";

        if(!empty($sizes)) {
            $query .= " AND (";
            foreach($sizes as $value) {
                if($sizes[0] != $value) $query.= " OR ";
                $query.= " sm.size = $value ";
            }
            $query .= " ) ";
        }

        if(!empty($colors)) {
            $query .= " AND (";
            foreach($colors as $value) {
                if($colors[0] != $value) $query.= " OR ";
                $query.= " sm.mau like '%$value%' ";
            }
            $query .= " ) ";
        }

        $query .= " AND sp.donGia BETWEEN $price1 AND $price2
        GROUP BY sp.idSP
        ORDER BY sp.donGia $sort, tenSP ASC
        LIMIT $start, $limit";

        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}