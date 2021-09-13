<?php 
    require_once 'db.php'; 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Collis Personal Portfolio HTML5 Template">
    <meta name="keywords" content="Personal, Portfolio, resume, cv, developer, personal resume, expart, professional, one page, onepage, HTML5, Template">
    <meta name="author" content="Awesome_Theme">

    <title>FMA Developer</title>

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
    <header class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Navigation -->
                    <nav class="navbar navbar-default navbar-fixed-top main-nav">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="navbar-brand">
                                    <a href="index.php">
                                        <h2 style="color:#96c346;font-weight: bold;">F.M.A</h2>
                                    </a>
                                    <!-- <a class="logo-white" href="index.php"><img src="assets/assets/images/logo-white.png" alt="">
                                         <h2>FMA</h2>
                                    </a> -->
                                </div>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                                    <li>
                                        <a class="page-scroll" href="#page-top">Home</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#service">Service</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#work">Protfolio</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#blog">Blog</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#contact">Contact</a>
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
    $selectWelcome = "SELECT * FROM hero";
    $welcomeQuery = mysqli_query($conn, $selectWelcome);
    $welcomeAssoc = mysqli_fetch_assoc($welcomeQuery);
 ?>
    <!-- Welcome Section -->
    <section class="welcome-section jarallax over-layer-black sec-btm-style">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="welcome-col text-center991">
                        <h1><?php if(isset($welcomeAssoc['title'])) echo $welcomeAssoc['title'] ?><span> <?php if(isset($welcomeAssoc['name'])) echo $welcomeAssoc['name'] ?></span></h1>

<?php 
    $animated = "SELECT * FROM welcome WHERE status = 1";
    $aq = mysqli_query($conn, $animated);
?>
                        <h3 class="cd-headline clip">
                            <span class="cd-words-wrapper">
                            <?php foreach ($aq as $key => $animatedText): ?>
                                <b class="<?php if($key == 0 ) echo 'is-visible' ?>"><?= $animatedText['txt'] ?></b>
                            <?php endforeach ?>
                                
                                
                            </span>
                        </h3>
 <?php 
    $sSelect = "SELECT * FROM social WHERE status =1";
    $sQuery = mysqli_query($conn, $sSelect);
 ?>
                        <ul>
                            <?php foreach ($sQuery as $key => $social): ?>
                            <li>
                                <a href="<?php if(isset($social['link'])) echo $social['link'] ?>">
                                    <i class="<?php if(isset($social['icon'])) echo $social['icon'] ?>">
                                        
                                    </i>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="welcome-col">
                        <img src="<?php if(isset($welcomeAssoc['image'])) echo 'admin/upload/hero/'.$welcomeAssoc['image'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    $a = "SELECT * FROM about";
    $q = mysqli_query($conn, $a);
    $about = mysqli_fetch_assoc($q);
    $pro = "SELECT * FROM progress WHERE status = 1";
    $proq = mysqli_query($conn, $pro);
 ?>
    <!-- About Section -->
    <section class="about-section section-default" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-col col-default">
                        <h2>Few Words about me</h2>
                        <p>
                        <?= isset($about['description']) ? $about['description'] : ''  ?>
                        </p>
                        <button class="btn btn-default simple-default-btn" type="submit">Download Resume</button>
                        <button class="btn btn-default simple-default-btn btn-black" type="submit">Hire Me</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-col col-default">
                        <h2>My Skills</h2>
                        <h5><?= isset($about['txt']) ? $about['txt'] : ''  ?></h5>
                        <?php foreach ($proq as $key => $progress): ?>
                        <!-- Progress Bar Start -->
                        <div class="progress-box">
                            <h5 class="text-uppercase"><?= isset($progress['name']) ? $progress['name'] : '' ?> <span class="color-heading pull-right"><?= isset($progress['progress']) ? $progress['progress'].'%' : '' ?></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="<?= isset($progress['progress']) ? $progress['progress'] : '' ?>"></div>
                            </div>
                        </div>
                        <!-- Progress Bar Start -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    $selectservices = "SELECT * FROM services WHERE status = 1";
    $servicesQuery = mysqli_query($conn, $selectservices);
 ?>
    <!-- Service Section -->
    <section class="service-section section-default" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="default-title text-center">
                        <h2>what I do</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($servicesQuery as $key => $services): ?>
                <div class="col-md-4 col-sm-6 col-xs-6 full-wd600">
                    <div class="serviceBox wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="service-icon">
                            <i class="<?= isset($services['icon']) ? $services['icon'] : '' ?>"></i>
                        </div>
                        <h3 class="title"><?= isset($services['title']) ? $services['title'] : '' ?></h3>
                        <p class="description"><?= isset($services['description']) ? $services['description'] : '' ?></p>
                        <span class="number"><?= ++$key ?></span>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php 
    $selectCounterup = "SELECT * FROM counterup WHERE status = 1";
    $counterupQuery = mysqli_query($conn, $selectCounterup);
