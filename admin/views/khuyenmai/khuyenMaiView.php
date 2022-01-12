<?php
require_once('controller/khuyenMaiController.php');
$km_controller = new khuyenMaiController();
$data = $km_controller->getAllKhuyenMai();
?>
<a href="?mod=khuyenmai&act=add" type="button" class="btn btn-primary">Thêm mới</a>
<br>
<br>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Mã DM</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Phần trăm khuyến mãi</th>
            <th scope="col">Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?= $row['idKM'] ?></td>
                <td><?= $row['tenKM'] ?></td>
                <td><?= date('d-m-Y', strtotime($row['ngayBD'])) ?></td>
                <td><?= date('d-m-Y', strtotime($row['ngayKT'])) ?></td>
                <td><?= $row['phanTram']  ?>%</td>
                <td><?= strtotime(date("Y-m-d")) > strtotime($row['ngayKT']) ? 'Hết hạn' : 'Đang triển khai' ?></td>
                <td>
                    <a href="?mod=khuyenmai&act=edit&id=<?= $row['idKM'] ?>"><i class="fas fa-edit"></i></a> &nbsp;

                </td>
            </tr>
        <?php } ?>
</table>