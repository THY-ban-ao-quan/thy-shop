<?php
require_once('controller/donHangController.php');
require_once('controller/taiKhoanController.php');
require_once('controller/sizeController.php');
require_once('controller/sanPhamController.php');
$dh_controller = new donHangController();
$tk_controller = new taiKhoanController();
$s_controller = new sizeController();
$sp_controller = new sanPhamController();
$data = $dh_controller->getChiTietDonHangByIdDH();
$donHang = $dh_controller->getDonHangById($_GET['id']);
$idKH = $donHang['idKH'];
?>
<a href="?mod=donhang" type="button" class="btn btn-primary">Quay lại</a>
<br>
<br>
<p class="text-primary font-weight-bold">Chi tiết đơn hàng <?= $_GET['id'] ?> của <?= $tk_controller->getTaiKhoanById($idKH)['tenND'] ?></p>
<br>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Mã SP</th>
            <th scope="col">Tên SP</th>
            <th scope="col">Size</th>
            <th scope="col">Màu</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Khuyến mãi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $tong = 0;
        foreach ($data as $row) {
            $tong += $row['soLuong'] * $row['giaBan'] * (100 - $row['phanTramKM']) / 100;
            $sizeMau = $s_controller->getSizeMauById((int)$row['idSM']);
            $sp = $sp_controller->getSanPhamById($sizeMau['idSP']);
        ?>

            <tr>
                <td><?= $sizeMau['idSP'] ?></td>
                <td><?= $sp['tenSP'] ?></td>
                <td><?= $sizeMau['size'] ?></td>
                <td><?= $sizeMau['mau'] ?></td>
                <td><?= $row['soLuong'] ?></td>
                <td><?= number_format($row['giaBan'], 0) . " VNĐ"; ?></td>
                <td> <?= $row['phanTramKM'] ?> </td>

            </tr>

        <?php } ?>
        <p>Tổng tiền: <?= number_format($tong, 0) . " VNĐ"; ?></p>
</table>