?>
    <!-- Counter Section -->
    <section class="counter-sec section-default jarallax over-layer-black">
        <div class="container">
            <div class="row">
                <?php foreach ($counterupQuery as $key => $counterup): ?>
                <div class="col-md-3 col-sm-6 col-xs-6 full-wd600">
                    <div class="counter-box col-default wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="counter"><?= isset($counterup['counter']) ? $counterup['counter'] : '' ?></div>
                        <p><?= isset($counterup['title']) ? $counterup['title'] : '' ?></p>
                        <i class="<?= isset($counterup['icon']) ? $counterup['icon'] : '' ?>"></i>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio-section section-default" id="work">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="default-title text-center">
                        <h2>My Portfolio</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-col">
                    <!-- Filter Nav -->
                    <?php 
                    $selectNav ="SELECT * FROM category WHERE stutas = 1";
                    $navQ = mysqli_query($conn, $selectNav);
                    
                     ?>
                     <style type="text/css">
                         .activecategory{
                            color: red;
                         }
                     </style>
                    <ul class="portfolio-nav">
                        <li data-filter="all" class=""> All </li>
                        <?php foreach ($navQ as $key => $categoryNav): ?>
                            <li data-filter="<?= $categoryNav['cat_id'] ?>"> <?= $categoryNav['cate_name'] ?> </li>
                        <?php endforeach ?>
                        
                        
                    </ul>
                    <!-- Filter Content -->
                    <div class="filtr-container">
                        <?php 
                        $selectPortfolio = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE status = 1";
                        $queryPortfolio = mysqli_query($conn, $selectPortfolio);
                         foreach ($queryPortfolio as $key => $portfolio): ?>
                        <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="<?= $portfolio['cate_id'] ?>" data-sort="value">
                            <div class="portfolio-item">
                                <img src="admin/upload/portfolio/<?= $portfolio['image'] ?>" class="img-responsive" alt="portfolio">
                                <div class="portfolio-item-info">
                                    <div class="item-caption">
                                        <ul>
                                            <li>
                                                <a href="admin/upload/portfolio/<?= $portfolio['image'] ?>" data-lightbox="lightbox" data-title="<?= $portfolio['title'] ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="single-portfolio.php?id=<?= $portfolio['id'] ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                        <h4><a href="single-portfolio.php?id=<?= $portfolio['id'] ?>"><?= $portfolio['title'] ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>               
<?php 
    $selecttestimonials = "SELECT * FROM Testimonials WHERE status = 1";
    $testimonialsQuery = mysqli_query($conn, $selecttestimonials);
 ?>
    <!-- Testimonial Section -->
    <section class="testimonial-section jarallax over-layer-black" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="default-title text-center">
                        <h2>what Client say</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-carousel" data-slick='{"slidesToShow": 2, "slidesToScroll": 1}'>
                        <?php foreach ($testimonialsQuery as $key => $testimonials): ?>
                        <div class="testimonial-item">
                            <div class="testimonial-item-content">
                                <div class="testimonial-img">
                                    <img src="admin/upload/testimonials/<?= $testimonials['image'] ?>" alt="<?= $testimonials['title'] ?>">
                                </div>
                                <p><?= $testimonials['description'] ?></p>
                                <h4 class="text-capitalize"><?= $testimonials['name'] ?></h4>
                                <span class="text-uppercase"><?= $testimonials['title'] ?></span>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact Section -->
    <section id="contact" class="contact-sec section-default over-layer-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-title">
                        <h2>Reach Me</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-box wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="info-box">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Address: Manikgonj-3, Saturia, Manikgonj, Dhaka, Bangladesh
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-box wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="info-box">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <p>(+880) 1318533187</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-box wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="info-box">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>freelancermdalamin21@gamil.com</p>
                            <p>alamin33187@gamil.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-default">
                        <div class="row">
                            <div id="form-messages"></div>
                            <form  method="post" action="admin/store-mail.php">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="numbar" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control textarea-hight-full" id="message" name="message" rows="6" placeholder="Message" required></textarea>
                                    <button class="btn btn-default simple-default-btn" type="submit">Sent Message</button>
                                    <?php 
                                    if (isset($_SESSION['success'])) { ?>
                                        <span class="font-weight-bold">
                                            <?php echo $_SESSION['success']; ?>
                                        </span>
                                        <?php
                                        
                                        unset($_SESSION['success']);
                                    }
                                     ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-default">
                        <div id="map" style="width:100%; height:350px;"></div>
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
                            <p>Copyright ©2021 <a href="https://www.freelancermdalamin.com" target="_blank">FMA</a> All Rights Reserved</p>
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