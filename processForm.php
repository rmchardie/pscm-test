<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Based in Cumbernauld, we specialise in build and fit out projects across Scotland in Retail, Hospitality, Bar and Commercial environments."
    />
    <meta name="robots" content="noindex, nofollow" />
    <title>Thank you - PSCM Construction & Interiors Ltd.</title>

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
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css"
    />

    <!-- Page CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Favourites Icon -->
    <link rel="shortcut icon" href="images/android-chrome-512x512.png" />

    <!-- Site Manifest -->
    <link rel="manifest" href="manifest.json" />

    <!-- Preferred URL -->
    <link rel="canonical" href="https://www.pscm.uk/" />
  </head>
  <body class="d-flex flex-column min-vh-100">
    <header>
      <div class="container mb-3">
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
            <a href="contact.html" class="nav-link primary bold-text">
              <i class="bi-envelope"></i>
            </a>
          </div>
        </nav>
        <nav class="navbar navbar-lg bg-white">
          <div class="col">
            <a href="index.html" class="nav-link">
              <i class="bi-house-door"></i> <span>home</span>
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
            <a href="contact.html" class="nav-link primary bold-text">
              <i class="bi-envelope"></i> <span>contact us</span>
            </a>
          </div>
        </nav>
      </div>
      <div class="container">
        <div class="hero">
          <img
            src="images/logo.png"
            alt="PSCM logo"
          />
        </div>
      </div>
    </header>
    <main>
      <!-- Start of Back to top button -->
      <button
        onclick="topFunction()"
        id="myBtn"
        title="Go to top"
        class="text-primary"
      >
        <i class="bi-arrow-up-circle"></i>
      </button>
      <!-- End of Back to top button -->
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col-md">
            <h1 class="text-secondary text-center">
              Thank you for contacting us.
            </h1>
        <?php
        // Load SendGrid files and API key
        require "vendor/autoload.php";
        include_once "sendgrid-env.php";

        // Check to see if recaptcha key pairs match
        function reCaptcha($recaptcha)
        {
          $secret = require "recaptcha/recaptcha.php";
          $ip = $_SERVER["REMOTE_ADDR"];

          $postvars = [
            "secret" => $secret,
            "response" => $recaptcha,
            "remoteip" => $ip,
          ];
          $url = "https://www.google.com/recaptcha/api/siteverify";
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_TIMEOUT, 10);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
          $data = curl_exec($ch);
          curl_close($ch);

          return json_decode($data, true);
        }

        // Load form data into variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $honeypot = false;
        $telNo = $_POST["telNo"];
        $message = $_POST["message"];
        $recaptcha = $_POST["g-recaptcha-response"];
        $res = reCaptcha($recaptcha);

        // Check to see if honeypot is 'full'
        if (empty($_POST["custId"])) {
          $honeypot = false;
        } else {
          $honeypot = true;
        }

        // Check to see if the user entered a phone number
        if (empty($_POST["telNo"])) {
          $telNo = "&lt; No phone number given &gt;";
        }

        // Who has filled out the form
        $FROM_NAME = $name;

        // Registered email address on SendGrid
        $FROM_EMAIL = "pscm-web-form@outlook.com";

        // Who the email is being sent to
        $TO_NAME = "PSCM Construction & Interiors";
        $TO_EMAIL = "office@pscm.uk";

        $subject = "New Form Submission";
        $from = new SendGrid\Email("PSCM Contact Form", $FROM_EMAIL);
        $to = new SendGrid\Email($TO_NAME, $TO_EMAIL);
        $htmlContent =
          '<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <div style="font-family: Poppins, sans-serif;">
    <p ><img src="https://rmchardie.github.io/pscm-test/images/logo.png" alt="PSCM Construction & Interiors Ltd"></p>
    <p><h1>New Contact Form Submission</h1></p>
    <p style="font-size: 18px"><strong>' .
          $FROM_NAME .
          '</strong> has filled out the contact form and requires more information from you.</p>
    <p ><img src="https://rmchardie.github.io/pscm-test/images/email.png"  style="margin-right: 10px" width=64 height=64 alt="Email icon"><strong>You can contact them at the following email address:</strong> ' .
          $email .
          '</p>
    <p ><img src="https://rmchardie.github.io/pscm-test/images/telephone.png"  style="margin-right: 10px" width=64 height=64 alt="Phone icon"><strong>Alternatively, you can call them on:</strong> ' .
          $telNo .
          '</p>
    <p ><img src="https://rmchardie.github.io/pscm-test/images/comments.png"  style="margin-right: 10px" width=64 height=64 alt="Comments icon">
    <strong>They left this message:</strong>
    <p style="border: solid 1px #0077ff; padding: 20px; margin: 20px 20px 20px 0; width: 320px">' .
          $message .
          '</p></p>
    </div>';

        // If recaptcha passed and honeypot is empty, check to see if SendGrid sent a success code, if so - send mail!
        if ($res["success"] && $honeypot === false) {
          // Create Sendgrid content
          $content = new SendGrid\Content("text/html", $htmlContent);
          // Create a mail object
          $mail = new SendGrid\Mail($from, $subject, $to, $content);

          // Attempt to send the email and request a response
          $sg = new \SendGrid($API_KEY);
          $response = $sg->client
            ->mail()
            ->send()
            ->post($mail);
          if ($response->statusCode() == 202) {
            echo '<div class="container d-flex justify-content-center align-items-center mb-3 outside success">';
            echo '<div class="inside d-flex justify-content-center align-items-center">';
            echo '<i class="bi bi-envelope-check text-success contact-icon" aria-hidden="true"></i></div>';
            echo "</div>";
            echo '<p class="text-center">Your email has been sent.</p>';
            echo '<p class="text-center">We will review your comments and contact you within 48 hours.</p>';
            echo '<p class="text-center">Have a nice day.</p>';
          }
        } else {
          echo '<div class="container d-flex justify-content-center align-items-center mb-3 outside error">';
          echo '<div class="inside d-flex justify-content-center align-items-center">';
          echo '<i class="bi bi-envelope-x text-danger" aria-hidden="true"></i></div>';
          echo "</div>";
          echo '<h1 class="text-center">Spam or bot detected. Email not sent!</h1>';
          echo '<p class="text-center">If you believe this is an error, please contact us by phone at the number listed or try again later.';
        }
        ?>
            </div>
        </div>
    </div>
    </main>
    <footer class="mt-auto">
      <div class="container text-center">
        <p>&copy;PSCM. 2020.</p>
      </div>
    </footer>
    <!-- Scroll to top button script -->
    <script src="js/backToTop.js"></script>
    </body>
</html>