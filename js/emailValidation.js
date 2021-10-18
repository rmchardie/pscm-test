const email = document.getElementById("email");
const emailError = document.getElementById("invalidEmail");
const emailSuccess = document.getElementById("validEmail");
const spamMessage = document.getElementById("spamMessage");

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value))
  {
    console.log("Email valid");
    emailError.hidden = true;
    emailSuccess.hidden = false;
    spamMessage.hidden = true;
    return (true)
  } else {
    console.log("Email invalid");
    emailSuccess.hidden = true;
    emailError.hidden = false;
    spamMessage.hidden = true;
    return (false)
  }
}