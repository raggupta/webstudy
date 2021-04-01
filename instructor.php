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
    <?php include('css.php') ?>
    <title>Instructor | <?php echo WEB_HEADER_NAME; ?></title>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">
        <?php include('header.php'); ?>
        <section id="page-title" class="page-title-mini">

            <div class="container clearfix">
                <h1>Instructor</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= WEB_DOMAIN_NAME; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Instructor</li>
                </ol>
            </div>

        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="heading-block center">
                        <h2>Webstudy Instructor</h2>
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
            </div>
        </section>
        <!-- Footer -->
        <?php include('footer.php'); ?>
        <!-- #footer end -->

    </div>
    <!-- #wrapper end -->
    <!-- Footer Scripts -->
    <?php include('js.php'); ?>

</body>

</html>