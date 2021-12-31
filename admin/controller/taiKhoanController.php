<?php
    require_once('./models/taiKhoanModel.php');

    class taiKhoanController{
        var $tk_model;
        public function __construct()
        {
            $this->tk_model = new taiKhoanModel();
        }

        public function getAllTaiKhoan(){
            return $this->tk_model->getAllTaiKhoan();
        }

        public function getAllQuyen(){
            return $this->tk_model->getAllQuyen();
        }

        public function add(){
            $data = array(
                'tenND' => $_POST['tenND'],
                'SDT'  => $_POST['SDT'],
                'email' => $_POST['email'],
                'diaChi' => $_POST['diaChi'],
                'idQuyen' => $_POST['idQuyen'],
                'matKhau' => md5($_POST['matKhau'])
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->tk_model->add($data);
            require_once('./views/taikhoan/taiKhoanView.php');
        }

        public function getTaiKhoanById($idND){
            return $this->tk_model->getTaiKhoanById($idND);
        }

        public function update(){
            $data = array(
                'idND' => $_POST['idND'],
                'tenND' => $_POST['tenND'],
                'SDT'  => $_POST['SDT'],
                'email' => $_POST['email'],
                'diaChi' => $_POST['diaChi'],
                'idQuyen' => $_POST['idQuyen'],
                'matKhau' => md5($_POST['matKhau'])
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->tk_model->update($data);
            require_once('./views/taikhoan/taiKhoanView.php');
        }
    }
?>