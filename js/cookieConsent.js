const acceptBtn = document.getElementById("accept-btn");
const declineBtn = document.getElementById("decline-btn");
const closeBtn = document.getElementById("closeCookieModal");
const footerBtn = document.getElementById("footer-consent-link");

const contactFormContainer = document.querySelector(".contact-form");
const contactDetailsHeader = document.getElementById("contactDetailsHeader");
const map = document.getElementById("map-container");
const myModal = document.getElementById("myModal");
const alertLabel = document.querySelector(".alert");

let userChoice = getCookie("userChoice");
let contactFormTitle = document.getElementById("how-to-contact-us");
let contactUsText = document.getElementById("contact-us-text");

function openModal() {
  document.getElementById("backdrop").style.display = "block";
  document.getElementById("myModal").style.display = "block";
  document.getElementById("myModal").classList.add("show");
}

function closeModal() {
  document.getElementById("backdrop").style.display = "none";
  document.getElementById("myModal").style.display = "none";
  document.getElementById("myModal").classList.remove("show");
}

function setCookie(cookieName, cookieValue, daysTillCookieExpires) {
  const d = new Date();
  d.setTime(d.getTime() + daysTillCookieExpires * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}

function getCookie(cookieName) {
  let name = cookieName + "=";
  let ca = document.cookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  if (userChoice != "") {
    // User already confirmed choice, don't display modal
    addRecaptcha();
  } else {
    openModal();
  }
}

function deleteCookie() {
  document.cookie =
    "userChoice=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  alertLabel.style.display = "flex";
  alertLabel.classList.add("show");
  setTimeout(() => {
    alertLabel.classList.remove("show");
    alertLabel.style.display = "none";
  }, 5000);
  contactFormContainer.style.display = "none";
  map.parentNode.removeChild(map);
}

function addRecaptcha() {
  const keyScript = document.createElement("script");
  const recaptchaScript = document.createElement("script");

  keyScript.setAttribute("src", "recaptcha/loadRecaptcha.js");
  keyScript.setAttribute("type", "module");

  recaptchaScript.setAttribute(
    "src",
    "https://www.google.com/recaptcha/api.js"
  );

  document.body.appendChild(keyScript);
  document.body.appendChild(recaptchaScript);

  myModal.style.zIndex = "-1000";
  closeModal();

  userChoice = "Yes";

  if (userChoice != "" && userChoice != null) {
    setCookie("userChoice", userChoice, 365);
  }
}

acceptBtn.addEventListener("click", () => {
  location.reload();
  addRecaptcha();
  addMap();
});

closeBtn.addEventListener("click", () => {
  addRecaptcha();
  addMap();
  location.reload();
});

declineBtn.addEventListener("click", () => {
  contactFormContainer.style.display = "none";
  contactDetailsHeader.style.display = "none";
  myModal.style.zIndex = "-1000";
  closeModal();
});

footerBtn.addEventListener("click", deleteCookie);

checkCookie();
