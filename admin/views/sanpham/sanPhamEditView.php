<?php
    require_once('controller/loaiSanPhamController.php');
    require_once('controller/danhMucController.php');
    require_once('controller/sanPhamController.php');
    $lsp_controller = new loaiSanPhamController();
    $dm_controller = new danhMucController();
    $sp_controller = new sanPhamController();
    $listDM = $dm_controller->getAllDanhMuc();


    $idSP = $_GET['id'];
    $sanPham = $sp_controller->getSanPhamById($idSP);
?>

<script type="text/javascript">
    function fetch_select(val)
    {
       
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
            <form action="?mod=sanpham&act=editCSDL" method="POST" role="form" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="" placeholder="" name="idSP" value="<?= $sanPham['idSP'] ?>">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tenSP" value="<?= $sanPham['tenSP'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="cars">Danh mục: </label>
                    <select id="" name="idDM" class="form-control" onchange="fetch_select(this.value);">
                        <option>Chọn danh mục</option>
                        <?= $idDM = $lsp_controller->getIdDanhmuc((int)$sanPham['idLSP']) ?>
                        <?php foreach ($listDM as $row) { ?>
                            <option <?= ($idDM == $row['idDM'])?'selected':''?> value="<?= $row['idDM'] ?>"><?= $row['tenDM'] ?></option>
                            
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cars">Loại sản phẩm: </label>
                    <select id="new_select" name="idLSP" class="form-control">
                        <!-- list loai sp -->
                        <?php
                        foreach ($lsp_controller->getAllDanhMuc($idDM) as $row) { ?>
                            <option <?= ($sanPham['idLSP'] == $row['idLSP'])?'selected':''?> value="<?= $row['idLSP'] ?>"><?= $row['tenLSP'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Đơn giá</label>
                    <input type="text" class="form-control" id="" placeholder="" name="donGia" value="<?= $sanPham['donGia'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Mùa</label>
                    <select  id="" name="mua" class="form-control">
                        <option >Chọn mùa</option>
                        <option <?= ($sanPham['mua'] == "X")?'selected':''?> value="X">Xuân</option>
                        <option <?= ($sanPham['mua'] == "H")?'selected':''?> value="H">Hạ</option>
                        <option <?= ($sanPham['mua'] == "T")?'selected':''?> value="T">Thu</option>
                        <option <?= ($sanPham['mua'] == "D")?'selected':''?> value="D">Đông</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Chọn màu</label>
                    <div>
                        <?php
                            $data = array('Đen', 'Trắng','Hồng');
                            foreach ($data as $key) { ?>
                                <input <?= $sp_controller->kiemTraMauDaChon($sanPham['idSP'],$key) ?'checked':''?> 
                                type="checkbox" name="mau[]" value="<?= $key ?>">&nbsp;&nbsp;<?= $key ?> &nbsp;&nbsp;&nbsp;&nbsp;
                            <?php       
                                }
                            ?>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" id="moTa" placeholder="" name="MoTa" value="<?= $sanPham['moTa'] ?>"></textarea>
                    <script>
                        CKEDITOR.replace('moTa')
                    </script>
                </div>
                <!-- <div class="form-group" id="formUpload">
                    <input type="file" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
                    <div class="box-preview-img"></div>
                </div> -->
                
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </table>
<!-- <script>
    // xem hình ảnh trước khi upload
    function previewImg(event)
    // Gán giá trị các file vào biến files
    var files = document.getElementById('img_file').files;
    // Show khung chứa hình nhìn thấy trước
    $('#formUpload .box-preview-img').show();
    // Thêm chữ "Xem trước" vào khung
    $('#formUpload .box-preview-img').html('Xem trước');

    // sử dụng vòng lặp for để thêm các thẻ img vào khung chứa hình xem trước
    for (i = 0; i < files.length; i++)
    // Thêm thẻ img theo i
    $('#formUpload .box-preview-img').append('');
    // Thêm src vào mỗi thẻ img theo id = i
    $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
</script> -->

