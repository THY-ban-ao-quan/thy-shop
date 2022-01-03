<?php
require_once('./models/mauModel.php');

class mauController
{
    var $m_model;
    public function __construct()
    {
        $this->m_model = new mauModel();
    }

    public function getAllMau()
    {
        return $this->m_model->getAllMau();
    }

    public function add()
    {
        $data = array(
            'mau' => $_POST['mau'],
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->m_model->add($data);
    }
}
