<?php
require_once("models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }

    function getSeason() {
        $currentDate = $this->home_model->GetCurrentTime();
        $month = date('m', strtotime($currentDate->cTime));

        if($month >= 3 && $month <= 5)
            return 'X';
        if($month >= 6 && $month <= 8)
            return 'H';
        if($month >= 9 &&$month <= 11)
            return 'T';
        return 'D';
    }
    
    function Index()
    {
        $banners = $this->home_model->LoadBanners();
        $menu = $this->home_model->LoadMenu();
        $newProducts = $this->home_model->NewProducts(8, 1);
        $seasonalProducts = $this->home_model->SeasonalProducts(8, 1, $this->getSeason());
        $featuredProducts = $this->home_model->FeaturedProducts(8, 1);
        require_once('Views/index.php');
    }

    function NewProducts() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->home_model->NewProducts(8, $data->idDM));
    }

    function SeasonalProducts() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->home_model->SeasonalProducts(8,  $data->idDM, $this->getSeason()));
    }

    function FeaturedProducts() {
        $data = json_decode($_POST['data']);
        echo json_encode($this->home_model->FeaturedProducts(8,  $data->idDM));
    }
}