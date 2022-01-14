import { valid } from "./valid.js";

const profile = (function () {
  const ele = document.querySelector.bind(document);
  const all = document.querySelectorAll.bind(document);
  function toggleEdit() {
    const button = ele(".profile .profile__edit");
    const inputs = all(".profile .form-control");
    const submit = ele(".profile .btn-group");
    if (!button || !inputs) return;

    button.onclick = function () {
      submit.classList.toggle("active");
      inputs.forEach((item) => {
        item.classList.toggle("active");
        item.readOnly = item.classList.contains("active") ? false : true;
      });
    };
  }

  function validForm() {
    const nameNode = ele("#tenND");
    const emailNode = ele("#emailND");
    const diaChiNode = ele("#diaChi");
    const sdtNode = ele("#SDT");
    const submit = ele(".profile .btn-group .submit");

    if (!nameNode || !emailNode) return;

    submit.onclick = function (e) {
      e.preventDefault();

      valid.clearMessage();

      const arrayValidate = [
        valid.isInvalid(nameNode, [valid.isRequired, valid.isName]),
        valid.isInvalid(emailNode, [valid.isRequired, valid.isEmail]),
      ];

      const isValidForm = arrayValidate.every((item) => !item);

      if (isValidForm)
        $.redirect(
          "?act=account&handle=update",
          {
            tenND: nameNode.value,
            SDT: sdtNode.value,
            email: emailNode.value,
            diaChi: diaChiNode.value,
          },
          "post"
        );
    };
  }
  return {
    toggleEdit,
    validForm,
  };
})();

export { profile };
