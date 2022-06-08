const mapContainer = document.getElementById("map-container");
const contactPhone = document.getElementById("contact-us-phone");

function addMap() {
  const map = document.createElement("iframe");

  map.setAttribute(
    "src",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1877.3956288815398!2d-3.9724156727027844!3d55.973421485104986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488865928bb9beed%3A0x7124e647ca080261!2s63%20Napier%20Rd%2C%20Cumbernauld%2C%20Glasgow%20G68%200EF!5e0!3m2!1sen!2suk!4v1634400741710!5m2!1sen!2suk"
  );
  map.setAttribute("width", "1100");
  map.setAttribute("height", "350");
  map.setAttribute("allowfullscreen", "");
  map.setAttribute("loading", "lazy");
  map.style.border = "0";
  map.style.borderRadius = "10px";
  mapContainer.appendChild(map);
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
    addMap();
  } else {
    contactPhone.style.display = "flex";
    contactPhone.style.flexDirection = "column";
    contactPhone.style.justifyContent = "center";
    contactPhone.style.alignItems = "center";
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
  contactPhone.style.display = "flex";
}

checkCookie();
