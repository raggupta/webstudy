<?php
session_start();
$current_dt = date("Y-m-d");
$current_tm = date("H:i:A");
//get all web setting
$db = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DBNAME);
$sql = "Select * from web_settings where id=1";
$row = mysqli_query($db, $sql);
$res = mysqli_fetch_assoc($row);
define("WEB_PROJECT_NAME", $res['project_name']);
define("WEB_HEADER_NAME", $res['header_name']);
define("WEB_FOOTER_NAME", $res['footer_name']);
define("WEB_DOAMIN_NAME", $res['domain_name']);
define("WEB_WEBSITE_LOGO", $res['website_logo']);
define("WEB_WEBSITE_STATUS", $res['website_status']);

$project_name = $res['project_name'];
$header_name = $res['header_name'];
$footer_name = $res['footer_name'];
$domain_name = $res['domain_name'];
$target_file = $res['website_logo'];
$website_status = $res['website_status'];

function get_client_ip()
{
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

function success($msg)
{
  return '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
function warning($msg)
{
  return '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
function error($msg)
{
  return '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
function check_login($id)
{
  if (empty($id)) {
    header("Location:login");
    exit;
  }
}
function load_profile($id)
{
  global $con;
  $sql = "select * from member where id=$id ";
  $run = mysqli_query($con, $sql) or die(mysqli_error($con));
  $data = mysqli_fetch_assoc($run);
  if ($data) {
    $name = $data['name'];
    $email = $data['email'];
    $mobileno = $data['mobileno'];
    $address = $data['address'];
    $target_file = $data['profile_pic'];
    $member_type = $data['member_type'];

    $_SESSION['user'] = array('id' => $id, 'name' => $name, 'mobileno' => $mobileno, 'address' => $address, 'profile_pic' => $target_file, 'member_type' => $member_type);
  } else {
    $_SESSION['user'] = '';
    unset($_SESSION['user']);
  }
}
