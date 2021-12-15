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
        require_once('Views/index.php');
    }
}