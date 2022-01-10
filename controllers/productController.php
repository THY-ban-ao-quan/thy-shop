<?php
require_once("models/product.php");
class ProductController
{
    var $product_model;
    public function __construct()
    {
       $this->product_model = new Product();
    }

    function Detail() {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        $menu = $this->product_model->LoadMenu();
        $info = $this->product_model->GetInfo($id);
        $colors = $this->product_model->GetColors($id);
        $sizes = $this->product_model->GetSizes($id, $colors[0]['mau']);
        $images = $this->product_model->GetImages($id, $colors[0]['mau']);
        
        require_once('views/index.php');
    }

    function GetImages() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->product_model->GetImages($data->idSP, $data->mau));
    }
    function GetSizes() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->product_model->GetSizes($data->idSP, $data->mau));
    }
    function Search() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->product_model->Search($data->keyword));
    }
    function FeaturedProducts() {
        echo json_encode($this->product_model->FeaturedProducts(4));
    }
}