<?php
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $idDM = isset($_GET['idDM'])?$_GET['idDM']:"";
    $tenDM = $dm_controller->getTenDM($idDM);

    //lấy loại sản phẩm
    $data = $lsp_controller->getLoaiSanPhamByIdLSP();
?>
<a href="?mod=loaisanpham&idDM=<?=$idDM?>" type="button" class="btn btn-primary">Quay lại</a>
<br>
<br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td>Mã LSP</td>
        <td> <?=$data['idLSP']?></td>
    </tr>
    <tr>
        <td>Tên loại sản phẩm</td>
        <td><?=$data['tenLSP'] ?></td>
    </tr>
    <tr>
        <td>anh mục</td>
        <td><?=$tenDM ?></td>
    </tr>
    
</table>