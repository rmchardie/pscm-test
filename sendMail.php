<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Call us, email us or fill out the form to contact us!"
    />
    <title>Contact us - PSCM Construction & Interiors Ltd.</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />

    <!-- Page CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Favourites Icon -->
    <link rel="shortcut icon" href="images/android-chrome-512x512.png" />
  </head>
  <body>
    <body>
      <header>
        <div class="container mb-5">
          <nav class="navbar navbar-sm bg-white fixed-bottom">
            <div class="col">
              <a href="index.html" class="nav-link">
                <i class="bi-house-door"></i>
              </a>
            </div>
            <div class="col">
              <a href="about.html" class="nav-link">
                <i class="bi-people"></i>
              </a>
            </div>
            <div class="col">
              <a href="build.html" class="nav-link">
                <i class="bi-bricks"></i>
              </a>
            </div>
            <div class="col">
              <a href="fit-out.html" class="nav-link">
                <i class="bi-shop-window"></i>
              </a>
            </div>
            <div class="col">
              <a href="#" class="nav-link primary bold-text">
                <i class="bi-envelope"></i>
              </a>
            </div>
          </nav>
          <nav class="navbar navbar-lg bg-white">
            <div class="col">
              <a href="index.html" class="nav-link">
                <i class="bi-house-door"></i> <span>Home</span>
              </a>
            </div>
            <div class="col">
              <a href="about.html" class="nav-link">
                <i class="bi-people"></i> <span>About us</span>
              </a>
            </div>
            <div class="col">
              <a href="build.html" class="nav-link">
                <i class="bi-bricks"></i> <span>Builds</span>
              </a>
            </div>
            <div class="col">
              <a href="fit-out.html" class="nav-link">
                <i class="bi-shop"></i> <span>Fit outs</span>
              </a>
            </div>
            <div class="col">
              <a href="#" class="nav-link primary bold-text">
                <i class="bi-envelope"></i> <span>contact us</span>
              </a>
            </div>
          </nav>
        </div>
      </header>
      <main>
        <!-- Start of Back to top button -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="text-primary"><i class="bi-arrow-up-circle"></i></button>
        <!-- End of Back to top button -->
        <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'PHPMailer\src\Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer\src\SMTP.php';

// Form Authentication
require 'PHPMailer\src\FormAuth.php';

function spamcheck($field)
  {
  //filter_var() sanitizes the e-mail 
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  
  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
if (isset($_REQUEST['email']))
  {//if "email" is filled out, proceed
  //check if the email address is invalid
  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE)
    {
    echo "Invalid input";
    }
  else
    {//send email
    $name = strip_tags($_REQUEST['name']) ; 
    $email = strip_tags($_REQUEST['email']) ;
    $telNo = strip_tags($_REQUEST['telNo']) ;
    $message = strip_tags($_REQUEST['message']) ;
    $success = "
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center text-success'>
        <i class='bi-check-circle'></i>
      </div>
      <div class='col'></div>
    </div>
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center'>
        <p>Thank you for your information request.</p>
        <p>We will contact you within 48 hours.</p>
      </div>
      <div class='col'></div>
    </div>
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center'>
        <p class='font-weight-bold'>While you wait, check out our:</p>
        <a href='build.html' class='btn btn-outline-primary mr-3'>Build Projects</a>
        <a href='fit-out.html' class='btn btn-outline-primary'>Fit out Projects</a>
      </div>
      <div class='col'></div>
    </div>
  </div>";
  $error = "
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center text-error'>
        <i class='bi-x-circle'></i>
      </div>
      <div class='col'></div>
    </div>
    <div class='row'>
      <div class='col'></div>
      <div class='col text-center'>
        <p>There was an error with your input.</p>
        <p>Please resubmit.</p>
      </div>
      <div class='col'></div>
    </div>
  </div>";
  $body = "
  <div style='display: grid; place-items: center; gap: 1em; font-family: Inter; font-size: 20px; color: #555 width: 100vw;'>
  <div>
      <img src='https://www.pscm.uk/images/logo.png' alt='PSCM Logo'>
  </div>
  <div>
      <h1>New Contact Form submission!</h1>
      <hr style='opacity: 0.4;'>
  </div>
  <div style='margin-bottom: 20px;'>
      <strong>$name</strong> has sent the following message:
  </div>
  <div style='background-color: #ccc; padding: 50px 150px; border-radius: 25px; margin-bottom: 20px; text-align: left;'>
      $message
  </div>
  <div style='margin-bottom: 20px;'>
      Reply to: <strong>$email</strong>
      <p>or phone: <strong>$telNo</strong></p>
  </div>
  <div>
      <small>This message was sent from <a href='https://www.pscm.uk'>https://www.pscm.uk</a></small>
  </div>
</div>";

$mail = new PHPMailer(TRUE);

try {
   
   $mail->setFrom('pscm-web-form@outlook.com', 'PSCM Contact Form');
   $mail->addAddress('ross.mchardie@gmail.com', $name);
   $mail->Subject = 'PSCM Contact Form submission';
   $mail->IsHTML(true);
    $mail->Body = $body;
    $mail->AltBody= strip_tags($body);
   
   /* SMTP parameters. */
   $mail->isSMTP();
   $mail->Host = 'smtp.outlook.com';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = $formAuth01;
   $mail->Password = $formAuth02;
   $mail->Port = 587;
   
   /* Disable some SSL checks. */
   $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
   );
   
   /* Finally send the mail. */
   if ($mail->send()) {
       echo $success;
   } else {
       echo $error;
   }
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}
    }
}
?>
</main>
    <footer class="mt-5">
      <div class="container text-center">
        <p>&copy;PSCM. 2020.</p>
      </div>
    </footer>
</body>
</html>