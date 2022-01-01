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
            $data = $this->lsp_model->getLoaiSanPhamByIdDM($id);
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

        public function add(){
            $data = array(
                'tenLSP' => $_POST['tenLSP'],
                'idDM'  => $_GET['idDM'],
                'trangThai' => 1
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->lsp_model->add($data);
        }

        public function update(){
            $data = array(
                'idLSP' => $_POST['idLSP'],
                'tenLSP' => $_POST['tenLSP'],
                'idDM'  => $_POST['idDM'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $rs = $this->lsp_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Cập nhật thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$data['idDM']);
                
            } else {
                setcookie('msg', 'Cập nhật không thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$data['idDM'].'&act=edit');
            }
        }

        public function delete(){
            $data = array(
                'idLSP' => $_GET['id'],
                'trangThai' => 0
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $rs = $this->lsp_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Xóa thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$_GET['idDM']);
                
            } else {
                setcookie('msg', 'Xóa không thành công', time() + 2);
                header('Location: ?mod=loaisanpham&idDM='.$_GET['idDM']);
            }
        }

        public function getLoaiSanPhamByIdLSP(){
            $idLSP = $_GET['id'];
            return $this->lsp_model->getLoaiSanPhamByIdLSP($idLSP);
        }
    }
?>
