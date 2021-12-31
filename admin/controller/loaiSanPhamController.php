<?php
    require_once('./models/loaiSanPhamModel.php');

    class loaiSanPhamController{
        var $lsp_model;
        public function __construct()
        {
            $this->lsp_model = new loaiSanPhamModel();
        }
        
        public function getAllDanhMuc($id){
            $data =  array();
            $data = $this->lsp_model->getLoaiSanPham($id);
            //require_once('./views/danhmucView.php');
            return $data;
        }

        public function getTenLoaiSanPham($id){
            return $this->lsp_model->getTenLoaiSanPham($id);
        }

        public function getIdDanhmuc($id)
        {
            return $this->lsp_model->getIdDanhMuc($id);
        }

        public function getAllloaiSanPham()
        {
            return $this->lsp_model->getAllLoaiSanPham();
        }
    }
?>
