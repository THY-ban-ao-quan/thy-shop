<?php
    require_once('./models/model.php');
    class taiKhoanModel extends Model {
        public function getAllTaiKhoan()
        {
            $sql = "select * from nguoidung";
            $rs = $this->conn->query($sql);
            $data = array();
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getAllQuyen(){
            $sql = "select * from quyen";
            $rs = $this->conn->query($sql);
            $data = array();
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function add($data){
            
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
            if($rs){
                echo '<script>alert("Thêm thành công")</script>';
            }
            else{
                echo '<script>alert("Thêm không thành công")</script>';
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
            if($rs){
                echo '<script>alert("cập nhật thành công")</script>';
            }
            else{
                echo '<script>alert("cập nhật không thành công")</script>';
            }
            
        }
    }
?>