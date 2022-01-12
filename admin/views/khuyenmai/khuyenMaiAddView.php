<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a href="?mod=khuyenmai" type="button" class="btn btn-primary">Quay lại</a>
    <br>
    <br>

    <form action="?mod=khuyenmai&act=addCSDL" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="" placeholder="" name="idKM" value="">
        <div class="form-group">
            <label for="">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="tenKM" value="" required>
        </div>
        <div class="form-group">
            <label for="">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="" placeholder="" name="ngayBD" value="" required>
        </div>
        <div class="form-group">
            <label for="">Ngày kết thúc</label>
            <input type="date" class="form-control" id="" placeholder="" name="ngayKT" value="" required>
        </div>
        <div class="form-group">
            <label for="">Phần trăm khuyến mãi</label>
            <input type="text" class="form-control" id="" placeholder="" name="phanTram" value="" required>
        </div>



        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>