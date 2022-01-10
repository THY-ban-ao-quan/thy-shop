<?php
    session_start();
    $act = isset($_GET['act']) ? $_GET['act'] : "home";

    switch ($act) {
        case 'home':
            $handle = isset($_GET['handle']) ? $_GET['handle'] : "home";

            require_once('controllers/homeController.php');
            $controller_obj = new HomeController();
            switch ($handle) {
                case 'newProducts':
                    $controller_obj->NewProducts();
                    break;
                case 'seasonalProducts':
                    $controller_obj->SeasonalProducts();
                    break;
                case 'featuredProducts':
                    $controller_obj->FeaturedProducts();
                    break;
                default: 
                    $controller_obj->Index();
            }
            break;

        case 'account':
            $handle = isset($_GET['handle']) ? $_GET['handle'] : "account";

            require_once('controllers/accountController.php');
            $controller_obj = new AccountController();

            $isCustomer = isset($_SESSION['isCustomer']) && $_SESSION['isCustomer'] == true;
            $isEmployee = isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] == true;
            $isAdmin    = isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true;

            if ($isCustomer || $isEmployee || $isAdmin) 
                switch ($handle) {
                    case 'logout':
                        $controller_obj->Logout();
                        break;
                    case 'profile':
                        $controller_obj->Account();
                        break;
                    case 'update':
                        $controller_obj->Update();
                        break;
                    default:
                        header('location: ?act=error');
                        break;
                }
            else 
                switch ($handle) {
                    case 'login':
                        $controller_obj->Login();
                        break;
                    case 'register':
                        $controller_obj->Register();
                        break;
                }
            break;
        case 'product':
            require_once('controllers/productController.php');
            $controller_obj = new ProductController();

            $handle = isset($_GET['handle']) ? $_GET['handle'] : "detail";
            switch ($handle) {
                    case 'detail':
                        $controller_obj->Detail();
                        break;
                    case 'images':
                         $controller_obj->GetImages();
                        break;
                    case 'sizes':
                         $controller_obj->GetSizes();
                        break;
                    case 'search':
                         $controller_obj->Search();
                        break;
                    case 'featured':
                         $controller_obj->FeaturedProducts();
                        break;
                }
            break;
    }
?>