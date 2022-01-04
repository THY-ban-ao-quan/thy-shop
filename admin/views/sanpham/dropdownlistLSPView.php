<?php
    require_once('connection.php');
    $con = new Connection();
    $data = array();
    
    
    if(isset($_POST['idDM'])){
        $query = "select * from loaisanpham where idDM =".$_POST['idDM']." ";
        $rs = $con->conn->query($query);
        while ($row = $rs->fetch_array()) {
            $data[] = $row;
        }
    }
    echo '<option>Chọn loại sản phẩm</option>';
    foreach ($data as $row) { ?>
        <option value="<?= $row['idLSP'] ?>"><?= $row['tenLSP'] ?></option>
    <?php
    }
    ?>