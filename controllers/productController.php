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

    
    function Filter() {          
        $menu = $this->product_model->LoadMenu();
        $data = isset($_POST['data']) && !empty($_POST['data']) ? json_decode($_POST['data']) : NULL;

        $idDM = isset($_GET['idDM']) && !empty($_GET['idDM']) ? $_GET['idDM'] * 1 : -1;
        $idLSP = isset($_GET['idLSP']) && !empty($_GET['idLSP']) ? $_GET['idLSP'] * 1 : -1;
        $sizes = $data != NULL ? $data->sizes : [];
        $colors = $data != NULL ? $data->colors : [];
        $maxPrice = $data != NULL ? $data->price2 : $this->product_model->MaxPrice()['donGia'];
        $minPrice = $data != NULL ? $data->price1 : 0;
        $sort = $data != NULL ? $data->sort : "desc";
        $limit = 12;
        $start = $data != NULL ? ($data->page - 1) * $limit : 0;

        $categories = $this->product_model->Categories($idDM);
        $allSizes = $this->product_model->AllSizes();

        $products = $this->product_model->Filter($idLSP, $idDM, $sizes, $colors, $minPrice, $maxPrice, $limit, $start, $sort);
        
        if($data == NULL) require_once('views/index.php');
        else echo json_encode($products);
    }

}