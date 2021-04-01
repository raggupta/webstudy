<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
if (isset($_POST['submit'])) {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($service) && !empty($subject) && !empty($message)) {
        $sqli = "insert into contact (name, email, phone,service,subject,message, create_dt, create_tm)values ('$name', '$email', '$phone','$service','$subject','$message', '$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if (!$query) {
            $_SESSION['message'] = error("Something went wrong !");
        } else {
            $_SESSION['message'] = success("Your Query Submit Successful! We will Contact you Soon!");
            header("Location:signin");
            exit;
        }
    } 
    else $_SESSION['message'] = error("All Fields Required!");
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
    <title>Contact Us | <?php echo WEB_HEADER_NAME; ?></title>
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
                <h1>Contact Us</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= WEB_DOMAIN_NAME; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </div>

        </section>
        <section id="map-overlay">
            <div class="container">
                <div class="row">
                    <div class="contact-form-overlay col-md-8 offset-md-2 p-5">
                        <?php echo $_SESSION['message'];
                        $_SESSION['message'] = ''; ?>
                        <div class="fancy-title title-border">
                            <h3>Send us an Email</h3>
                        </div>
                        <div class="">
                            <!-- <div class="form-result"></div> -->
                            <form class="row mb-0" method="post">
                                <div class="col-md-6 form-group">
                                    <label for="name">Name <small>*</small></label>
                                    <input type="text" id="name" name="name" value="" class="sm-form-control required" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Email <small>*</small></label>
                                    <input type="email" id="email" name="email" value="" class="required email sm-form-control" />
                                </div>

                                <div class="w-100"></div>
                                <div class="col-md-6 form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" value="" class="sm-form-control" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="service">Services</label>
                                    <select id="service" name="service" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Wordpress">Wordpress</option>
                                        <option value="PHP / MySQL">PHP / MySQL</option>
                                        <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                        <option value="AI">AI</option>
                                        <option value="ML">ML</option>
                                        <option value="Python">Python</option>
                                        <option value="Photography">Photography</option>

                                    </select>
                                </div>

                                <div class="w-100"></div>

                                <div class="col-12 form-group">
                                    <label for="subject">Subject <small>*</small></label>
                                    <input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
                                </div>

                                <div class="col-12 form-group">
                                    <label for="message">Message <small>*</small></label>
                                    <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
                                </div>



                                <div class="col-12 form-group">
                                    <button class="button button-3d m-0" type="submit" id="submit" name="submit" value="submit">Send Message</button>
                                </div>

                            </form>
                        </div>

                        <div class="line"></div>

                        <div class="row col-mb-50">
                            <div class="col-md-4">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 New Road Lucknow, Hazaratganj<br>
                                    Uttar Pradesh, INDIA<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@webstudy.com
                            </div>

                            <div class="col-md-8">
                                <div class="fslider customjs testimonial twitter-scroll twitter-feed" data-username="akhilh2o" data-count="4" data-animation="slide" data-arrows="false">
                                    <i class="i-plain color icon-twitter mb-0" style="margin-right: 15px;"></i>
                                    <div class="flexslider" style="width: auto;">
                                        <div class="slider-wrap">
                                            <div class="slide"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <section class="gmap" data-latitude="-37.813629" data-longitude="144.963058" data-scrollwheel="false" data-markers='[{latitude:-37.813629, longitude:144.963058, html: "<div class=\"p-2\" style=\"width: 300px;\"><h4 class=\"mb-2\">Hi! We are <span>Webstudy!</span></h4><p class=\"mb-0\" style=\"font-size:1rem;\">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day.</p></div>", icon:{ image: "", iconsize: [32, 39], iconanchor: [32,39] } }]'></section>
        </section>

        <!-- Footer -->
        <?php include('footer.php'); ?>
        <!-- #footer end -->

    </div>
    <!-- #wrapper end -->
    <!-- Footer Scripts -->
    <?php include('js.php'); ?>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBIOnS7NKIwBUJPXDke433rbD2pD2PCODQ"></script>

</body>

</html>