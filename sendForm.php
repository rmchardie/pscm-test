<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Responsive meta tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Call us, drop us an email or fill out the form to get in touch with us">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Font Awesome -->
    <link href="css/all.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/android-chrome-512x512.png">

    <title>Contact us - PSCM Construction & Interiors Ltd.</title>
  </head>
  <body>
    <!-- Header Area (with responsive navbar) -->
    <header>
      <div class="container menu">
        <nav class="navbar navbar-expand-md navbar-light">
          <a class="navbar-brand logo-big" href="index.html"><img src="images/logo.png" alt="PSCM logo"></a>
          <div class="navbar-nav navbar-brand logo"><a href="index.html">PSCM</a></div>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="index.html" class="nav-link text-primary">home</a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="about.html" class="nav-link text-primary">about us</a>
              </li>
              <hr>
              <li class="nav-item dropdown dd-menu">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  what we do
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="build.html">
                    <i class="fas fa-tools" style="margin-right: 10px;"></i>build
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="fit-out.html">
                    <i class="fas fa-store-alt" style="margin-right: 10px;"></i>fit outs
                  </a>
                </div>
              </li>
              <li class="nav-item dd-links">
                <div class="nav-link">what we do</div>
              </li>
              
              <li class="nav-item">
                <a href="build.html" class="nav-link text-primary dd-links">build</a>
              </li>
              <li class="nav-item">
                <a href="fit-out.html" class="nav-link text-primary dd-links">fit outs</a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="#" class="nav-link btn active btn-secondary text-white">contact us</a>
              </li>
            </ul>
          </div>
        </nav>
    </div>
    </header>

    <main>
      <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-primary"><i class="fa fa-chevron-up"></i></button>
      <div class="contact-form">
          <div class="container">
            <h2 class="text-secondary">Contact us</h2>
            <hr />
            <?php
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
    $name = $_REQUEST['name'] ; 
    $email = $_REQUEST['email'] ; 
    $subject = "PSCM Information Request" ;
    $message = $_REQUEST['message'] ;
    mail("rmc02@live.com", $subject,
    $message, "From: $name <$email>");
    echo "
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center text-success'>
        <i class='fa fa-check success-icon'></i>
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
    }
  }
else
  {//if "email" is not filled out, do not submit
    echo "
    <div class='row mb-3'>
      <div class='col'></div>
      <div class='col text-center text-error'>
        <i class='fa fa-check error-icon'></i>
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
  }
?>
    </main>
    <footer class="fixed-bottom">
      <div class="container">
        <div class="row">
          <!-- Logo -->
          <div class="col-md">
            <a href="index.html"><img src="images/logo.png" alt="bottom PSCM logo"></a>
          </div>
          <!-- Navigation -->
          <div class="col-md footer-links">
            <h5>Navigation</h5>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li>
                What we do
                <a href="build.html"><i class="fas fa-tools" style="margin-right: 10px;"></i>Build</a>
                <a href="fit-out.html"><i class="fas fa-store-alt" style="margin-right: 10px;"></i>Fit outs</a>
              </li>
              <li><a href="contact.html" class="active text-secondary">Contact us</a></li>
            </ul>
          </div>
          <!-- Social Media -->
          <div class="col-md social-links">
            <h5>Keep Connected</h5>
            <ul>
              <li class="nav-item">
                <a class="nav-link h2 text-primary" href="#"><i class="fab fa-facebook-square"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link h2 text-primary" href="#"><i class="fab fa-twitter-square"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link h2 text-primary" href="#"><i class="fab fa-pinterest-square"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link h2 text-primary" href="#"><i class="fab fa-linkedin"></i></a>
              </li>                
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript for back to top scroll button -->
    <script src="js/backToTop.js"></script>
    <!-- JavaScript for Bootstrap components -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>