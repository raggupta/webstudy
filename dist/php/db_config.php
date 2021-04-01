<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
date_default_timezone_set("Asia/Kolkata");
define("SERVER_NAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "webstudy");

$con = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DBNAME);
if ($con) {
    return $con;
} else {
    echo "Connection Failed" . mysqli_connect_error($con);
}
