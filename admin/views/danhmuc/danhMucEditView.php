
<?php
    require_once('controller/danhMucController.php');
    $dm_controller = new danhMucController();
    $data = $dm_controller->getDanhMucById($_GET['id']);
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<a href="?mod=danhmuc" type="button" class="btn btn-primary">Quay lại</a>
<br>
<br>

<form action="?mod=danhmuc&act=editCSDL" method="POST" role="form" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="" placeholder="" name="idDM" value="<?= $data['idDM'] ?>" >
    <div class="form-group">
        <label for="">Tên danh mục sản phẩm</label>
        <input type="text" class="form-control" id="" placeholder="" name="tenDM" value="<?= $data['tenDM'] ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</table>