<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
if (isset($_POST['login-form-submit'])) {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($name) && !empty($email) && !empty($password)) {
        $sqli = "insert into student(name, email, password, create_dt, create_tm)values ('$name', '$email', '$password', '$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if (!$query) {
            $_SESSION['message'] = error("Something went wrong !");
        } else {
            $_SESSION['message'] = success("Signup Successfully!");
            header("Location:signin");
            exit;
        }
    }else $_SESSION['message'] = error("All Fields Required!");
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
    <title>Signup - <?php echo WEB_HEADER_NAME; ?></title>
</head>

<body class="stretched">
    <!-- Document Wrapper-->
    <div id="wrapper" class="clearfix">
        <!-- Content -->
        <section id="content">
            <div class="content-wrap py-0">
                <!-- style="background: url('https://www.uvic.ca/engineering/home/news/current/2020feb-computer-science-students-article-reaches-millions.jpg') center center no-repeat; background-size: cover;" -->
                <div class="section p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-transparent min-vh-100 p-0 m-0">
                    <div class="vertical-middle">
                        <div class="container-fluid py-5 mx-auto">
                            <div class="center">
                                <a href="index">
                                    <img src="dist/img/output-onlinepngtools.png" alt="<?php echo WEB_DOMAIN_NAME; ?> ">
                                </a>
                            </div>
                            <div class="center mx-auto" style="width: 400px;">
                                <?php echo $_SESSION['message'];
                                $_SESSION['message'] = ''; ?>
                            </div>
                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="signup-form" name="signup-form" class="mb-0" action="" method="post">
                                        <h3>Signup</h3>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="name">Full Name:</label>
                                                <input type="text" id="name" name="name" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" name="email" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" id="password" name="password" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <button type="submit" class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Signup</button>
                                                <a href="signin" class="float-right">Click To Signin</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="text-center text-dark dark mt-3">
                                <small>Copyrights &copy; All Rights Reserved By <?= WEB_FOOTER_NAME; ?>.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #content end -->
    </div>
    <!-- #wrapper end -->
    <?php include('js.php'); ?>

</body>

</html>