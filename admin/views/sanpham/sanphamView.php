<?php
    require_once('controller/sanPhamController.php');
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    $sp_controller = new sanPhamController();
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $data = $sp_controller->getAllSanPham();
    
?>
<a href="?mod=sanpham&act=add" type="button" class="btn btn-primary">Thêm mới</a>
<br>
<br>
<?php if (isset($_COOKIE['msg'])) { ?>
<div class="alert alert-success">
    <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
</div>
<?php } ?>
<?php
    if(isset($_COOKIE['msd'])){
        echo '<div class="alert alert-success">
                <strong>Thông báo</strong> 
            </div>';
    }
?>
    
<hr>
<?php
    if($data == null){ ?>
        <p>Không có sản phẩm nào</p>
<?php
    }
    else{
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th scope="col">Mã SP</th>
        <th scope="col">Tên SP</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Mùa</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Loại sản phẩm</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $row['idSP'] ?></td>
            <td><?= $row['tenSP'] ?></td>
            <td><?= $row['donGia'] ?></td>
            <td><?= $row['mua'] ?></td>
            <td><?= $dm_controller->getTenDM($lsp_controller->getIdDanhmuc((int)$row['idLSP'])) ?></td>
            <td><?= $lsp_controller->getTenLoaiSanPham((int)$row['idLSP']) ?></td>
            <td>
                <a href="?mod=sanpham&act=detail&id=<?= $row['idSP'] ?>"><i class="fas fa-info"></i></a> &nbsp;
                <a href="?mod=sanpham&act=edit&id=<?= $row['idSP'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                <a href="?mod=sanpham&act=delete&id=<?= $row['idSP'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            
        </tr>
        <?php } ?>
</table>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>            
<?php
    }
?>
        

