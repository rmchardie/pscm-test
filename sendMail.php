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
    <title>Contact Form submission - PSCM Construction & Interiors Ltd.</title>

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
    <style>
      body {
        overflow: hidden;
      }

      footer {
        position: absolute;
        width: 100vw;
        bottom: 0;
      }
    </style>
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

  require("sendgrid-php/sendgrid-php.php");
  require("sendgrid-php/sendgrid-env.php");

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
if (isset($_REQUEST['email']) && empty($_REQUEST['custId']))
  {//if "email" is filled out and honeypot is not 'full', proceed
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
  $body = "<p><img src='https://www.pscm.uk/images/logo.png' alt='PSCM Logo'></p>
  <p>You have received a new contact form submission from <strong>$name</strong></p>
  <p>You can contact them on:</p>
  <table style='border: 1px solid #0077ff;'>
  <tr style='border: 1px solid #0077ff;'>
    <th style='background-color: #0077ff; color: #fff;'>Email</th>
    <th style='background-color: #0077ff; color: #fff;'>Phone</th>
  </tr>
  <tr style='border: 1px solid #0077ff;'>
    <td>$email</td>
    <td>$telNo</td>
  </tr>
</table>
<div><p>Message:</p><p style='border: 1px solid #0077ff;'>$message</p></div>
<div><p><small>This message was sent from <a href='https://www.pscm.uk'>https://www.pscm.uk</a></small></p></div>";
$success = "
  <div class='row mb-3'>
    <div class='col text-center'>
      <img src='images/logo.png' alt='PSCM Logo' />
    </div>
  </div>
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
        <p>Thank you for your contacting us.</p>
        <p>Our aim is to reply within 48 hours.</p>
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
    </div>";
  $error = "
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center text-danger'>
        <i class='bi-x-circle'></i>
      </div>
      <div class='col'></div>
    </div>
    <div class='row'>
      <div class='col'></div>
      <div class='col text-center'>
        <p>There was an error sending your message.</p>
        <p>Please try again later.</p>
      </div>
      <div class='col'></div>
    </div>
  </div>";
    
  $email = new SendGrid\Mail\Mail; 
  $email->setFrom("pscm-web-form@outlook.com", "PSCM Contact Form");
  $email->setSubject("New Contact Form submission");
  $email->addTo("office@pscm.uk", "PSCM Construction & Interiors Ltd");
  $email->addContent("text/plain", strip_tags($body));
  $email->addContent("text/html", $body);
  $sendgrid = new SendGrid($apiKey);
  try {
      $response = $sendgrid->send($email);
      echo $success;
      // print $response->statusCode() . "\n";
      // print_r($response->headers());
      // print $response->body() . "\n";
  } catch (Exception $e) {
      // echo 'Caught exception: '. $e->getMessage() ."\n";
      echo $error . "\n" . $e . "\n";
  }
}
  } else {
    echo "<p class='text-danger font-weight-bold'>SPAM DETECTED! EMAIL NOT SENT</p>";
  }
?>
</main>
<footer class="mt-5">
      <div class="container text-center">
        <nav>
          <ul>
            <li>
              <a href="index.html" class="text-secondary"
                ><i
                  class="bi-house-door"
                  style="margin-right: 8px; vertical-align: middle"
                ></i
                >Home</a
              >
            </li>
            <li>
              <a href="#" class="text-secondary"
                ><i
                  class="bi-people"
                  style="margin-right: 8px; vertical-align: middle"
                ></i
                >About us</a
              >
            </li>
            <li>
              <a href="build.html" class="text-secondary"
                ><i
                  class="bi-bricks"
                  style="margin-right: 8px; vertical-align: middle"
                ></i
                >Builds</a
              >
            </li>
            <li>
              <a href="fit-out.html" class="text-secondary"
                ><i
                  class="bi-shop"
                  style="margin-right: 8px; vertical-align: middle"
                ></i
                >Fit outs</a
              >
            </li>
            <li>
              <a href="#"
                ><i
                  class="bi-envelope"
                  style="margin-right: 8px; vertical-align: middle"
                ></i
                >Contact us</a
              >
            </li>
          </ul>
        </nav>
        <p class="text-right">&copy;PSCM. 2020.</p>
      </div>
    </footer>
  </body>
</html>