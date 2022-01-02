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
            $data = array(
                'idSP' => $_GET['id'],
                'trangThai' => 0
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $rs = $this->sp_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Xóa thành công', time() + 2);
                header('Location: ?mod=sanpham');
                
            } else {
                setcookie('msg', 'Xóa không thành công', time() + 2);
                header('Location: ?mod=sanpham');
            }
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

            //lấy màu đã có của sản phẩm
            $listmau = $this->sp_model->getMauByIdSP($data['idSP']);
            //thêm màu chưa có
            if(isset($_POST['mau'])){
                foreach ($_POST['mau'] as $value) {
                    //kiểm tra màu được chọn đã có trong csdl chưa
                    $kt = $this->kiemTraMau($data['idSP'],$value);
                    if(!$kt){
                        $arrayMau = array(
                        'idSP' => $_POST['idSP'],
                        'mau' => $value,
                        'trangThai' => 1
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

                
                $strMau = "";
                if(isset($_POST['mau'])){
                    foreach ($_POST['mau'] as $value) {
                        $strMau .= " ". $value; //gộp màu thành chuỗi
                    }

                    //bỏ màu đã có
                    //kiểm tra màu đã có có trong chuỗi màu đã chọn không
                    foreach($listmau as $mau){
                        if(!str_contains($strMau,$mau['mau'])){
                            $arrayMau = array(
                            'idSP' => $_POST['idSP'],
                            'mau' => $mau['mau'],
                            'trangThai' => 0
                            );
                            foreach ($arrayMau as $key => $value) {
                                if (strpos($value, "'") != false) {
                                    $value = str_replace("'", "\'", $value);
                                    $arrayMau[$key] = $value;
                                }
                            }
                            $this->sp_model->updateSizeMau($arrayMau);
                        }
                    }

                    //chọn lại màu đã có
                    foreach($listmau as $mau){
                        if($mau['trangThai']==0){
                            if(str_contains($strMau,$mau['mau'])){
                                $arrayMau = array(
                                'idSP' => $_POST['idSP'],
                                'mau' => $mau['mau'],
                                'trangThai' => 1
                                );
                                foreach ($arrayMau as $key => $value) {
                                    if (strpos($value, "'") != false) {
                                        $value = str_replace("'", "\'", $value);
                                        $arrayMau[$key] = $value;
                                    }
                                }
                                $this->sp_model->updateSizeMau($arrayMau);
                            }
                        }
                        
                    }
                }
                
                //bỏ tất cả
                if(count($_POST['mau'])==0){
                    if($mau['trangThai']==1){
                            if(str_contains($strMau,$mau['mau'])){
                                $arrayMau = array(
                                'idSP' => $_POST['idSP'],
                                'mau' => $mau['mau'],
                                'trangThai' => 0
                                );
                                foreach ($arrayMau as $key => $value) {
                                    if (strpos($value, "'") != false) {
                                        $value = str_replace("'", "\'", $value);
                                        $arrayMau[$key] = $value;
                                    }
                                }
                                $this->sp_model->updateSizeMau($arrayMau);
                            }
                        }
                }
                

                

                

            }
            $rs = $this->sp_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Cập nhật thành công', time() + 2);
                header('Location: ?mod=sanpham');
                
            } else {
                setcookie('msg', 'Cập nhật không thành công', time() + 2);
                header('Location: ?mod=sanpham&act=edit');
            }
        }

        public function getMauByIdSP($idSP)
        {
            return $this->sp_model->getMauByIdSP($idSP);
        }

        public function kiemTraMau($idSP, $mau){
            return $this->sp_model->kiemTraMau($idSP,$mau);
        }

        public function kiemTraMauDaChon($idSP, $mau)
        {
            return $this->sp_model->kiemTraMauDaChon($idSP,$mau);
        }

        
    }
?>