<?php
  session_start();
  if (isset($_SESSION['loginAdminId'])) {
    header('location:dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>add a new admin</title>

    <!-- vendor css -->
    <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="assets/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> FMA <span class="tx-normal">]</span></div>
        <form action="login.php" method="post">
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_SESSION['loginemailv'])) echo $_SESSION['loginemailv'] ?? "" ?>">
              <span class="text-danger">
                <?php
                    if (isset($_SESSION['email'])) {
                      echo $_SESSION['email'];
                      unset($_SESSION['email']);
                    }
                  ?>
              </span>
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter your password" value="<?php if(isset($_SESSION['loginpassv'])) echo $_SESSION['loginpassv'] ?? "" ?>">
              <span class="text-danger">
                <?php
                    if (isset($_SESSION['password'])) {
                      echo $_SESSION['password'];
                      unset($_SESSION['password']);
                    }
                  ?>
              </span>
          </div><!-- form-group -->
         
          <button type="submit" class="btn btn-info btn-block">Login</button>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    <script src="assets/lib/jquery/jquery.js"></script>
    <script src="assets/lib/popper.js/popper.js"></script>
    <script src="assets/lib/bootstrap/bootstrap.js"></script>
    <script src="assets/lib/select2/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(function(){
        'use strict';
        $('.select2').select2({
            minimumResultsForSearch: Infinity
          });
        });
    </script>
    
  </body>
</html>
