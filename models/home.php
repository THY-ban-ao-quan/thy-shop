<?php
require_once("model.php");
class Home extends Model
{
    function LoadBanners() {
        $query = "SELECT * FROM banner WHERE trangthai = '1'";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function LoadMenu() {
        $query = "SELECT * FROM danhmuc WHERE trangthai = '1'";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}