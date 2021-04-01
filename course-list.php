<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
$category_slug = $_GET['cslug'];
if ($category_slug != "") {
    $str = " where slug='$category_slug' ";
} else $str = "where slug!='' LIMIT 1 ";
$row = mysqli_query($con, "Select id,name from category $str ");
if (mysqli_num_rows($row) > 0) {
    while ($res = mysqli_fetch_assoc($row)) {
        $category_name = $res['name'];
        $category_id = $res['id'];
    }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="<?php echo WEB_HEADER_NAME; ?>" />
    <?php include('css.php') ?>
    <title><?= $category_name; ?> | <?php echo WEB_HEADER_NAME; ?></title>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">
        <?php include('header.php'); ?>
        <section id="page-title" class="page-title-mini">

            <div class="container clearfix">
                <h1><?= $category_name; ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= WEB_DOMAIN_NAME; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $category_name; ?></li>
                </ol>
            </div>

        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="center mx-auto" style="width: 800px;">
                        <?php echo $_SESSION['message'];
                        $_SESSION['message'] = ''; ?>
                    </div>
                    <div class="heading-block center">
                        <h2><?= $category_name; ?></h2>
                        <span>Online education is changing the world, and Webstudy is the best place to find digital higher education providers from around the world.</span>
                    </div>

                    <div class="clear"></div>

                    <div class="row mt-2">
                        <?php
                        $sql = "Select courses.*,category.name as category_name from courses JOIN category ON courses.category_id=category.id where courses.category_id='$category_id' ORDER BY courses.id DESC";
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
                        } else { ?>
                            <div class="col-md-12 text-center">No Course Found...</div>
                        <?php } ?>
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