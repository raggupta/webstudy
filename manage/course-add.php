<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
$edit_id = $_GET['edit_id'];
if (!empty($edit_id)) {
    $sql = "Select * from courses where id=$edit_id ";
    $row = mysqli_query($con, $sql);
    $res = mysqli_fetch_assoc($row);
    if ($res) {
        $category_id = $res['category_id'];
        $name = $res['name'];
        $description = $res['description'];
        $slug = $res['slug'];
        $status = $res['status'];
        $target_file = $res['file_nm'];
    }
}

if (isset($_POST['add'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
    $course_pic = $_FILES['course_pic'];
    if ($_FILES['course_pic']['tmp_name']) {
        @unlink("../$target_file");
        $target_dir = "course-pic/";
        $target_file = $target_dir . basename($_FILES["course_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            @move_uploaded_file($_FILES["course_pic"]["tmp_name"], "../" . $target_file);
        }
    }

    if ($edit_id == '') {
        $sqli = "insert into courses(name, slug, category_id, description, status,file_nm, create_dt, create_tm)values ('$name', '$slug', '$category_id', '$description' ,'$status','$target_file','$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if ($query) {
            $_SESSION['a_message'] = success("Data Inserted Successfully !");
        } else {
            $_SESSION['a_message'] = error("Something went wrong !");
        }
    } else {
        $sqli = "Update courses set name='$name' , slug='$slug', category_id='$category_id',description=\"$description\", status='$status' ,file_nm='$target_file', create_dt='$current_dt' , create_tm='$current_tm' where id='$edit_id' ";

        $query = mysqli_query($con, $sqli);
        if ($query) {
            $_SESSION['a_message'] = success("Data Update Successfully !");
            header("Location:course-view");
            exit;
        } else {
            $_SESSION['a_message'] = error("Something went wrong !");
        }
    }
    header("Location:course-add");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Course Add || <?php echo WEB_HEADER_NAME; ?></title>
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
                                <a href="#">Course</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Course</li>
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
                        <div class="col-lg-8 equel-grid">
                            <div class="grid">
                                <p class="grid-header">Add Course</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <form name="form" method="POST" enctype="multipart/form-data" autocomplete="off">
                                            <div class="form-group">
                                                <label for="category_id">Category Name</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">-- Select Category --</option>
                                                    <?php
                                                    $sql = "Select * from category where status='Active'";
                                                    $row = mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($row) > 0) {
                                                        while ($res = mysqli_fetch_assoc($row)) {
                                                    ?>
                                                            <option value="<?php echo $res['id'] ?>" <?php echo ($res['id'] == $category_id) ? 'selected' : ''; ?>><?php echo $res['name'] ?></option>
                                                    <?php }
                                                    } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" oninput="getSlug(this.value)" />
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $slug; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label for="customFile">Profile Pic</label><br>
                                                <input type="file" name="course_pic" class="" id="customFile">
                                                <!-- <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="course_pic">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div> -->
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
                                            <button type="submit" name="add" value="add" class="btn btn-primary btn-rounded">Save</button>
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
        <?php require_once('footer.php'); ?>
        <!-- page content ends -->
    </div>
    <?php require_once('js-script.php'); ?>
    <script>
        window.addEventListener('load', function() {

        })

        function getSlug(val) {
            const result = val.split(" ").join("-");
            document.getElementById('slug').value = result.toLowerCase();
        }
    </script>
</body>

</html>