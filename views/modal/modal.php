<div class="modal">
  <div class="modal-content">
    <i class="bx bx-x modal-close"></i>

    <!-- login -->
    <div class="login">
      <h2>ĐĂNG NHẬP</h2>
      <form action="" id="form-login">
        <div class="form-group">
          <input type="text" name="email" placeholder="Email" id="l_email" />
        </div>
        <div class="form-group">
          <input
            type="password"
            name="password"
            placeholder="Mật khẩu"
            class="input-password"
            id="l_password"
          />
          <i class="bx bx-hide toggle-password"></i>
        </div>
        <a class="forgot-password" href=".">Quên mật khẩu?</a>
        <button class="button" type="submit">Đăng nhập</button>
      </form>
      <div class="login__register">
        <span>Bạn mới đến THY Shop?</span> <a href=".">Đăng ký</a>
      </div>
    </div>
    <!-- register -->
    <div class="register">
      <h2>Tạo tài khoản</h2>
      <form action="" id="form-register">
        <div class="form-group">
          <input type="text" name="name" placeholder="Họ tên" id="name" />
        </div>
        <div class="form-group">
          <input type="text" name="email" placeholder="Email" id = "r_email" />
        </div>
        <div class="form-group">
          <input
            type="password"
            name="password"
            placeholder="Mật khẩu"
            class="input-password"
            id = "r_password"
          >
          <i class="bx bx-hide toggle-password"></i>
        </input>
        </div>
        <div class="form-group">
          <input
            type="password"
            name="checkPassword"
            placeholder=" Nhập lại mật khẩu"
            class="input-password"
            id = "r_checkPassword"
          />
          <i class="bx bx-hide toggle-password"></i>
        </div>
        <button class="button" type="submit">Đăng ký</button>
      </form>
      <div class="register__login">
        <span>Bạn đã có tài khoản?</span> <a href=".">Đăng nhập</a>
      </div>
    </div>
  </div>
</div>
