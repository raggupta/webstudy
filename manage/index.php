<?php
if ( empty( $_COOKIE['member_id'] ) ) {
    header( "Location:login" );
}
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
<h4>Web Study</h4>
<p class = "text-gray">Welcome on Web Study, Rag@gupta</p>
</div>
</div>

</div>
</div>
<!-- content viewport ends -->
<?php require_once( 'footer.php' );
?>
</div>
<!-- page content ends -->
</div>
<!--page body ends -->
<?php require_once( 'js-script.php' );
?>
</body>

</html>
