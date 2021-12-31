<?php
   
    require_once('./models/model.php');
    class DanhMucModel extends Model
    {
        function getAllDanhMuc(){
            $sql = "select * from danhmuc";
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
    }
?>