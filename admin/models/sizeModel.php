<?php
require_once('./models/model.php');
class sizeModel extends Model
{
    function getAllSize()
    {
        $sql = "select * from size";
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
        $query = "INSERT INTO size ($f) VALUES ($v);";
        $rs = $this->conn->query($query);

        if ($rs == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
            header('Location: ?mod=size');
        } else {
            setcookie('msg', 'Size đã có', time() + 2);
            header('Location: ?mod=size');
        }
    }
}
