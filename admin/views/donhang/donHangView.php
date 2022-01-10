<?php
require_once('controller/donHangController.php');
require_once('controller/taiKhoanController.php');
$dh_controller = new donHangController();
$tk_controller = new taiKhoanController();
$data = $dh_controller->getAllDonHang();
?>
<a href="?mod=donhang&act=daduyet" type="button" class="btn btn-success">Đã duyệt</a>
<a href="?mod=donhang&act=chuaduyet" type="button" class="btn btn-danger">Chưa duyệt</a>
<a href="?mod=donhang" type="button" class="btn btn-primary">Tất cả</a>

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
            <th scope="col">Mã DH</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) {
            $nguoiDung = $tk_controller->getTaiKhoanById($row['idKH']);
        ?>

            <tr>
                <td><?= $row['idDH'] ?></td>
                <td><?= $nguoiDung['tenND'] ?></td>
                <td><?= date('H:i:s d-m-Y', strtotime($row['ngayDatHang'])) ?></td>
                <td>
                    <?php
                    if ($row['tinhTrang'] == 1) {
                    ?>
                        Đã duyệt
                    <?php
                    } else {
                    ?>
                        <a href="?mod=donhang&act=duyet&id=<?= $row['idDH'] ?> " type="button" class="btn btn-danger">Chưa duyệt</a>

                    <?php
                    }
                    ?>

                </td>
                <td>
                    <a href="?mod=donhang&act=detail&id=<?= $row['idDH'] ?>"><i class="fas fa-info"></i></a> &nbsp;

                </td>
            </tr>
        <?php } ?>
</table>