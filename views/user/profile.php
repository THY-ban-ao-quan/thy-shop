<section class="section profile">
    <div>
        <div class="profile__heading">
            <h1 class="profile__heading">Thông tin cá nhân</h1>
            <button class="profile__edit">
                <i class='bx bxs-pencil'></i>
            </button>
        </div>
        <div class="profile__body">
            <form>
                <?php 
                    $ten = isset($_POST['tenND']) ? $_POST['tenND'] : $user['tenND'];
                    $sdt = isset($_POST['SDT']) ? $_POST['SDT'] : $user['SDT'];
                    $email = isset($_POST['email']) ? $_POST['email'] : $user['email'];
                    $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : $user['diaChi'];
                
                ?>

                <div class="form-group">
                    <label for="tenND">Họ tên</label>
                    <input <?php echo isset($check) ? "" : "readonly"?>  
                    value = "<?php echo $ten?>" id="tenND" name="tenND" type="text" class="form-control <?php echo isset($check) ? "active" : ""?>" placeHolder="Họ tên"/>
                </div>
                <div class="form-group">
                    <label for="SDT">SDT</label>
                    <input  <?php echo isset($check) ? "" : "readonly"?>  id="SDT"
                    value = "<?php echo $sdt?>"
                    name="SDT" type="text" class="form-control <?php echo isset($check) ? "active" : ""?>" placeHolder="Số điện thoại"/>
                </div>
                <div class="form-group">
                    <label for="emailND">Email</label>
                    <input <?php echo isset($check) ? "" : "readonly"?> value = "<?php echo $email?>" id="emailND" name="email" type="text" class="form-control <?php echo isset($check) ? "is-invalid active" : ""?>" placeHolder="Email"/>
                    <?php 
                        if(isset($check)) 
                            echo '<p class="invalid-feedback">Email đã được sử dụng</p>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input <?php echo isset($check) ? "" : "readonly"?>  id="diaChi"
                    value = "<?php echo $diaChi?>"
                    name="diaChi" type="text" class="form-control <?php echo isset($check) ? "active" : ""?>" placeHolder="Địa chỉ"/>
                </div>
                <div class="btn-group <?php echo isset($check) ? "active" : ""?>">
                    <input type="submit" class="submit" value="Lưu" />
                </div>
            </form>
        </div>
    </div>
</section>