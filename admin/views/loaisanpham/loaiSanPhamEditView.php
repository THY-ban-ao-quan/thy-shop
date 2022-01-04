<?php
    $idDM = $_GET['idDM'];

    require_once('controller/danhMucController.php');
    require_once('controller/loaiSanPhamController.php');
    $dm_controller = new danhMucController();
    $lsp_controller = new loaiSanPhamController();
    $listDM = $dm_controller->getAllDanhMuc();
    $data = $lsp_controller->getLoaiSanPhamByIdLSP();
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<a href="?mod=loaisanpham&idDM=<?=$idDM?>" type="button" class="btn btn-primary">Quay lại</a>
<br>
<br>

<form action="?mod=loaisanpham&idDM=<?=$idDM?>&act=editCSDL" method="POST" role="form" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="" placeholder="" name="idLSP" value="<?= $data['idLSP'] ?>">
    <div class="form-group">
        <label for="">Tên loại sản phẩm</label>
        <input type="text" class="form-control" id="" placeholder="" name="tenLSP" value="<?= $data['tenLSP'] ?>" required>
    </div>
    <div class="form-group">
        <label for="">Danh mục sản phẩm</label>
        <select class="form-control" name="idDM">
            <?php foreach($listDM as $dm) { ?>
                <option value="<?= $dm['idDM'] ?>"><?= $dm['tenDM'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</table>