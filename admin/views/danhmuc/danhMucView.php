<?php
require_once('controller/danhMucController.php');
$dm_controller = new danhMucController();
$data = $dm_controller->getAllDanhMuc();
?>
<a href="?mod=danhmuc&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
            <th scope="col">Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?= $row['idDM'] ?></td>
                <td><?= $row['tenDM'] ?></td>
                <td><a href="?mod=danhmuc&act=anhien&id=<?= $row['idDM'] ?>" type="button" class="btn btn-<?= $row['trangThai'] == 1 ? "primary" : "danger" ?>"><?= $row['trangThai'] == 1 ? "Hiện" : "Ẩn" ?></a>
                </td>
                <td>
                    <a href="?mod=danhmuc&act=edit&id=<?= $row['idDM'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                    <a href="?mod=danhmuc&act=delete&id=<?= $row['idDM'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
</table>