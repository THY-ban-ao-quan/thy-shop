    <?php
    require_once('controller/taiKhoanController.php');
    $tk_controller = new taiKhoanController();
    $data = $tk_controller->getAllTaiKhoan();
    ?>
    <a href="?mod=taikhoan&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
        <p>Không có tài khoản nào</p>
    <?php
    }
    else{
    ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th scope="col">Mã ND</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">SDT</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Quyền hạn</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $row['idND'] ?></td>
            <td><?= $row['tenND'] ?></td>
            <td><?= $row['SDT'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['diaChi'] ?></td>
            <td><?= $row['idQuyen'] ?></td>
            <td><?= $row['trangThai'] == 1? "Hoạt động":"Khóa" ?></td>
            <td>
                <a href="?mod=taikhoan&act=detail&id=<?= $row['idND'] ?>"><i class="fas fa-info"></i></a> &nbsp;
                <a href="?mod=taikhoan&act=edit&id=<?= $row['idND'] ?>"><i class="fas fa-edit"></i></a> &nbsp;
                <a href="?mod=taikhoan&act=delete&id=<?= $row['idND'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            
        </tr>
        <?php } ?>
    </table>

    <?php
    }
    ?>