<?php
require_once('./models/model.php');
class mauModel extends Model
{
    function getAllMau()
    {
        $sql = "select * from mau";
        $rs = $this->conn->query($sql);
        $data = array();
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
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
        $query = "INSERT INTO mau ($f) VALUES ($v);";
        $rs = $this->conn->query($query);

        if ($rs == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
            header('Location: ?mod=mau');
        } else {
            setcookie('msg', 'Màu đã có', time() + 2);
            header('Location: ?mod=mau');
        }
    }
}
