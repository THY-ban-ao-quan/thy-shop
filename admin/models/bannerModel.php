<?php

require_once('./models/model.php');
class BannerModel extends Model
{
    function getAllBanner()
    {
        $sql = "select * from banner order by id DESC";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    function getBanner($id)
    {
        $sql = "select * from banner where id = '$id'";
        $rs = $this->conn->query($sql)->fetch_assoc();

        return $rs;
    }

    public function AnHien($id)
    {
        $sql = "select * from banner where id = '$id'";
        $rs = $this->conn->query($sql)->fetch_assoc();
        $tt = 0;
        if ($rs['trangThai'] == 1) {
            $tt = 0;
        } else {
            $tt = 1;
        }
        $query = "update banner set trangThai = '$tt' where id = '$id'";
        $this->conn->query($query);
        header('Location: ?mod=banner');
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
        $query = "INSERT INTO banner ($f) VALUES ($v);";

        $rs = $this->conn->query($query);
        return $rs;
    }

    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE banner SET  $v   WHERE id = " . $data['id'];
        $rs = $this->conn->query($query);
        return $rs;
    }

    public function delete($id)
    {
        $query = "delete from banner where id = '$id'";
        $rs = $this->conn->query($query);
        return $rs;
    }
}
