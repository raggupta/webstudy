<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
// var_dump($_SESSION['user']);exit;
$id = $_COOKIE['id'];
$sql = "Select * from web_settings where id=1";
$row = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($row);
$project_name = $res['project_name'];
$header_name = $res['header_name'];
$footer_name = $res['footer_name'];
$domain_name = $res['domain_name'];
$target_file = $res['website_logo'];
$website_status = $res['website_status'];


if (isset($_POST['submit'])) {
    $project_name = $_POST['project_name'];
    $header_name = $_POST['header_name'];
    $footer_name = $_POST['footer_name'];
    $domain_name = $_POST['domain_name'];
    $website_logo = $_FILES['website_logo'];
    $website_status = $_POST['website_status'];

    if ($_FILES['website_logo']['tmp_name']) {
        @unlink("../$target_file");
        $target_dir = "member-pic/";
        $target_file = $target_dir . basename($_FILES["website_logo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            @move_uploaded_file($_FILES["website_logo"]["tmp_name"], "../" . $target_file);
        }
    }
    if ($msg == '') {
        $query = "UPDATE web_settings SET project_name='$project_name', header_name='$header_name', footer_name='$footer_name', domain_name='$domain_name',website_status='$website_status', website_logo='$target_file' where id=1";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['a_message'] = success("Web Setting Update Successfully");
        } else {
            $_SESSION['a_message'] = error("Something went wrong ! Please Try again.");
        }
    } else {
        $_SESSION['a_message'] = error($msg);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Settings || Webstudy</title>
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
                                <a href="dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Web Setting</li>
                        </ol>
                    </nav>
                </div>
                <div class="content-viewport">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $_SESSION['a_message'];
                            $_SESSION['a_message'] = ''; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="grid">
                                <p class="grid-header">Web Settings</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <form action="" method="post">
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 ">
                                                            <label for="project_name">Project Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $project_name ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3">
                                                            <label for="header_name">Header Name</label>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <input type="text" class="form-control" id="header_name" name="header_name" value="<?php echo $header_name; ?>"> </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 ">
                                                            <label for="footer_name">Footer Name</label>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <input type="text" class="form-control" id="footer_name" name="footer_name" value="<?php echo $footer_name; ?>"> </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 ">
                                                            <label for="domain_name">Domain Name</label>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <input type="text" class="form-control" id="domain_name" name="domain_name" value="<?php echo $domain_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 ">
                                                            <label for="website_logo">Website Logo</label>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <input type="file" name="website_logo" class="" id="website_logo">

                                                        </div>
                                                    </div>
                                                    <div class="form-group  row ">
                                                        <div class="col-md-3 ">
                                                            <label for="website_status1">Website Status</label>
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <div class="form-inline">
                                                                <div class="radio mb-3">
                                                                    <label class="radio-label mr-4">
                                                                        <input name="website_status" type="radio" id="website_status1" value="Active" checked>Active <i class="input-frame"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="radio mb-3">
                                                                    <label class="radio-label">
                                                                        <input name="website_status" type="radio" value="Inactive" <?php if ($status == "Inactive") echo 'checked'; ?>>Inactive <i class="input-frame"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 ">
                                                        </div>
                                                        <div class="col-md-9 ">
                                                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('footer.php'); ?>

        </div>
    </div>
    <?php require_once('js-script.php'); ?>
</body>

</html>