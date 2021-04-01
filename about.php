<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="<?php echo WEB_HEADER_NAME; ?>" />
    <!-- Stylesheets -->
    <?php include('css.php') ?>
    <!-- Document Title -->
    <title>About Us | <?php echo WEB_HEADER_NAME; ?></title>
</head>

<body class="stretched">
    <!-- Document Wrapper -->
    <div id="wrapper" class="clearfix">

        <!-- Header -->
        <?php include('header.php'); ?>
        <!-- #header end -->

        <!-- Page Title -->
        <section id="page-title" class="page-title-mini">

            <div class="container clearfix">
                <h1>About Us</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= WEB_DOMAIN_NAME; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </div>

        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row col-mb-80 mb-0">
                        <div class="col-lg-3 center" data-animate="bounceIn">
                            <i class="i-plain i-xlarge mx-auto mb-0 icon-users"></i>
                            <div class="counter counter-large" style="color: #3498db;"><span data-from="100" data-to="8465" data-refresh-interval="50" data-speed="2000"></span></div>
                            <h5>Clients Served</h5>
                        </div>

                        <div class="col-lg-3 center" data-animate="bounceIn" data-delay="200">
                            <i class="i-plain i-xlarge mx-auto mb-0 icon-code"></i>
                            <div class="counter counter-large" style="color: #e74c3c;"><span data-from="100" data-to="56841" data-refresh-interval="50" data-speed="2500"></span></div>
                            <h5>Lines of Code</h5>
                        </div>

                        <div class="col-lg-3 center" data-animate="bounceIn" data-delay="400">
                            <i class="i-plain i-xlarge mx-auto mb-0 icon-briefcase"></i>
                            <div class="counter counter-large" style="color: #16a085;"><span data-from="100" data-to="2154" data-refresh-interval="50" data-speed="3500"></span></div>
                            <h5>No. of Projects</h5>
                        </div>

                        <div class="col-lg-3 center" data-animate="bounceIn" data-delay="600">
                            <i class="i-plain i-xlarge mx-auto mb-0 icon-cup"></i>
                            <div class="counter counter-large" style="color: #9b59b6;"><span data-from="100" data-to="874" data-refresh-interval="30" data-speed="2700"></span></div>
                            <h5>Cups of Coffee</h5>
                        </div>

                    </div>

                    <div class="promo promo-light p-4 p-md-5 mb-5">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg">
                                <h3>Try Premium Free for <span>30 Days</span> and you'll never regret it!</h3>
                                <span>Starts at just <em>$9.99/month</em> afterwards. No Ads, No Gimmicks and No SPAM. Just Real Content.</span>
                            </div>
                            <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                                <a href="signup" class="button button-large button-circle button-black m-0">Start Trial</a>
                            </div>
                        </div>
                    </div>

                    <div class="heading-block center">
                        <h2>Webstudy Thinktank</h2>
                        <span>Our Team Members who have contributed immensely to our Growth</span>
                    </div>

                    <div class="row col-mb-50 mb-0">

                        <?php
                        $sql = "SELECT * FROM `member` where member_type='Teacher' ORDER BY id DESC";
                        $row = mysqli_query($con, $sql);
                        if (mysqli_num_rows($row) > 0) {
                            while ($res = mysqli_fetch_assoc($row)) {
                        ?>

                                <div class="col-lg-6">
                                    <div class="team team-list row align-items-center">
                                        <div class="team-image col-sm-6">
                                            <img src="<?= ($res['profile_pic']) ? $res['profile_pic'] : random_pic('dist/course/images/instructor'); ?>" alt="John Doe">
                                        </div>
                                        <div class="team-desc col-sm-6">
                                            <div class="team-title">
                                                <h4><?= $res['name']; ?></h4><span><?= $res['email']; ?></span>
                                            </div>
                                            <div class="team-content">
                                                <p>Carbon emissions reductions giving, legitimize amplify non-partisan Aga Khan. Policy dialogue assessment expert free-speech cornerstone disruptor freedom. Cesar Chavez empower.</p>
                                            </div>
                                            <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                                <i class="icon-facebook"></i>
                                                <i class="icon-facebook"></i>
                                            </a>
                                            <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                                <i class="icon-twitter"></i>
                                                <i class="icon-twitter"></i>
                                            </a>
                                            <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                                <i class="icon-gplus"></i>
                                                <i class="icon-gplus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                </div>

                <div class="section topmargin-sm footer-stick">

                    <h4 class="text-uppercase center">What <span>Clients</span> Say?</h4>

                    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="dist/course/images/instructor/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                        <div class="testi-meta">
                                            Steve Jobs
                                            <span>Apple Inc.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="dist/course/images/instructor/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                        <div class="testi-meta">
                                            Collis Ta'eed
                                            <span>Envato Inc.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><img src="dist/course/images/instructor/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                        <div class="testi-meta">
                                            John Doe
                                            <span>XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- #content end -->

        <!-- Footer -->
        <?php include('footer.php'); ?>
        <!-- #footer end -->

    </div>
    <!-- #wrapper end -->
    <!-- Footer Scripts -->
    <?php include('js.php'); ?>

</body>

</html>