<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
setcookie("id", "", time() + 0, "/");
$_SESSION['user'] = '';
unset($_SESSION['user']);
$_SESSION['message'] = success("You have Logout Successfully");
header("Location:login");
