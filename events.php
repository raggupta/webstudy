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
    <title>Events | <?php echo WEB_HEADER_NAME; ?></title>
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
                <h1>Events</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= WEB_DOMAIN_NAME; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Events</li>
                </ol>
            </div>
        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="heading-block center">
                        <h2>Coming Soon...</h2>
                        <span>Our Team Members who have contributed immensely to our Growth</span>
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