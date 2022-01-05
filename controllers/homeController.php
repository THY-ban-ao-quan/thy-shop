<?php
require_once("models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function Index()
    {
        $banners = $this->home_model->LoadBanners();
        $menu = $this->home_model->LoadMenu();
        require_once('Views/index.php');
    }
}