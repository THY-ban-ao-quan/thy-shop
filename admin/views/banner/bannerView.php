<?php
require_once('controller/bannerController.php');
$bn_controller = new bannerController();
$data = $bn_controller->getAllBanner();
?>

<a href="?mod=banner&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
            <th scope="col">Mã BN</th>
            <th scope="col">Banner</th>
            <th scope="col">Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><img src="../assets/img/banners/<?= $row['banner'] ?>" style="width: 600px; height: 200px;">
                </td>
                <td> <a href="?mod=banner&act=anhien&id=<?= $row['id'] ?>" type="button" class="btn btn-<?= $row['trangThai'] == 1 ?  'primary' : 'danger' ?>"><?= $row['trangThai'] == 1 ?  'Hiện' : 'Ẩn' ?></a>
                </td>
                <td>
                    <a href="?mod=banner&act=edit&id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                    <a href="?mod=banner&act=delete&id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
</table>