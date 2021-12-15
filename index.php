<?php
    session_start();
    $act = isset($_GET['act']) ? $_GET['act'] : "home";

    switch ($act) {
        case 'home':
            require_once('controllers/homeController.php');
            $controller_obj = new HomeController();
            $controller_obj->Index();
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
    }
?>