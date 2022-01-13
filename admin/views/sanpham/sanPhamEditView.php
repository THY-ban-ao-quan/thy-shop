<?php
require_once('controller/loaiSanPhamController.php');
require_once('controller/danhMucController.php');
require_once('controller/sanPhamController.php');
require_once('controller/mauController.php');
require_once('controller/sizeController.php');
$lsp_controller = new loaiSanPhamController();
$dm_controller = new danhMucController();
$sp_controller = new sanPhamController();
$m_controller = new mauController();
$s_controller = new sizeController();
$listDM = $dm_controller->getAllDanhMuc();


$idSP = $_GET['id'];
$sanPham = $sp_controller->getSanPhamById($idSP);
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<style>
    /* Box upload */
    .box-upload {
        width: 500px;
        margin: 20px auto;
        border: 1px solid #e5e5e5;
        background-color: #fff;
        padding: 10px;
    }

    .box-upload h2 {
        text-align: center;
        margin-bottom: 20px;
    }




    .box-preview-img {
        margin-top: 5px;
        display: block;
    }

    .box-preview-img p {
        font-weight: bold;
    }

    .box-preview-img img {
        width: 100px;
        height: 100px;
        border: 1px solid #e5e5e5;
        margin-right: 5px;
    }

    button.btn-reset {
        background-color: #fff;
        border: 1px solid #ccc;
        color: #444;
        margin-top: 5px;

    }

    button.btn-submit {
        background-color: #428bca;
        border: 1px solid #428bca;
        color: #fff;
    }

    .output {
        display: none;
        background-color: #d9534f;
        color: #fff;
        padding: 7px;
        border-radius: 4px;
        margin-top: 10px;
    }

    .success {
        background-color: #5cb85c;
    }
</style>
<script type="text/javascript">
    function fetch_select(val) {

        $('#new_select').html('');

        $.ajax({
            type: 'post',
            url: 'views/sanpham/dropdownlistLSPView.php',
            data: {
                idDM: val
            },
            success: function(response) {
                document.getElementById("new_select").innerHTML = response;
            }
        });
    }
