<?php
require_once('./models/sizeModel.php');

class sizeController
{
    var $s_model;
    public function __construct()
    {
        $this->s_model = new sizeModel();
    }

    public function getAllSize()
    {
        return $this->s_model->getAllSize();
    }

    public function add()
    {
        $data = array(
            'size' => $_POST['size'],
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->s_model->add($data);
    }

    public function getSizeMauById($idSM)
    {
        return $this->s_model->getSizeMauById($idSM);
    }
}
