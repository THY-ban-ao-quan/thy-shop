<?php
    require_once('controller/taiKhoanController.php');
    $tk_controller = new taiKhoanController();
    $data = $tk_controller->getTaiKhoanById($_GET['id']);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a href="?mod=taikhoan" type="button" class="btn btn-primary">Quay lại</a>
    <br>
    <br>
    <!-- <?php if (isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
        </div>
    <?php } ?> -->
    <form action="?mod=taikhoan&act=editCSDL" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="" placeholder="" name="idND" value="<?= $data['idND']?>">
        <div class="form-group">
            <label for="">Họ tên</label>
            <input type="text" class="form-control" id="" placeholder="" name="tenND" value="<?= $data['tenND']?>">
        </div>
        <div class="form-group">
            <label for="">Số Điện Thoại</label>
            <input type="text" class="form-control" id="" placeholder="" name="SDT" value="<?= $data['SDT']?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="Email" class="form-control" id="" placeholder="" name="email" value="<?= $data['email']?>">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" id="" placeholder="" name="diaChi" value="<?= $data['diaChi']?>">
        </div>
        <div class="form-group">
            <label for="">Mật Khẩu</label>
            <input type="Password" class="form-control" id="" placeholder="" name="matKhau" value="<?= $data['matKhau']?>">
        </div>                
        <div class="form-group">
            <label for="">Quyền</label>
            <select class="form-control" name="idQuyen">
                <?php
                    foreach($tk_controller->getAllQuyen() as $qu) { ?>
                        <option <?= ($data['idQuyen'] == $qu['idQuyen'])?'selected':'' ?> value="<?= $qu['idQuyen'] ?>"><?= $qu['quyen'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="checkbox" style="width: 50px; height: 15px; " id="" placeholder="" name="trangThai" <?= $data['trangThai'] == 1 ? "checked":""?>>
            (check để mở tài khoản, bỏ check để khóa tài khoản)
        </div>                  
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</table>
