<?php
    $idDM = $_GET['idDM'];
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<a href="?mod=loaisanpham&idDM=<?=$idDM?>" type="button" class="btn btn-primary">Quay lại</a>
<br>
<br>

<form action="?mod=loaisanpham&idDM=<?=$idDM?>&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên loại sản phẩm</label>
        <input type="text" class="form-control" id="" placeholder="" name="tenLSP" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</table>