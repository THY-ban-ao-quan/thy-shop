<?php
require_once('connection.php');
$con = new Connection();
$data = array();


if (isset($_POST['id'])) {
    $query = "select trangThai from nguoidung where idND =" . $_POST['id'] . " ";
    $rs = $con->conn->query($query)->fetch_assoc();
    $tt = 0;
    if ($rs['trangThai'] == 1) {
        $tt = 0;
    } else {
        $tt = 1;
    }
    $sql = "update nguoidung set trangThai = '$tt' where idND = " . $_POST['id'];
    $r = $con->conn->query($query);
}
