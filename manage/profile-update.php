<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
// var_dump($_SESSION['user']);exit;
$id = $_COOKIE['id'];
$sql = "Select * from member where id=$id";
$row = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($row);
$name = $res['name'];
$email = $res['email'];
$mobileno = $res['mobileno'];
$address = $res['address'];
$target_file = $res['profile_pic'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $address = $_POST['address'];
    $profile_pic = $_FILES['profile_pic'];
    if ($_FILES['profile_pic']['tmp_name']) {
        @unlink("../$target_file");
        $target_dir = "member-pic/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            @move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "../" . $target_file);
        }
    }
    if ($msg == '') {
        $query = "UPDATE member SET name='$name', mobileno=$mobileno, email='$email', address='$address', profile_pic='$target_file' where id=$_COOKIE[id]";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            load_profile($_COOKIE['id']);
            $_SESSION['a_message'] = success("Profile Update Successfully");
        } else {
            $_SESSION['a_message'] = error("Something went wrong ! Please Try again.");
        }
    } else {
        $_SESSION['a_message'] = error($msg);
        // header("Location:profile_update");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile || Update</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
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
                        <div class="col-lg-6 equel-grid">
                            <div class="grid">
                                <p class="grid-header">Profile Update</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>" id="inputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword4">Mobile No.</label>
                                                <input type="tel" class="form-control" name="mobileno" value="<?php echo $res['mobileno']; ?>" id="inputPassword4">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword2">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $res['email']; ?>" id="inputPassword2">
                                            </div>


                                            <div class="form-group">
                                                <label for="inputPassword5">Address</label>
                                                <textarea class="form-control" name="address" id="inputPassword5"><?php echo $res['address']; ?> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="customFile">Profile Pic</label><br>
                                                <input type="file" name="profile_pic" class="" id="customFile">
                                                <!-- <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="profile_pic">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div> -->
                                            </div>
                                            <button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update</button>
                                        </form>
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