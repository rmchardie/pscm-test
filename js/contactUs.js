const mapContainer = document.getElementById("map-container");
const contactPhone = document.getElementById("contact-us-phone");

function addMap() {
  const map = document.createElement("iframe");

  map.setAttribute(
    "src",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2232.6062780070183!2d-3.9719547841430805!3d55.973524782414295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4888653246c75c55%3A0x87cb26b385ab96ef!2sPSCM%20Construction%20%26%20Interiors%20Ltd!5e0!3m2!1sen!2suk!4v1659032275415!5m2!1sen!2suk"
  );
  map.setAttribute("width", "1100");
  map.setAttribute("height", "350");
  map.setAttribute("allowfullscreen", "");
  map.setAttribute("loading", "lazy");
  map.setAttribute("referrerpolicy", "no-referrer-when-downgrade");
  map.classList.add("map");
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
