<?php 
    class Connection{
        var $conn;
        function __construct()
        {
            //Thong so ket noi CSDL
            $server_name ="localhost"; 
            $username ="root";
            $password =""; 
            $db_name ="shopthy";
 
            //Tao ket noi CSDL
            $this->conn = new mysqli($server_name,$username,$password,$db_name);
            $this->conn->set_charset("utf8");

            //check connection
            if ($this->conn->connect_error) {
		        die("Connection failed: " . $this->conn->connect_error);
		    }
        }
    }
?>