</script>
<a href="?mod=sanpham" type="button" class="btn btn-primary">Quay lại</a>
<hr>
<?php if (isset($_COOKIE['msgsize'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msgsize'] ?>
    </div>
<?php } ?>
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
                    <option <?= ($idDM == $row['idDM']) ? 'selected' : '' ?> value="<?= $row['idDM'] ?>"><?= $row['tenDM'] ?></option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="cars">Loại sản phẩm: </label>
            <select id="new_select" name="idLSP" class="form-control">
                <!-- list loai sp -->
                <?php
                foreach ($lsp_controller->getAllloaiSanPham() as $row) { ?>
                    <option <?= ($sanPham['idLSP'] == $row['idLSP']) ? 'selected' : '' ?> value="<?= $row['idLSP'] ?>"><?= $row['tenLSP'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Đơn giá</label>
            <input type="text" class="form-control" id="" placeholder="" name="donGia" value="<?= $sanPham['donGia'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Mùa</label>
            <select id="" name="mua" class="form-control">
                <option>Chọn mùa</option>
                <option <?= ($sanPham['mua'] == "X") ? 'selected' : '' ?> value="X">Xuân</option>
                <option <?= ($sanPham['mua'] == "H") ? 'selected' : '' ?> value="H">Hạ</option>
                <option <?= ($sanPham['mua'] == "T") ? 'selected' : '' ?> value="T">Thu</option>
                <option <?= ($sanPham['mua'] == "D") ? 'selected' : '' ?> value="D">Đông</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Chọn màu</label>
            <div>
                <?php
                $data = array();
                $listMau = $m_controller->getAllMau();
                foreach ($listMau as $mau) {
                    $data[] = $mau['mau'];
                }
                foreach ($data as $key) {
                    $ktChon = $sp_controller->kiemTraMauDaChon($sanPham['idSP'], $key); ?>
                    <input <?= $ktChon ? 'checked' : '' ?> type="checkbox" class="btn btn-primary <?= $ktChon ? '' : 'collapsed' ?>" data-toggle="collapse" href="#<?= str_replace(" ", "_", $key)  ?>" role="button" aria-expanded="<?= $ktChon ? 'true' : 'false' ?>" aria-controls="<?= str_replace(" ", "_", $key) ?>" name="mau[]" value="<?= $key ?>">
                    &nbsp;&nbsp;<?= $key ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;


                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse <?= $ktChon ? 'show' : '' ?>" id="<?= str_replace(" ", "_", $key) ?>">
                                <div class=" card-body">
                                    <label for="">Size của màu <?= $key ?></label>
                                    <?php
                                    $dataSize = array();
                                    $listSize = $s_controller->getAllSize();
                                    foreach ($listSize as $size) {
                                        $dataSize[] = $size['size'];
                                    }
                                    $dem = 1;
                                    foreach ($dataSize as $i) {
                                        //kiểm tra size đã chọn
                                        $ktSize = $sp_controller->kiemTraSizeDaChon($sanPham['idSP'], $key, $i);
                                        $ktSoLuong = $sp_controller->kiemTraSoLuong($sanPham['idSP'], $key, $i);
                                        if ($dem++ % 8 == 1) {
                                            echo '<br><br>';
                                        } ?>

                                        <input class="<?= $ktSize ? '' : 'collapsed' ?>" <?= $ktSize ? 'checked' : '' ?> type="checkbox" name="<?= str_replace(" ", "_", $key) ?>_size[]" value="<?= $i ?>" data-toggle="collapse" href="#<?= str_replace(" ", "_", $key) . "_" . $i ?>_soLuong" role="button" aria-expanded="<?= $ktSize ? 'true' : 'false' ?>" aria-controls="<?= str_replace(" ", "_", $key) . "_" . $i ?>_soLuong">
                                        &nbsp;&nbsp;<?= $i ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="collapse multi-collapse <?= $ktSize ? 'show' : '' ?>" id="<?= str_replace(" ", "_", $key) . "_" . $i ?>_soLuong">
                                            <div class=" card-body">
                                                <label for="">Số lượng</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="<?= str_replace(" ", "_", $key) . "_" . $i ?>_soLuong" value="<?= $ktSoLuong ?>">
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <br>
                                    <br>
                                    <?php
                                    //get ảnh
                                    $listAnh = $sp_controller->getAnhByIdSPMau($_GET['id'], $key);
                                    if (count($listAnh) > 0) {
                                        echo 'Hình ảnh';
                                    }
                                    foreach ($listAnh as $anh) {
                                    ?>
                                        <img style="width: 150px; height: 150px;" src="../assets/img/products/<?= $anh['linkAnh'] ?>">
                                    <?php
                                    }
                                    ?>

                                    <?php $idAnh = $sanPham['idSP'] . "_" . str_replace(" ", "_", $key) ?>
                                    <div class="form-group" id="formUpload<?= $idAnh ?>">
                                        <label>Chọn ảnh</label><br>

                                        <input type="file" name="<?= $idAnh ?>_img_file[]" multiple="true" onchange="<?= 'previewImg' . $idAnh . '(event)' ?>;" id="<?= $idAnh ?>_img_file" accept="image/*">
                                        <div class="<?= $idAnh ?>_box-preview-img box-preview-img"></div>
                                        <button type="reset" class="btn-reset">Làm mới</button>
                                        <div class="output"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Xem hình ảnh trước khi upload
                        function <?= 'previewImg' . $idAnh . '(event)' ?> {
                            // Gán giá trị các file vào biến files
                            var files = document.getElementById('<?= $idAnh ?>_img_file').files;

                            // Show khung chứa ảnh xem trước
                            $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img').show();

                            // Thêm chữ "Xem trước" vào khung
                            $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img').html('<p>Xem trước</p>');

                            // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
                            for (i = 0; i < files.length; i++) {
                                // Thêm thẻ img theo i
                                $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img').append('<img src="" id="' + i + '">');

                                // Thêm src vào mỗi thẻ img theo id = i
                                $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img img:eq(' + i + ')').attr('src', URL.createObjectURL(event.target.files[i]));
                            }
                        }

                        // Nút reset form upload
                        $('#formUpload<?= $idAnh ?> .btn-reset').on('click', function() {
                            // Làm trống khung chứa hình ảnh xem trước
                            $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img').html('');

                            // Hide khung chứa hình ảnh xem trước
                            $('#formUpload<?= $idAnh ?> .<?= $idAnh ?>_box-preview-img').hide();

                            // Hide khung hiển thị kết quả
                            $('#formUpload<?= $idAnh ?> .output').hide();
                        });
                    </script>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</table>
<!-- jquery form -->