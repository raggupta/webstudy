<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
$edit_id = $_GET['edit_id'];
if (!empty($edit_id)) {
    $sql = "Select * from category where id=$edit_id ";
    $row = mysqli_query($con, $sql);
    $res = mysqli_fetch_assoc($row);
    if ($res) {
        $name = $res['name'];
        $slug = $res['slug'];
        $status = $res['status'];
    }
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
    if ($edit_id == '') {
        $sqli = "insert into category(name, slug, status, create_dt, create_tm)values ('$name', '$slug', '$status', '$current_dt', '$current_tm')";
        $query = mysqli_query($con, $sqli);
        if ($query) {
            $_SESSION['a_message'] = success("Data Inserted Successfully !");
        } else {
            $_SESSION['a_message'] = error("Something went wrong !");
        }
    } else {
        $sqli = "Update category set name='$name' , slug='$slug' , status='$status' , update_dt='$current_dt' , update_tm='$current_tm' where id='$edit_id' ";
        $query = mysqli_query($con, $sqli);
        if ($query) {
            $_SESSION['a_message'] = success("Data Update Successfully !");
            header("Location:category-view");
            exit;
        } else {
            $_SESSION['a_message'] = error("Something went wrong !");
        }
    }
    header("Location:category-add");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add || Category</title>
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
                                <a href="#">Category</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                                <p class="grid-header">Add Category</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <form method="POST" enctype="multipart/form-data" autocomplete="off">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" oninput="getSlug(this.value)" />
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $slug; ?>" />
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