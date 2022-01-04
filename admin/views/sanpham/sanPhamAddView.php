<?php
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $listDM = $dm_controller->getAllDanhMuc();
    //$data = $lsp_controller->getAllDanhMuc($idDM);
?>

<script type="text/javascript">
    function fetch_select(val)
    {
        // alert(val);
        // return false;
        $('#new_select').html('');

        $.ajax({
                type: 'post',
                url: 'views/sanpham/dropdownlistLSPView.php',
                data: {
                    idDM:val
                },
                success: function(response) {
                    //$('#new_select').html(response);
                document.getElementById("new_select").innerHTML=response; 
            }
        });
    }

</script>


<a href="?mod=sanpham" type="button" class="btn btn-primary">Quay lại</a>
        <hr>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <form action="?mod=sanpham&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tenSP" required>
                </div>
                <div class="form-group">
                    <label for="cars">Danh mục: </label>
                    <select id="" name="idDM" class="form-control" onchange="fetch_select(this.value);">
                        <option>Chọn danh mục</option>
                        <?php foreach ($listDM as $row) { ?>
                            <option value="<?= $row['idDM'] ?>"><?= $row['tenDM'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cars">Loại sản phẩm: </label>
                    <select id="new_select" name="idLSP" class="form-control">
                        <!-- list loai sp -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Đơn giá</label>
                    <input type="text" class="form-control" id="" placeholder="" name="donGia" required>
                </div>
                <div class="form-group">
                    <label for="">Mùa</label>
                    <select id="" name="mua" class="form-control">
                        <option >Chọn mùa</option>
                        <option value="X">Xuân</option>
                        <option value="H">Hạ</option>
                        <option value="T">Thu</option>
                        <option value="D">Đông</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" id="moTa" placeholder="" name="MoTa"></textarea>
                    <script>
                        CKEDITOR.replace('moTa')
                    </script>
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </table>
