<?php
require_once('./models/taiKhoanModel.php');

class taiKhoanController
{
    var $tk_model;
    public function __construct()
    {
        $this->tk_model = new taiKhoanModel();
    }

    public function getAllTaiKhoan()
    {
        return $this->tk_model->getAllTaiKhoan();
    }

    public function getAllQuyen()
    {
        return $this->tk_model->getAllQuyen();
    }

    public function add()
    {
        $data = array(
            'tenND' => $_POST['tenND'],
            'SDT'  => $_POST['SDT'],
            'email' => $_POST['email'],
            'diaChi' => $_POST['diaChi'],
            'idQuyen' => $_POST['idQuyen'],
            'matKhau' => md5($_POST['matKhau']),
            'trangThai' => 1
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

    public function getTaiKhoanById($idND)
    {
        return $this->tk_model->getTaiKhoanById($idND);
    }

    public function update()
    {
        $tt = 0;
        if (isset($_POST['trangThai'])) {
            $tt = 1;
        }
        $data = array(
            'idND' => $_POST['idND'],
            'tenND' => $_POST['tenND'],
            'SDT'  => $_POST['SDT'],
            'email' => $_POST['email'],
            'diaChi' => $_POST['diaChi'],
            'idQuyen' => $_POST['idQuyen'],
            'matKhau' => md5($_POST['matKhau']),
            'trangThai' => $tt
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $rs = $this->tk_model->update($data);
        if ($rs == true) {
            setcookie('msg', 'Cập nhật mới thành công', time() + 2);
            header('Location: ?mod=taikhoan');
        } else {
            setcookie('msg', 'Cập nhật không thành công', time() + 2);
            header('Location: ?mod=taikhoan&act=edit');
        }
    }

    public function delete()
    {
        $data = array(
            'idND' => $_GET['id'],
            'trangThai' => -1
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $rs = $this->tk_model->update($data);
        if ($rs == true) {
            setcookie('msg', 'Xóa mới thành công', time() + 2);
            header('Location: ?mod=taikhoan');
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
            header('Location: ?mod=taikhoan');
        }
    }

    public function isActive()
    {
        $this->tk_model->isActive($_GET['id']);
        header('Location: ?mod=taikhoan');
    }
}
