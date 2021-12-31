<!-- <?php
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $idDM = isset($_GET['idDM'])?$_GET['idDM']:"";
    $tenDM = $dm_controller->getTenDM($idDM);
    $data = $lsp_controller->getAllDanhMuc($idDM);
?> -->
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
                <a href="?mod=loaisanpham&act=detail&id=<?= $row['idLSP'] ?>"><i class="fas fa-info"></i></a> &nbsp;
                <a href="?mod=loaisanpham&act=edit&id=<?= $row['idLSP'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                <a href="?mod=loaisanpham&act=delete&id=<?= $row['idLSP'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
</table>
