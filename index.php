<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
if (isset($_POST['student-submit'])) {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (!empty($name) && !empty($email) && !empty($phone)) {
        $sqli = "insert into student (name, email, phone, create_dt, create_tm)values ('$name', '$email', '$phone', '$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if (!$query) {
            $_SESSION['message'] = error("Something went wrong !");
            header("Location:master");
            exit;
        } else {
            $_SESSION['message'] = success("Your Query Submit Successful! We will Contact you Soon!");
            header("Location:master");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="<?php echo WEB_HEADER_NAME; ?>" />
    <!-- Stylesheets -->
    <?php include('css.php') ?>
    <!-- Document Title -->
    <title><?php echo WEB_HEADER_NAME; ?></title>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">
        <?php include('header.php'); ?>
        <section id="slider" class="slider-element min-vh-75">
            <div class="slider-inner">
                <div class="vertical-middle">
                    <div class="container text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <div class="slider-title mb-5 dark clearfix">
                                    <h2 class="text-white text-rotater mb-2" data-separator="," data-rotate="fadeIn" data-speed="3500">Learn More About <span class="t-rotate text-white">Development,Teacher Training,Business,Lifestyle,Language,Health,Fitness,Music,Photography</span></h2>
                                    <p class="lead mb-0 text-uppercase ls2" style="color: #CCC; font-size: 110%">What Do You Want To Learn?</p>
                                </div>
                                <div class="clear"></div>
                                <!-- <div class="input-group input-group-lg mt-1 search-box">
                                    <input class="form-control rounded border-0" type="search" placeholder="Search Your Courses.." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><i class="icon-line-search font-weight-bold"></i></button>
                                    </div>
                                    <div class="suggestion">
                                        <label>webstudy rom</label> <br>
                                        <label>developement josnes</label><br>
                                        <label>webstudy smse</label><br>
                                        <label>webstudy</label>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- HTML5 Video Wrap -->
                <div class="video-wrap">
                    <video id="slide-video" poster="dist/course/images/video/poster.jpg" preload="auto" loop autoplay muted>
                        <source src='dist/course/images/video/1.mp4' type='video/mp4' />
                    </video>
                    <div class="video-overlay" style="background: rgba(0,0,0,0.5); z-index: 1"></div>
                </div>

            </div>
        </section>

        <!-- Content -->
        <section id="content">
            <div class="content-wrap" style="overflow: visible;">

                <!-- Wave Shape Divider-->
                <div class="wave-bottom" style="position: absolute; top: -12px; left: 0; width: 100%; background-image: url('dist/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);"></div>

                <div class="container">

                    <div class="heading-block border-bottom-0 my-4 center">
                        <h3>Popular Categories</h3>
                        <span>Online education is changing the world, and Webstudy is the best place to find digital higher education providers from around the world.</span>
                    </div>

                    <!-- Categories -->
                    <div class="row course-categories clearfix mb-4">
                        <?php
                        $sql = "Select * from category ORDER BY id DESC LIMIT 12";
                        $row = mysqli_query($con, $sql);
                        if (mysqli_num_rows($row) > 0) {
                            while ($res = mysqli_fetch_assoc($row)) {
                        ?>
                                <div class="col-lg-3 col-sm-3 col-6 mt-4">
                                    <div class="card hover-effect">
                                        <img class="card-img" src="<?= random_pic("dist/course/images/categories"); ?>" alt="Card image">
                                        <a href="master/<?php echo $res['slug']; ?>" class="card-img-overlay rounded p-0" style="background-color: rgba(<?= rand(1, 255); ?>,<?= rand(1, 255); ?>,<?= rand(1, 255); ?>,0.8);">
                                            <span><i class="icon-code1"></i><?php echo $res['name']; ?></span>
                                        </a>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                    <div class="clear"></div>

                </div>

                <!-- Section Courses -->
                <div class="section topmargin-lg parallax" style="padding: 80px 0 60px; background-image: url('dist/course/images/icon-pattern.jpg'); background-size: auto; background-repeat: repeat" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -500px;">

                    <!-- Wave Shape Divider -->
                    <div class="wave-top" style="position: absolute; top: 0; left: 0; width: 100%; background-image: url('dist/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x;"></div>

                    <div class="container">

                        <div class="heading-block border-bottom-0 mb-5 center">
                            <h3>Most Popular Courses</h3>
                            <span>Online education is changing the world, and Webstudy is the best place to find digital higher education providers from around the world.</span>
                        </div>

                        <div class="clear"></div>

                        <div class="row mt-2">
                            <?php
                            $sql = "Select courses.*,category.name as category_name from courses JOIN category ON courses.category_id=category.id ORDER BY courses.id DESC LIMIT 8";
                            $row = mysqli_query($con, $sql);
                            if (mysqli_num_rows($row) > 0) {
                                while ($res = mysqli_fetch_assoc($row)) {
                            ?>
                                    <!-- Course 1 -->
                                    <div class="col-md-4 mb-5">
                                        <div class="card course-card hover-effect border-0">
                                            <a href="#"><img class="card-img-top" src="<?= ($res['file_nm']) ? $res['file_nm'] : random_pic('dist/course/images/courses'); ?>" alt="Card image cap"></a>
                                            <div class="card-body">
                                                <h4 class="card-title font-weight-bold mb-2"><a href="#"><?= $res['name']; ?></a></h4>
                                                <p class="mb-2 card-title-sub text-uppercase font-weight-normal ls1"><a href="#" class="text-black-50"><?= $res['category_name']; ?></a></p>
                                                <div class="rating-stars mb-2">
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star-half-full"></i>
                                                    <span>4.7</span>
                                                </div>
                                                <p class="card-text text-black-50 mb-1">
                                                    <?= substr($res['description'], 0, 100); ?>
                                                </p>
                                            </div>
                                            <div class="card-footer py-3 d-flex justify-content-between align-items-center bg-white text-muted">
                                                <div class="badge alert-warning">Free</div>
                                                <a href="#" class="text-dark position-relative"><i class="icon-line2-user"></i> <span class="author-number"><?= rand(0, 9); ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                    <!-- Wave Shape Divider - Bottom -->
                    <div class="wave-bottom" style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('dist/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);"></div>
                </div>

                <!-- Instructors Section -->
                <div class="section bg-transparent" style="padding: 60px 0 40px;">
                    <div class="container">

                        <div class="heading-block border-bottom-0 mb-5 center">
                            <h3>Most Popular Instructors</h3>
                            <span>Learn from industry experts who are passionate about teaching.</span>
                        </div>

                        <div class="clear"></div>

                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM `member` where member_type='Teacher' ORDER BY id DESC ";
                            $row = mysqli_query($con, $sql);
                            if (mysqli_num_rows($row) > 0) {
                                while ($res = mysqli_fetch_assoc($row)) {
                            ?>
                                    <!-- Instructors 1 -->
                                    <div class="col-lg-3 col-sm-6 mb-4">
                                        <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                                            <div class="fbox-icon">
                                                <i><img src="<?= ($res['profile_pic']) ? $res['profile_pic'] : random_pic('dist/course/images/instructor'); ?>" class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="mb-4 nott ls0"><a href="#" class="text-dark"><?= $res['name']; ?></a><br><small class="subtitle nott color"><?= $res['email']; ?></small></h3>
                                                <p class="text-dark"><strong><?= rand(200, 1000); ?></strong> Students</p>
                                                <p class="text-dark mt-0"><strong><?= rand(1, 30); ?></strong> Courses</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>

                <!-- Featues Section-->
                <div class="section mt-5 mb-0" style="padding: 120px 0; background-image: url('dist/course/images/icon-pattern-bg.jpg'); background-size: auto; background-repeat: repeat">

                    <!-- Wave Shape -->
                    <div class="wave-top" style="position: absolute; top: 0; left: 0; width: 100%; background-image: url('dist/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x;"></div>

                    <div class="container">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="row dark clearfix">

                                    <!-- Feature - 1 -->
                                    <div class="col-md-6">
                                        <div class="feature-box media-box bottommargin">
                                            <div class="fbox-icon">
                                                <a href="#">
                                                    <i class="icon-line2-book-open rounded-0 bg-transparent text-left"></i>
                                                </a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="text-white">21,000 Online Courses</h3>
                                                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Feature - 2 -->
                                    <div class="col-md-6">
                                        <div class="feature-box media-box bottommargin">
                                            <div class="fbox-icon">
                                                <a href="#">
                                                    <i class="icon-line2-note rounded-0 bg-transparent text-left"></i>
                                                </a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="text-white">Lifetime Access</h3>
                                                <p class="text-white">Porro repellat vero sapiente amet vitae quibusdam necessitatibus consectetur, labore totam. Accusamus perspiciatis asperiores labore esse.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Feature - 3 -->
                                    <div class="col-md-6">
                                        <div class="feature-box media-box bottommargin">
                                            <div class="fbox-icon">
                                                <a href="#">
                                                    <i class="icon-line2-user rounded-0 bg-transparent text-left"></i>
                                                </a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="text-white">Expert Instructors</h3>
                                                <p class="text-white">Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque tempora ullam. Vitae delectus quia, consequuntur rerum quo.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Feature - 4 -->
                                    <div class="col-md-6">
                                        <div class="feature-box media-box bottommargin">
                                            <div class="fbox-icon">
                                                <a href="#">
                                                    <i class="icon-line2-globe rounded-0 bg-transparent text-left"></i>
                                                </a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="text-white">Different Languages</h3>
                                                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Registration Foem -->
                            <div class="col-lg-4">

                                <div class="card shadow" data-animate="shake" style="opacity: 1 !important">
                                    <div class="card-body">
                                        <div class="badge registration-badge shadow-sm alert-primary">FREE</div>
                                        <h4 class="card-title ls-1 mt-4 font-weight-bold h5">Get Your Free Online Courses!</h4>
                                        <h6 class="card-subtitle mb-4 font-weight-normal text-uppercase ls2 text-black-50">Free Registration here.</h6>

                                        <div class="">
                                            <div class="form-result"></div>

                                            <form class="row mb-0" id="" name="student-submit-form" method="post">

                                                <div class="form-process">
                                                    <div class="css3-spinner">
                                                        <div class="css3-spinner-scaler"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control border-form-control required" placeholder="Your Full Name:" />
                                                </div>
                                                <div class="col-12 form-group">
                                                    <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control border-form-control" placeholder="Your Email Address:" />
                                                </div>

                                                <div class="col-12 form-group">
                                                    <input type="text" id="template-contactform-phone" name="phone" value="" class="sm-form-control border-form-control required" placeholder="Your Phone Number:" />
                                                </div>

                                                <div class="col-12 form-group">
                                                    <button class="button button-rounded btn-block button-large bg-color text-white nott ls0 mx-0" type="submit" id="student-submit" name="student-submit" value="submit">Apply It Now</button>
                                                    <br>
                                                    <small style="display: block; font-size: 12px; margin-top: 15px; color: #AAA;"><em>We'll do our best to get back to you within 6-8 working hours.</em></small>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Wave Shape -->
                    <div class="wave-bottom" style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('dist/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);"></div>

                </div>

                <!-- Promo Section -->
                <div class="section m-0" style="padding: 120px 0; background: #FFF url('dist/course/images/instructor.jpg') no-repeat left top / cover">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-7"></div>

                            <div class="col-md-5">
                                <div class="heading-block border-bottom-0 mb-4 mt-5">
                                    <h3>Become an Instructor!</h3>
                                    <span>Teach What You Love.</span>
                                </div>
                                <p class="mb-2">Monotonectally conceptualize covalent strategic theme areas and cross-unit deliverables.</p>
                                <p>Consectetur adipisicing elit. Voluptate incidunt dolorum perferendis accusamus nesciunt et est consequuntur placeat, dolor quia.</p>
                                <a href="contact-us" class="button button-rounded button-xlarge ls0 ls0 nott font-weight-normal m-0">Start Teaching</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="promo promo-light promo-full p-5 footer-stick" style="padding: 60px 0 !important;">
                    <div class="container clearfix">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg">
                                <h3 class="ls-1">Call us today at <span>+91-9919294458</span> or Email us at <span>support@webstudy.com</span></h3>
                                <span class="text-black-50">We strive to provide Our Customers with good Support to make their knowledge Wonderful.</span>
                            </div>
                            <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                                <a href="contact-us" class="button button-xlarge button-rounded nott ls0 font-weight-normal m-0">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- #content end -->

        <!-- Footer -->
        <?php include('footer.php'); ?>
        <!-- #footer end -->
    </div>
    <!-- #wrapper end -->
    <!-- Footer Scripts -->
    <?php include('js.php'); ?>

</body>

</html>