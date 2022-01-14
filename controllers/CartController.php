<?php
require_once(dirname(dirname(__FILE__))."\models\cart.php");
class CartController
{
    var $cart_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
    }

    function add() {
        $data = json_decode($_POST['data']);
        echo $this->cart_model->add($data->idSM, $data->idKH);
    }

    function list_cart($id)
    {
        return $this->cart_model->list_cart($id);
    }
    function list_payment($id)
    {
        return $this->cart_model->list_payment($id);
    }
    function chon_tatca($chon) {
        $this->cart_model->chon_tatca($chon);
    }
}