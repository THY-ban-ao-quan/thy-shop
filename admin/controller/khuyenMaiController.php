<?php
require_once('./models/khuyenMaiModel.php');

class khuyenMaiController
{
    var $km_model;
    public function __construct()
    {
        $this->km_model = new KhuyenMaiModel();
    }

    public function getAllKhuyenMai()
    {
        $data =  array();
        $data = $this->km_model->getAllKhuyenMai();
        return $data;
    }

    public function getKhuyenMai()
    {
        return $this->km_model->getKhuyenMai($_GET['id']);
    }

    public function update()
    {

        $data = array(
            'idKM' => $_POST['idKM'],
            'tenKM' => $_POST['tenKM'],
            'ngayBD'  => $_POST['ngayBD'],
            'ngayKT' => $_POST['ngayKT'],
            'phanTram' => $_POST['phanTram']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $rs = $this->km_model->update($data);
        if ($rs == true) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);
            header('Location: ?mod=khuyenmai');
        } else {
            setcookie('msg', 'Cập nhật không thành công', time() + 2);
            header('Location: ?mod=khuyenmai&act=edit&id=' . $_POST['idKM']);
        }
    }

    public function add()
    {
        $data = array(
            'tenKM' => $_POST['tenKM'],
            'ngayBD'  => $_POST['ngayBD'],
            'ngayKT' => $_POST['ngayKT'],
            'phanTram' => $_POST['phanTram']
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->km_model->add($data);
    }
}
