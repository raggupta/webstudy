<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
$id = $_COOKIE['id'];
$sql = "Select * from member where id=$id";
$row = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($row);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web Study</title>
    <?php require_once('css-script.php'); ?>

</head>

<body class="header-fixed">
    <?php require_once('nav.php'); ?>
    <div class="page-body">
        <?php require_once('sidebar.php'); ?>
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
                <div class="viewport-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb has-arrow">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Profile</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile View</li>
                        </ol>
                    </nav>
                </div>
                <div class="content-viewport">

                    <div class="row">


                        <div class="col-lg-5 col-md-6 col-sm-12 equel-grid">
                            <div class="grid">
                                <div class="grid-body">
                                    <div class="split-header">
                                        <p class="card-title">Profile</p>
                                        <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="User Profile">
                                            <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
                                        </span>
                                    </div>

                                    <div class="d-flex mt-5 mb-3">
                                        <small class="mb-0 text-primary"></small>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <p class="text-black">Name</p>
                                        <p class="text-gray"><?php echo $res['name']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <p class="text-black">Email</p>
                                        <p class="text-gray"><?php echo $res['email']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <p class="text-black">Mobile</p>
                                        <p class="text-gray"><?php echo $res['mobileno']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <p class="text-black">Address</p>
                                        <p class="text-gray"><?php echo $res['address']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom pt-2">
                                        <p class="text-black">Status</p>
                                        <p class="text-gray"><?php echo $res['status']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between pt-2">
                                        <p class="text-black">Member Type</p>
                                        <p class="text-gray"><?php echo $res['member_type']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body">
                                    <div class="split-header">
                                        <p class="card-title">Profile Picture</p>
                                        <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="User Profile">
                                            <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex mt-5 mb-3">
                                        <small class="mb-0 text-primary"></small>
                                    </div>
                                    <div class="d-flex justify-content-center border-bottom py-2">
                                        <p class="text-black">
                                            <img width="180px" src="../<?php echo $_SESSION['user']['profile_pic']; ?>" alt="Profile Pic" srcset="../<?php echo $_SESSION['user']['profile_pic']; ?>">
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once('footer.php'); ?>

            <!-- page content ends -->
        </div>
    </div>
    <?php require_once('js-script.php'); ?>
</body>

</html>