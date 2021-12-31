<?php
    require_once('./models/sanPhamModel.php');

    class sanPhamController{
        var $sp_model;
        public function __construct()
        {
            $this->sp_model = new sanPhamModel();
        }
        
        public function getAllSanPham(){
            $data =  array();
            $data = $this->sp_model->getAllSanPham();
            return $data;
        }

        public function add(){
            $data = array(
                'tenSP' => $_POST['tenSP'],
                'idLSP'  => $_POST['idLSP'],
                'donGia' => $_POST['donGia'],
                'mua' => $_POST['mua'],
                'moTa' => $_POST['MoTa'],
                'trangThai' => 1
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->sp_model->add($data);
            require_once('./views/sanpham/sanPhamView.php');
        }

        public function getSanPhamById($id)
        {
            $result = $this->sp_model->getSanPhamById($id);
            return $result;
        }

        public function delete()
        {
            $id = $_GET['id'];
            $this->sp_model->delete($id);
            require_once('./views/sanpham/sanPhamView.php');
        }

        public function update(){
            $data = array(
                'idSP' => $_POST['idSP'],
                'tenSP' => $_POST['tenSP'],
                'idLSP'  => $_POST['idLSP'],
                'donGia' => $_POST['donGia'],
                'mua' => $_POST['mua'],
                'moTa' => $_POST['MoTa'],
                'trangThai' => 1
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }

            
            if(isset($_POST['mau'])){
                //echo '<script>alert("'.$_POST['mau'].'")</script>';
                foreach ($_POST['mau'] as $value) {
                    $arrayMau = array(
                        'idSP' => $_POST['idSP'],
                        'mau' => $value
                    );
                    foreach ($arrayMau as $key => $value) {
                        if (strpos($value, "'") != false) {
                            $value = str_replace("'", "\'", $value);
                            $arrayMau[$key] = $value;
                        }
                    }
                    $this->sp_model->insertSizeMau($arrayMau);
                }
                
            }
            $this->sp_model->update($data);
            require_once('./views/sanpham/sanPhamView.php');
        }

        public function getMauByIdSP($idSP)
        {
            return $this->sp_model->getMauByIdSP($idSP);
        }

        public function kiemTraMau($idSP, $mau){
            return $this->sp_model->kiemTraMau($idSP,$mau);
        }

        
    }
?>