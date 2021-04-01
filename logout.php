<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
setcookie("sid", "", time() + 0, "/");
$_SESSION['suser'] = '';
unset($_SESSION['suser']);
$_SESSION['message'] = success("You have Logout Successfully");
header("Location:signin");
