<?php
require_once('controller/mauController.php');
$m_controller = new mauController();
$data = $m_controller->getAllMau();
?>
<form action="?mod=mau&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Màu</label>
        <input type="text" class="form-control" id="" placeholder="" name="mau" required>
    </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
<!-- <a href="?mod=mau&act=add" type="button" class="btn btn-primary">Thêm mới</a> -->
<br>
<br>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Màu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $row) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['mau'] ?></td>

            </tr>
        <?php } ?>
</table>