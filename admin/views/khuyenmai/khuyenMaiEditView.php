<?php

require_once('controller/khuyenMaiController.php');
$km_controller = new khuyenMaiController();
$data = $km_controller->getKhuyenMai();
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a href="?mod=khuyenmai" type="button" class="btn btn-primary">Quay lại</a>
    <br>
    <br>

    <form action="?mod=khuyenmai&act=editCSDL" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="" placeholder="" name="idKM" value="<?= $data['idKM'] ?>">
        <div class="form-group">
            <label for="">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="tenKM" value="<?= $data['tenKM'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="" placeholder="" name="ngayBD" value="<?= $data['ngayBD'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Ngày kết thúc</label>
            <input type="date" class="form-control" id="" placeholder="" name="ngayKT" value="<?= $data['ngayKT'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Phần trăm khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="phanTram" value="<?= $data['phanTram'] ?>" required>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</table>