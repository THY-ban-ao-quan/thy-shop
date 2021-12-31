<?php
    require_once('./models/danhmucModel.php');

    class danhMucController{
        var $dm_model;
        public function __construct()
        {
            $this->dm_model = new DanhMucModel();
        }
        
        public function getAllDanhMuc(){
            $data =  array();
            $data = $this->dm_model->getAllDanhMuc();
            //require_once('./views/danhmucView.php');
            return $data;
        }

        public function getTenDM($idDM){
            $tenDM = $this->dm_model->getTenDM($idDM);
            return $tenDM;
        }
    }
?>