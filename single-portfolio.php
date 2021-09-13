<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Collis Personal Portfolio HTML5 Template">
    <meta name="keywords" content="Personal, Portfolio, resume, cv, developer, personal resume, expart, professional, one page, onepage, HTML5, Template">
    <meta name="author" content="Awesome_Theme">

    <title>Collis - Personal Portfolio HTML5 Template</title>

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="assets/images/apple-icon.png" rel="icon" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- material iconic font CSS -->
    <link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- Animated-text CSS -->
    <link href="assets/css/animated-text.css" rel="stylesheet">
    <!-- Slick CSS -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Slick theme CSS -->
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link href="assets/css/lightbox.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- YTPlayer CSS -->
    <link href="assets/css/jquery.mb.YTPlayer.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Preloader start -->
    <div id="preloader">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="lading"></div>
        </div>
    </div>

    <!-- Main Header start -->
    <header class="main-header bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Navigation -->
                    <nav style="background-color:#aaa" class="navbar navbar-default navbar-fixed-top main-nav">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="navbar-brand">
                                    <a class="logo-black" href="index.html"><img src="assets/assets/images/logo.png" alt="">
                                    </a>
                                    <a class="logo-white" href="index.html"><img src="assets/assets/images/logo-white.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                                    <li>
                                        <a class="page-scroll" href="index.php#page-top">Home</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#about">About</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#service">Service</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#work">Protfolio</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#blog">Blog</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container -->
                    </nav>
                </div>
            </div>
        </div>
    </header>


<?php 
require_once 'db.php';
$id = $_GET['id'];
    $select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE id = $id";
    $query = mysqli_query($conn, $select);
    $assoc = mysqli_fetch_assoc($query);
?>
    <!-- Portfolio Section -->
    <section class="portfolio-section section-default" id="work">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="default-title text-center">
                        <h2>Portfolio Dateils</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="padding:30px 150px 30px 150px;border: 2px solid #ddd; border-radius: 20px;">
                <div class="card">
                  <div class="card-header">
                    <h5><?= $assoc['cate_name'] ?></h5>
                  </div>
                  <div class="card-body">
                    <h2 class="card-title"><?= $assoc['title'] ?></h2>
                    <p class="card-text"><?= $assoc['description'] ?></p>
                  </div>
                </div>
            </div>
        </div>
    </section>               



    <!-- footer start -->
    <footer class="main-footer">
        <div class="copyright">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-col text-center">
                            <p>Copyright ©2018 <a href="https://themeforest.net/user/awesome_theme" target="_blank">Awesome_Theme</a> All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- All Included JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/animated-text.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/progress-bar-min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.countup.min.js"></script>
    <script src="assets/js/jarallax.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/dyscrollup.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/jquery.ripples.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/jquery.filterizr.min.js"></script>

    <!-- Google map -->
    <script src="assets/js/google-map.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdEPAHqgxFK5pioDAB3rsvKchAtXxRGO4&amp;callback=initMap"></script>

    <!-- Custom Js -->
    <script src="assets/js/main.js"></script>

    <!-- AJAX Contact Form Using -->
    <script src="assets/js/app.js"></script>

</body>
</html>