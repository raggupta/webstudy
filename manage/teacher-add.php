<?php
require_once( 'dist/php/db_config.php' );
require_once( 'dist/php/function.php' );
check_login( $_COOKIE['id'] );
$id = $_GET['id'];
if ( $id ) {
    $sql = "Select * from member where id=$id";
    $row = mysqli_query( $con, $sql );
    $res = mysqli_fetch_assoc( $row );
    $name = $res['name'];
    $email = $res['email'];
    $mobileno = $res['mobileno'];
    $address = $res['address'];
    $password = $res['password'];
    $status = $res['status'];
    $target_file = $res['profile_pic'];
}

if ( isset( $_POST['save'] ) ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $member_type = "Teacher";
    $address = $_POST['address'];
    $profile_pic = $_FILES['profile_pic'];
    if ( $_FILES['profile_pic']['tmp_name'] ) {
        @unlink( "../$target_file" );
        $target_dir = "member-pic/";
        $target_file = $target_dir . basename( $_FILES["profile_pic"]["name"] );
        $uploadOk = 1;
        $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            @move_uploaded_file( $_FILES["profile_pic"]["tmp_name"], "../" . $target_file );
        }
    }
    if ( $msg == '' ) {
        if($id==""){
               $sqli = "insert into member(name, mobileno, email,password,address,profile_pic,status,member_type, create_dt, create_tm)values ('$name', '$mobileno', '$email','$password','$address','$target_file','$status','$member_type','$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if ($query) {
            $_SESSION['a_message'] = success("Teacher Account Created Successfully !");
        } else {
            $_SESSION['a_message'] = error("Something went wrong !");
        }
        }else{
             $query = "UPDATE member SET name='$name', mobileno=$mobileno, email='$email',password='$password', address='$address',profile_pic='$target_file',status='$status',member_type='$member_type' where id='$id' ";
        $query_run = mysqli_query( $con, $query );
        if ( $query_run ) {
            $_SESSION['a_message'] = success( "Profile Update Successfully" );
        } else {
            $_SESSION['a_message'] = error( "Something went wrong ! Please Try again." );
        }
        }
       header( "Location:teacher-view");
        exit;
    } else {
        $_SESSION['a_message'] = error( $msg );
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <?php require_once( 'css-script.php' );
?>
</head>

<body class="header-fixed">
    <?php require_once( 'nav.php' );
?>
    <div class="page-body">
        <?php require_once( 'sidebar.php' );
?>
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
                <div class="viewport-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb has-arrow">
                            <li class="breadcrumb-item">
                                <a href="#">Teacher</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo ($id=='') ? 'Add' :'Update'; ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="content-viewport">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $_SESSION['a_message'];$_SESSION['a_message'] = '';?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 equel-grid">
                            <div class="grid">
                                <p class="grid-header">Teacher</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobileno">Mobile No.</label>
                                                <input type="tel" class="form-control" name="mobileno" value="<?php echo $res['mobileno']; ?>" id="mobileno">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $res['email']; ?>" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" id="address"><?php echo $res['address'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" value="<?php echo $res['password']; ?>" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="customFile">Profile Pic</label><br>
                                                <input type="file" name="profile_pic" class="" id="customFile">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="form-inline">
                                                    <div class="radio mb-3">
                                                        <label class="radio-label mr-4">
                                                            <input name="status" type="radio" value="Active" checked>Active <i class="input-frame"></i>
                                                        </label>
                                                    </div>
                                                    <div class="radio mb-3">
                                                        <label class="radio-label">
                                                            <input name="status" type="radio" value="Inactive" <?php if ($status == "Inactive") echo 'checked'; ?>>Inactive <i class="input-frame"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="save" value="save" class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once( 'footer.php' );?>
        </div>
    </div>
    <?php require_once( 'js-script.php' );?>
    <script>
        //    $.alert({
        //    title: 'Alert!',
        //    content: 'Simple alert!',
       //});

    </script>
</body>

</html>
