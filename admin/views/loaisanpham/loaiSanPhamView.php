<?php
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $idDM = isset($_GET['idDM'])?$_GET['idDM']:"";
    $tenDM = $dm_controller->getTenDM($idDM);
    $data = $lsp_controller->getAllDanhMuc($idDM);
?>
<a href="?mod=loaisanpham&idDM=<?=$idDM?>&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
            <th scope="col">Mã LSP</th>
            <th scope="col">Tên LSP</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $row['idLSP'] ?></td>
            <td><?= $row['tenLSP'] ?></td>
            <td>
                <a href="?mod=loaisanpham&idDM=<?=$idDM?>&act=detail&id=<?= $row['idLSP'] ?>"><i class="fas fa-info"></i></a> &nbsp;
                <a href="?mod=loaisanpham&idDM=<?=$idDM?>&act=edit&id=<?= $row['idLSP'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                <a href="?mod=loaisanpham&idDM=<?=$idDM?>&act=delete&id=<?= $row['idLSP'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
</table>
