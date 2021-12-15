import { ajax_app } from "./ajax_app.js";
const REGEX_EMAIL =
  /^([a-zA-Z0-9\.\_]+)(\+([0-9]+))?@([a-zA-Z0-9\.\-]+){1,63}\.[a-zA-Z]{1,5}$/;
const REGEX_NAME =
  /^[A-Za-z\u00C0-\u024F\u1E00-\u1EFF]+(\s?([A-Za-z\u00C0-\u024F\u1E00-\u1EFF]+)?)+$/;

const valid = (function () {
  function isRequired(value) {
    return value.trim() ? false : "Trường này là bắt buộc";
  }

  function isEmail(value) {
    return REGEX_EMAIL.test(value) ? false : "Email không đúng định dạng";
  }

  function isName(value) {
    return REGEX_NAME.test(value) ? false : "Không đúng định dạng";
  }

  const min = (minValue) => (value) =>
    value.length > minValue - 1
      ? false
      : `Mật khẩu phải có độ dài tối thiểu là ${minValue}`;

  const isSame = (value1, value2) =>
    value1 === value2 ? false : `Mật khẩu không khớp`;

  function createMessage(node, message) {
    const messageNode = document.createElement("p");
    messageNode.className = "invalid-feedback";
    messageNode.textContent = message;
    node.parentElement.appendChild(messageNode);
    node.classList.add("is-invalid");
    return messageNode;
  }

  function isInvalid(node, funcs) {
    for (const func of funcs) {
      let value = node !== null ? node.value : "";

      const message = func(value);
      if (message) {
        createMessage(node, message);
        return message;
      }
    }
    return false;
  }

  function isInvalidCompare(node1, node2, funcs) {
    const value1 = node1.value;
    const value2 = node2.value;
    for (const func of funcs) {
      const message = func(value1, value2);
      if (message) {
        createMessage(node2, message);
        return message;
      }
    }
    return false;
  }

  function clearMessage() {
    const invalidFeedbacks = document.querySelectorAll(".invalid-feedback");
    const invalidInputs = document.querySelectorAll(".is-invalid");

    invalidFeedbacks.forEach((item) => item.remove());
    invalidInputs.forEach((item) => item.classList.remove("is-invalid"));
  }
  return {
    isRequired,
    isEmail,
    isName,
    min,
    isSame,
    isInvalid,
    isInvalid,
    isInvalidCompare,
    clearMessage,
    createMessage,
  };
})();

export { valid };
