const alertLabel = document.querySelector(".alert");
const consentBtn = document.getElementById("remove-btn");
const footerBtn = document.getElementById("footer-consent-link");

let userChoice = getCookie("userChoice");

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
    consentBtn.style.display = "flex";
  } else {
    consentBtn.style.display = "none";
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
  consentBtn.style.display = "none";
}

consentBtn.addEventListener("click", deleteCookie);

checkCookie();
