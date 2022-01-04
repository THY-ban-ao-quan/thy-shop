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

        public function add(){
            $data = array(
                'tenDM' => $_POST['tenDM'],
                'trangThai' => 1
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->dm_model->add($data);
        }

        public function update(){
            $data = array(
                'idDM' => $_POST['idDM'],
                'tenDM' => $_POST['tenDM']
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $rs = $this->dm_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Cập nhật thành công', time() + 2);
                header('Location: ?mod=danhmuc');
                
            } else {
                setcookie('msg', 'Cập nhật không thành công', time() + 2);
                header('Location: ?mod=danhmuc&act=edit');
            }
        }

        public function delete(){
            $data = array(
                'idDM' => $_GET['id'],
                'trangThai' => 0
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $rs = $this->dm_model->update($data);
            if ($rs == true) {
                setcookie('msg', 'Xóa thành công', time() + 2);
                header('Location: ?mod=danhmuc');
                
            } else {
                setcookie('msg', 'Xóa không thành công', time() + 2);
                header('Location: ?mod=danhmuc');
            }
        }

        public function getDanhMucById(){
            $idDM = $_GET['id'];
            return $this->dm_model->getDanhMucById($idDM);
        }
    }
