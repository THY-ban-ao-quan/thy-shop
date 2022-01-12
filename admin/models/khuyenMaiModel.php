<?php

require_once('./models/model.php');
class KhuyenMaiModel extends Model
{
    function getAllKhuyenMai()
    {
        $sql = "select * from khuyenmai order by ngayBD DESC";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getKhuyenMai($id)
    {
        $sql = "select * from khuyenmai where idKM = '$id'";
        $rs = $this->conn->query($sql)->fetch_assoc();

        return $rs;
    }

    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE khuyenmai SET  $v   WHERE idKM = " . $data['idKM'];
        $rs = $this->conn->query($query);
        return $rs;
    }

    public function add($data)
    {

        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO khuyenmai ($f) VALUES ($v);";
        $rs = $this->conn->query($query);
        if ($rs == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
            header('Location: ?mod=khuyenmai');
        } else {
            setcookie('msg', 'Thêm mới không thành công', time() + 2);
            header('Location: ?mod=khuyenmai&act=add');
        }
    }
}
