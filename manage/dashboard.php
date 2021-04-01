<?php
require_once( 'dist/php/db_config.php' );
require_once( 'dist/php/function.php' );
check_login( $_COOKIE['id'] );
?>
<!DOCTYPE html>
<html lang = "en">

<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Web Study</title>
<?php require_once( 'css-script.php' );
?>

</head>

<body class = "header-fixed">
<?php require_once( 'nav.php' );
?>

<div class = "page-body">
<?php require_once( 'sidebar.php' );
?>

<div class = "page-content-wrapper">
<div class = "page-content-wrapper-inner">
<div class = "content-viewport">
<div class = "row">
<div class = "col-12 py-5">
<h4>Dashboard

</h4>
<p class = "text-gray">Welcome Web Study</p>
</div>
<div class = "col-12">
<?php echo $_SESSION['a_message'];
$_SESSION['a_message'] = '';
?>
</div>
</div>
<div class = "row">
<div class = "col-md-3 col-sm-6 col-6 equel-grid">
<div class = "grid">
<div class = "grid-body text-gray">
<div class = "d-flex justify-content-between">
<p>30%</p>
<p>300+</p>
</div>
<p class = "text-black">Courses</p>
<div class = "wrapper w-50 mt-4">
<canvas height = "45" id = "stat-line_1"></canvas>
</div>
</div>
</div>
</div>
<div class = "col-md-3 col-sm-6 col-6 equel-grid">
<div class = "grid">
<div class = "grid-body text-gray">
<div class = "d-flex justify-content-between">
<p>89%</p>
<p>2000+</p>
</div>
<p class = "text-black">Resigterd Student</p>
<div class = "wrapper w-50 mt-4">
<canvas height = "45" id = "stat-line_2"></canvas>
</div>
</div>
</div>
</div>
<div class = "col-md-3 col-sm-6 col-6 equel-grid">
<div class = "grid">
<div class = "grid-body text-gray">
<div class = "d-flex justify-content-between">
<p>23%</p>
<p>40+</p>
</div>
<p class = "text-black">Expert</p>
<div class = "wrapper w-50 mt-4">
<canvas height = "45" id = "stat-line_3"></canvas>
</div>
</div>
</div>
</div>
<div class = "col-md-3 col-sm-6 col-6 equel-grid">
<div class = "grid">
<div class = "grid-body text-gray">
<div class = "d-flex justify-content-between">
<p>75%</p>
<p>- 53.34%</p>
</div>
<p class = "text-black">Marketing</p>
<div class = "wrapper w-50 mt-4">
<canvas height = "45" id = "stat-line_4"></canvas>
</div>
</div>
</div>
</div>

<div class = "col-lg-5 col-md-6 col-sm-12 equel-grid">
<div class = "grid">
<div class = "grid-body">
<div class = "split-header">
<p class = "card-title">Available Balance</p>
<span class = "btn action-btn btn-xs component-flat" data-toggle = "tooltip" data-placement = "left" title = "Available balance since the last week">
<i class = "mdi mdi-information-outline text-muted mdi-2x"></i>
</span>
</div>

<div class = "d-flex mt-5 mb-3">
<small class = "mb-0 text-primary">Recent Transaction ( 3 )</small>
</div>
<div class = "d-flex justify-content-between border-bottom py-2">
<p class = "text-black">Received Bitcoin</p>
<p class = "text-gray">+0.00005462 BTC</p>
</div>
<div class = "d-flex justify-content-between border-bottom py-2">
<p class = "text-black">Sent Bitcoin</p>
<p class = "text-gray">-0.00001446 BTC</p>
</div>
<div class = "d-flex justify-content-between pt-2">
<p class = "text-black">Sent Bitcoin</p>
<p class = "text-gray">-0.00003573 BTC</p>
</div>
</div>
</div>
</div>
<div class = "col-lg-4 col-md-6 equel-grid">
<div class = "grid">
<div class = "grid-body">
<p class = "card-title">Campaign</p>
<div id = "radial-chart"></div>
<h4 class = "text-center">$23, 350.00</h4>
<p class = "text-center text-muted">Used balance this billing cycle</p>
</div>
</div>
</div>

</div>
</div>
</div>

<?php require_once( 'footer.php' );
?>

<!-- page content ends -->
</div>
</div>
<!--page body ends -->
<?php require_once( 'js-script.php' );
?>
</body>

</html>
