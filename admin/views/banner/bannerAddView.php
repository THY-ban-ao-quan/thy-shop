<?php
require_once('controller/khuyenMaiController.php');
$km_controller = new khuyenMaiController();
$data = $km_controller->getAllKhuyenMai();
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a href="?mod=banner" type="button" class="btn btn-primary">Quay lại</a>
    <br>
    <br>
    <?php if (isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
        </div>
    <?php } ?>
    <form action="?mod=banner&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Chương trình khuyến mãi</label>
            <select name="id" class="form-control">
                <?php
                foreach ($data as $km) {
                ?>
                    <option value="<?= $km['idKM'] ?>"><?= $km['tenKM'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <input type="file" class="form-control" id="" placeholder="" name="anh">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="checkbox" style="width: 50px; height: 15px; " id="" placeholder="" name="trangThai">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>