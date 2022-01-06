<?php
require_once("connection.php");
class Model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }

    function GetCurrentTime() {
       $query = "SELECT CURRENT_TIMESTAMP as cTime";
       $result = $this->conn->query($query);
       return $rs = $result->fetch_object();
   }
}
?>