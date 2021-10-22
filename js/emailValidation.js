const emailError = document.getElementById("invalidEmail");
const emailSuccess = document.getElementById("validEmail");
const spamMessage = document.getElementById("spamMessage");
const spamFilter = document.getElementById("spamFilter");

const nameField = document.querySelector('#name');
const emailField = document.querySelector('#email');
const textBox = document.querySelector('#name');
const robotCheckbox = document.querySelector('#notRobot');

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value))
  {
    emailError.hidden = true;
    emailSuccess.hidden = false;
    spamMessage.hidden = true;
    return (true)
  } else {
    emailSuccess.hidden = true;
    emailError.hidden = false;
    spamMessage.hidden = true;
    return (false)
  }
}

document.querySelector('#contactForm').addEventListener("submit", function(event) {
  if (!robotCheckbox.checked || nameField.value === '' || emailField.value === '' || textBox === '') {
    event.preventDefault();
    spamFilter.hidden = false;
  } else {
    spamFilter.hidden = true;
  }

}, true);