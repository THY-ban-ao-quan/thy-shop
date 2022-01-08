<?php

require_once('./models/model.php');
class DonHangModel extends Model
{
    function getAllDonHang()
    {
        $sql = "select * from donhang ";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getDonHangById($id)
    {
        $sql = "select * from donhang where idDH = '$id'";
        $rs = $this->conn->query($sql)->fetch_assoc();

        return $rs;
    }

    public function getChiTietDonHangByIdDH($idDH)
    {
        $sql = "select * from chitietdonhang where idDH = '$idDH' ";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function duyetonHang($idDH)
    {
        $tt = 0;
        $donHang = $this->getDonHangById($idDH);
        if ($donHang['tinhTrang'] == 1) {
            $tt = 0;
        } else {
            $tt = 1;
        }
        $sql = "update donhang set tinhTrang = '$tt' where idDH = '$idDH' ";
        $this->conn->query($sql);
    }

    public function countDonHang()
    {
        $query = "select * from donhang ";
        $rs = $this->conn->query($query);
        return $rs->num_rows;
    }

    public function tongDoanhThu()
    {
        $sql = "select * from chitietdonhang";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        $tong = 0;
        foreach ($data as $d) {
            $tong += $d['soLuong'] * $d['giaBan'] * (100 - $d['phanTramKM']) / 100;
        }
        return $tong;
    }

    public function countDaDuyet()
    {
        $query = "select * from donhang where tinhTrang = 1 ";
        $rs = $this->conn->query($query);
        return $rs->num_rows;
    }

    public function countChuaDuyet()
    {
        $query = "select * from donhang where tinhTrang = 0 ";
        $rs = $this->conn->query($query);
        return $rs->num_rows;
    }

    public function doanhThuTheoThang()
    {
        $date = getdate();
        $nam = $date['year'];
        $query = "SELECT MONTH(d.ngayDatHang) as thang , SUM(c.soLuong*c.giaBan) as tong
                    FROM chitietdonhang as c, donhang as d
                    WHERE YEAR(d.ngayDatHang) = '$nam' and c.idDH = d.idDH
                    GROUP BY MONTH(d.ngayDatHang)
                    ";
        $rs = $this->conn->query($query);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        $str = "";
        foreach ($data as $d) {
            $str .= $d['tong'] . ", ";
        }
        return $str;
    }
}
