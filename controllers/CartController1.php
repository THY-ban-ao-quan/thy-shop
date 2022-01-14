<?php
require_once("../../models/cart.php");
class CartController
{
    var $cart_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
    }
    function list_cart($id)
    {
        return $this->cart_model->list_cart($id);
    }
    function update_cart($idKH, $idSM, $tanggiam)
    {
        $this->cart_model->update_cart($idKH, $idSM, $tanggiam);
    }
    function delete_cart($idKH, $idSM)
    {
        $this->cart_model->delete_cart($idKH, $idSM);
    }
    function chon_sp($idKH, $idSM, $chon) {
        $this->cart_model->chon_sp($idKH, $idSM, $chon);
    }
    function chon_tatca($chon) {
        $this->cart_model->chon_tatca($chon);
    }
}