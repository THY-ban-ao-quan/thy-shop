import { valid } from "./valid.js";

const ajax_app = (function () {
  async function Send(method, url, data) {
    let result = "";
    await $.ajax({
      url: url,
      type: method,
      data: data ? data : undefined,
      success: function (rs) {
        result = rs;
      },
      error: function (e) {
        console.log(e.message);
      },
    });

    return result;
  }

  function Get(url) {
    return Send("GET", url);
  }
  function Post(url, data) {
    return Send("POST", url, data);
  }

  function Register() {
    $("#form-register")[0].onsubmit = async function (e) {
      e.preventDefault();
      const nameNode = $("#name")[0];
      const emailNode = $("#r_email")[0];
      const passwordNode = $("#r_password")[0];
      const cPasswordNode = $("#r_checkPassword")[0];

      valid.clearMessage();

      const arrayValidate = [
        valid.isInvalid(nameNode, [valid.isRequired, valid.isName]),
        valid.isInvalid(emailNode, [valid.isRequired, valid.isEmail]),
        valid.isInvalid(passwordNode, [valid.isRequired, valid.min(6)]),
        valid.isInvalidCompare(passwordNode, cPasswordNode, [valid.isSame]),
      ];
      const isValidForm = arrayValidate.every((item) => !item);

      if (isValidForm) {
        const data = {
          name: nameNode.value.trim(),
          email: emailNode.value.trim(),
          password: passwordNode.value.trim(),
        };

        const rs = await Post(
          "?act=account&handle=register",
          "data=" + JSON.stringify(data)
        );

        if (rs) {
          valid.createMessage(emailNode, rs);
        } else {
          LoginAction(emailNode.value.trim(), passwordNode.value.trim());
        }
      }
    };
  }

  async function LoginAction(email, password) {
    const data = {
      email: email,
      password: password,
    };

    const res = await Post(
      "?act=account&handle=login",
      "data=" + JSON.stringify(data)
    );

    const rs = JSON.parse(res);

    if (rs.error) {
      alert(rs.error);
    } else {
      $(".modal")[0].classList.remove("active");
      window.location.replace("?act=home");
    }
  }

  function Login() {
    $("#form-login")[0].onsubmit = function (e) {
      e.preventDefault();
      const emailNode = $("#l_email")[0];
      const passwordNode = $("#l_password")[0];

      valid.clearMessage();

      const arrayValidate = [
        valid.isInvalid(emailNode, [valid.isRequired]),
        valid.isInvalid(passwordNode, [valid.isRequired]),
      ];
      const isValidForm = arrayValidate.every((item) => !item);

      if (isValidForm)
        LoginAction(emailNode.value.trim(), passwordNode.value.trim());
    };
  }

  return {
    Get,
    Post,
    Register,
    Login,
  };
})();

export { ajax_app };
