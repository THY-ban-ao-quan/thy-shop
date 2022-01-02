<?php
    require_once('./models/model.php');
    class sanPhamModel extends Model {

        // lấy tất cả sản phẩm
        public function getAllSanPham(){
            $sql = "select * from sanpham where trangThai = 1";
            $rs = $this->conn->query($sql);
            $data = array();
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        //thêm sản phẩm
        public function add($data){
            
            $f = "";
            $v = "";
            foreach ($data as $key => $value) {
                $f .= $key . ",";
                $v .= "'" . $value . "',";
            }
            $f = trim($f, ",");
            $v = trim($v, ",");
            $query = "INSERT INTO sanpham($f) VALUES ($v);";
            $rs = $this->conn->query($query);
            if ($rs == true) {
                setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=sanpham');
                
            } else {
                setcookie('msg', 'Thêm mới không thành công', time() + 2);
                header('Location: ?mod=sanpham&act=add');
            }
        }

        //lấy sản phẩm theo id
        public function getSanPhamById($id)
        {
            $sql = "select * from sanpham where idSP = '$id'";
            $rs = $this->conn->query($sql)->fetch_assoc();
            return $rs;
        }

        //xóa sản phẩm
        public function delete($id)
        {
            $sql = "delete from sanpham where idSP = '$id'";
            $rs = $this->conn->query($sql);
            // if ($rs == true) {
            //     setcookie('msg1', 'xoa thanh cong', time() + 2);
            // } else {
            //     setcookie('msg1', 'Xóa không thành công', time() + 2);
            // }
            if($rs){
                echo '<script>alert("xóa thành công")</script>';
            }
            else{
                echo '<script>alert("xóa không thành công")</script>';
            }
        }

        //cập nhật sản phẩm
        function update($data)
        {
            $v = "";
            foreach ($data as $key => $value) {
                $v .= $key . "='" . $value . "',";
            }
            $v = trim($v, ",");


            $query = "UPDATE sanpham SET  $v   WHERE idSP = " . $data['idSP'];

            $rs = $this->conn->query($query);
            return $rs;
            
            // if ($result == true) {
            //     setcookie('msg', 'Duyệt thành công', time() + 2);
            //     header('Location: ?mod=' . $this->table);
            // } else {
            //     setcookie('msg', 'Update vào không thành công', time() + 2);
            //     header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data['id']['id']);
            // }
        }

        //insert bảng size màu
        public function insertSizeMau($data){
            $f = "";
            $v = "";
            foreach ($data as $key => $value) {
                $f .= $key . ",";
                $v .= "'" . $value . "',";
            }
            $f = trim($f, ",");
            $v = trim($v, ",");
            $query = "INSERT INTO size_mau($f) VALUES ($v);";
            $rs = $this->conn->query($query);
        }

        public function getIdSMbyIdSpMau($idSP, $mau)
        {
            $sql = "select * from size_mau where idSP = '$idSP' and mau = '$mau'";
            $rs = $this->conn->query($sql)->fetch_assoc();
            return $rs['idSM'];
        }

        //update mau
        function updateSizeMau($data)
        {
            $v = "";
            foreach ($data as $key => $value) {
                $v .= $key . "='" . $value . "',";
            }
            $v = trim($v, ",");

            $idSM = $this->getIdSMbyIdSpMau($data['idSP'],$data['mau']);
            $query = "UPDATE size_mau SET  $v   WHERE idSM = " . $idSM;

            $rs = $this->conn->query($query);
            return $rs;
        }

        //lấy màu của 1 sản phẩm
        public function getMauByIdSP($idSP)
        {
            $sql = "select mau from size_mau where idSP = '$idSP'";
            $rs = $this->conn->query($sql);
            $data = array();
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        //kiểm tra màu đã có
        public function kiemTraMau($idSP, $mau)
        {
            $data = $this->getMauByIdSP($idSP);
            foreach($data as $m){
                if($m['mau'] == $mau){
                    return true;
                }
            }
            return false;
        }

        //kiểm tra màu đã có và trạng thái là 1
        public function kiemTraMauDaChon($idSP, $mau)
        {
            $sql = "select mau from size_mau where idSP = '$idSP' and trangThai = 1";
            $rs = $this->conn->query($sql);
            $data = array();
            if($rs->num_rows > 0){
                while ($row = $rs->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            foreach($data as $m){
                if($m['mau'] == $mau){
                    return true;
                }
            }
            return false;
        }
    }
?>