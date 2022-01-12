<?php session_start(); ?>
<?php
        if ( !isset( $_SESSION['user_id'] ) ) {
            header("Location: login.html");
        }else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Responsive meta tag -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />

    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <link rel="stylesheet" type="text/css" href="css/login.css" />

    <!-- Font Awesome -->
    <link href="css/all.css" rel="stylesheet" />

    <link rel="shortcut icon" href="images/android-chrome-512x512.png" />

    <title>PSCM Construction & Interiors Ltd.</title>
  </head>
  <body class="text-center">
      <div class="container">
          <div class="row">
              <div class="col">
              <img
        class="mb-4"
        src="images/logo.png"
        alt="PSCM Logo"
      />
              </div>
          </div>
          <div class="row">
              <div class="col">
                <a href="updateScript.php" class="btn btn-primary">Update site</a>
                <a href="logout.php" class="btn btn-outline-primary">Log out</a>
              </div>
          </div>
            <div class="row">
              <div class="col">
                <p class="mt-5 mb-3 text-muted">&copy; PSCM. 2020</p>
              </div>
          </div>
    </form>
  </body>
</html>

<?php
    }
?>