<?php
require_once('./models/bannerModel.php');

class bannerController
{
    var $bn_model;
    public function __construct()
    {
        $this->bn_model = new BannerModel();
    }

    public function getAllBanner()
    {
        $data =  array();
        $data = $this->bn_model->getAllBanner();
        return $data;
    }
    function getBanner()
    {
        return $this->bn_model->getBanner($_GET['id']);
    }

    public function AnHien()
    {
        $id = $_GET['id'];
        $this->bn_model->AnHien($id);
    }

    public function add()
    {
        if (!empty($_FILES['anh']['name'])) {
            $name_img = stripslashes($_FILES['anh']['name']);
            $source_img = $_FILES['anh']['tmp_name'];
            $path_img = "../assets/img/banners/" . $name_img;
            move_uploaded_file($source_img, $path_img);

            $tt = 0;
            if (isset($_POST['trangThai'])) {
                $tt = 1;
            }
            //insert 
            $data = array(
                'id' => $_POST['id'],
                'banner' => $name_img,
                'trangThai' => $tt
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }

            $rs = $this->bn_model->add($data);
            if ($rs) {
                setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=banner');
            } else {
                setcookie('msg', 'Khuyến mãi này đã có banner', time() + 2);
                header('Location: ?mod=banner&act=add');
            }
        }
    }
    public function update()
    {
        $name_img = $_POST['banner'];
        if (!empty($_FILES['anh']['name'])) {
            $name_img = stripslashes($_FILES['anh']['name']);
            $source_img = $_FILES['anh']['tmp_name'];
            $path_img = "../assets/img/banners/" . $name_img;
            move_uploaded_file($source_img, $path_img);
        }

        $tt = 0;
        if (isset($_POST['trangThai'])) {
            $tt = 1;
        }
        //insert 
        $data = array(
            'id' => $_POST['id'],
            'banner' => $name_img,
            'trangThai' => $tt
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $rs = $this->bn_model->update($data);

        if ($rs) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);
            header('Location: ?mod=banner');
        } else {
            setcookie('msg', 'Cập nhật không thành công', time() + 2);
            header('Location: ?mod=banner&act=edit&id=' . $_POST['id']);
        }
    }

    public function delete()
    {
        $rs = $this->bn_model->delete($_GET['id']);
        if ($rs) {
            setcookie('msg', 'Xóa thành công', time() + 2);
            header('Location: ?mod=banner');
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
            header('Location: ?mod=banner');
        }
    }
}
