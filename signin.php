<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
if (isset($_COOKIE['sid'])) {
    load_student_profile($_COOKIE['sid']);
    header("Location:master");
    exit;
}
if (isset($_POST['login-form-submit'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from student where email='$email' && password='$password'";
    $run = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($run);
    $row = mysqli_num_rows($run);
    if ($row > 0) {
        load_student_profile($data['id']);
        $_SESSION['message'] = success("Welcome Back " . $data['name']);
        setcookie("sid", $data['id'], time() + 86400 * 30, "/");
        // 86400 = 1 day
        header("Location: master");
        exit;
    } else {
        $_SESSION['message'] = error("Invalid email or password" . mysqli_error($con));
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
    <title>Signin - <?php echo WEB_HEADER_NAME; ?></title>
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
                                    <form id="login-form" name="login-form" class="mb-0"  method="post">
                                        <h3>Login to your Account</h3>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login-form-username">Username:</label>
                                                <input type="text" id="login-form-username" name="username" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="login-form-password">Password:</label>
                                                <input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <button type="submit" class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                                                <a href="#" class="float-right">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="line line-sm"></div>

                                    <div class="w-100 text-center">
                                        <h4 style="margin-bottom: 15px;">or Login with:</h4>
                                        <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                                        <span class="d-none d-md-inline-block">or</span>
                                        <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center text-dark dark mt-3">
                                <small>Copyrights &copy; All Rights Reserved By <?= WEB_FOOTER_NAME; ?>.</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <?php include('js.php'); ?>

</body>

</html>