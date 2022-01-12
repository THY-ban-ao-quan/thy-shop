<?php
require_once('./models/model.php');
class taiKhoanModel extends Model
{
    public function getAllTaiKhoan()
    {
        $sql = "select * from nguoidung where trangThai = 0 or trangThai = 1";
        $rs = $this->conn->query($sql);
        $data = array();
        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getAllQuyen()
    {
        $sql = "select * from quyen";
        $rs = $this->conn->query($sql);
        $data = array();
        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // function CheckEmaill($email)
    // {
    //     $result = 0;
    //     $query =  "SELECT email FROM nguoidung WHERE email = '$email'";
    //     if($this->conn->query($query)){
    //         $result = $this->conn->query($query)->num_rows;
    //     }

    //     return $result;
    // }

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
        $query = "INSERT INTO nguoidung ($f) VALUES ($v);";
        $rs = $this->conn->query($query);
        if ($rs == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
            header('Location: ?mod=taikhoan');
        } else {
            setcookie('msg', 'Thêm mới không thành công', time() + 2);
            header('Location: ?mod=taikhoan&act=add');
        }
    }

    public function getTaiKhoanById($idND)
    {
        $sql = "select * from nguoidung where idND = '$idND'";
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

        $query = "UPDATE nguoidung SET  $v   WHERE idND = " . $data['idND'];
        $rs = $this->conn->query($query);
        return $rs;
    }

    public function isActive($id)
    {
        $query = "select trangThai from nguoidung where idND =" . $id . " ";
        $rs = $this->conn->query($query)->fetch_assoc();
        $tt = 0;
        if ($rs['trangThai'] == 1) {
            $tt = 0;
        } else {
            $tt = 1;
        }
        $sql = "update nguoidung set trangThai = '$tt' where idND = " . $id;
        $this->conn->query($sql);
    }
}
