<?php
require_once("models/account.php");
class AccountController
{
    var $account_model;
    public function __construct()
    {
        $this->account_model = new Account();
    }

    function Profile() {
        $menu = $this->account_model->LoadMenu();
        $id = isset($_SESSION['login']) ? $_SESSION['login']['idND'] : -1;
        $user = $this->account_model->Profile($id);
        require_once('views/index.php');
    }

    function Update() {        
        $id = isset($_SESSION['login']) ? $_SESSION['login']['idND'] : -1;
        $user = $this->account_model->Profile($id);
        $check =  $this->account_model->CheckEmail($_POST['email']);
        
        if($check != "" && $user['email'] != $_POST['email']) {
            $menu = $this->account_model->LoadMenu();
            require_once('views/index.php');
        } else {
            $this->account_model->Update($_POST['tenND'],$_POST['SDT'],$_POST['email'],$_POST['diaChi']);
        }
    }

    function Register()
    {
        $data = json_decode($_POST['data']);

        $data2 = array(
            'tenND'  => $data->name,
            'email'     => $data->email,
            'matKhau'  => md5($data->password),
            'idQuyen'   => 3,
            'trangThai' => 1,
        );

        $this->account_model->Register($data2);
    }
    
    function Login()
    {
        $data = json_decode($_POST['data']);
        $this->account_model->Login($data);
    }

    function Logout() {
        $this->account_model->Logout();
    }
    
    function GetUserID() {
        echo isset($_SESSION['login']) ? $_SESSION['login']['idND'] : -1;
    }
}
