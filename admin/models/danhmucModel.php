<?php
   
    require_once('./models/model.php');
    class DanhMucModel extends Model
    {
        function getAllDanhMuc(){
            $sql = "select * from danhmuc where trangThai = 1";
            $rs = $this->conn->query($sql);
            $data = array();
            while ($row = $rs->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        public function getTenDM($idDM)
        {
            if($idDM!=null){
                $sql = "select tenDM from danhmuc where idDM = '$idDM'";
                $rs = $this->conn->query($sql)->fetch_assoc();
                return $rs['tenDM'];
            }
            
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
            $query = "INSERT INTO danhmuc ($f) VALUES ($v);";
            $rs = $this->conn->query($query);
            
            if ($rs == true) {
                setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=danhmuc');
                
            } else {
                setcookie('msg', 'Thêm vào không thành công', time() + 2);
                header('Location: ?mod=danhmuc&act=add');
            }
        }

        function update($data)
        {
            $v = "";
            foreach ($data as $key => $value) {
                $v .= $key . "='" . $value . "',";
            }
            $v = trim($v, ",");

            $query = "UPDATE danhmuc SET  $v   WHERE idDM = " . $data['idDM'];   
            $rs = $this->conn->query($query);
            return $rs;
        }

        public function getDanhMucById($idDM)
        {
            $sql = "select * from danhmuc where idDM = '$idDM'";
            $rs = $this->conn->query($sql)->fetch_assoc();
            return $rs;
        }
    }
?>