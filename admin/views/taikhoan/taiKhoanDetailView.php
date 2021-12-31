<?php
    require_once('controller/taiKhoanController.php');
    $tk_controller = new taiKhoanController();
    if(isset($_GET['id'])){
        $data = $tk_controller->getTaiKhoanById($_GET['id']);
    }
    
?>
<a href="?mod=taikhoan" type="button" class="btn btn-primary">Quay lại</a>
        <br>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <td>Mã ND</td>
                <td> <?=$data['idND']?></td>
            </tr>
            <tr>
                <td>Họ tên</td>
                <td><?=$data['tenND'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$data['email'] ?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?=$data['SDT'] ?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?=$data['diaChi']?></td>
            </tr>
            <tr>
                <td>Mã Quyền</td>
                <td><?=$data['idQuyen'] ?></td>
            </tr>
    </table>