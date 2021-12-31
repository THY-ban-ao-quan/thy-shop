<?php
    require_once('controller/taiKhoanController.php');
    $tk_controller = new taiKhoanController();
    $data = $tk_controller->getAllTaiKhoan();
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
            <form action="?mod=taikhoan&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tenND">
                </div>
                <div class="form-group">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="" placeholder="" name="SDT">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="Email" class="form-control" id="" placeholder="" name="email">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" placeholder="" name="diaChi">
                </div>
                <div class="form-group">
                    <label for="">Mật Khẩu</label>
                    <input type="Password" class="form-control" id="" placeholder="" name="matKhau">
                </div>                
                <div class="form-group">
                    <label for="">Quyền</label>
                    <select class="form-control" name="idQuyen">
                        <?php
                            foreach($tk_controller->getAllQuyen() as $qu) { ?>
                                <option value="<?= $qu['idQuyen'] ?>"><?= $qu['quyen'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </table>
