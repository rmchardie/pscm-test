const contactForm = document.getElementById("contactForm");

const emailError = document.getElementById("invalidEmail");
const emailSuccess = document.getElementById("validEmail");
const spamMessage = document.getElementById("spamMessage");
const spamFilter = document.getElementById("spamFilter");
const recaptchaCheck = document.querySelector(".recaptchaCheck");
const invalidInput = document.querySelector(".invalidInput");

const nameField = document.querySelector("#name");
const emailField = document.querySelector("#email");
const messageField = document.querySelector("#message");

function validateReCAPTCHA(event) {
  let response = grecaptcha.getResponse();
  if (response.length == 0) {
    //reCaptcha not verified
    spamFilter.hidden = false;
    recaptchaCheck.hidden = false;
    event.preventDefault();
    return false;
  }
  //captcha verified
  recaptchaCheck.hidden = true;
  validateInput(event);
}

function validateEmail(mail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value)) {
    emailError.hidden = true;
    emailSuccess.hidden = false;
    spamMessage.hidden = true;
    return true;
  } else {
    emailSuccess.hidden = true;
    emailError.hidden = false;
    spamMessage.hidden = true;
    return false;
  }
}

function validateInput(event) {
  if (
    nameField.value === "" ||
    emailField.value === "" ||
    (messageField === "" && response.length != 0)
  ) {
    event.preventDefault();
    spamFilter.hidden = false;
    invalidInput.hidden = false;
    recaptchaCheck.hidden = true;
  } else {
    spamFilter.hidden = true;
  }
}

contactForm.addEventListener("submit", validateReCAPTCHA);
