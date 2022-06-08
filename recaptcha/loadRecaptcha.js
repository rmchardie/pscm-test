import { TOKEN } from "../js/recaptcha.js";

const recaptcha = document.getElementById("recaptcha");

function setKey() {
  recaptcha.setAttribute("data-sitekey", TOKEN);
}

setKey();
