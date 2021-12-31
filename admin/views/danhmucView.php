

<?php
    require_once('./controller/danhMucController.php');
    $controller_dm = new danhMucController();
    $data = $controller_dm->getAllDanhMuc();
    foreach ($data as $row) {
        echo '<a class="collapse-item" href="?mod=loaisanpham&idDM='.$row['idDM'].'">'.$row['tenDM'].'</a>';
    }
?>
