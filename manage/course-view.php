<?php
session_start();
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
check_login($_COOKIE['id']);
$id = $_COOKIE['id'];

if (isset($_GET['d_id'])) {
    $sqli = "Delete from courses where id='$_GET[d_id]'";
    $query = mysqli_query($con, $sqli);
    if (mysqli_affected_rows($con) > 0) {
        $_SESSION['a_message'] = success("Data is Deleted Successfully !");
    } else {
        $_SESSION['a_message'] = error("Something went wrong !");
    }
    header("Location:course-view");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show || Course</title>
    <?php require_once('css-script.php');
    ?>
</head>

<body class="header-fixed">
    <?php require_once('nav.php');
    ?>
    <div class="page-body">
        <?php require_once('sidebar.php');
        ?>
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
                <div class="viewport-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb has-arrow">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Courses</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Courses</li>
                        </ol>
                    </nav>
                </div>
                <div class="content-viewport">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            echo $_SESSION['a_message'];
                            unset($_SESSION['a_message']);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="grid">
                                <p class="grid-header">Show Courses</p>

                                <div class="item-wrapper">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Create Date</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "Select courses.*,category.name as category_name from courses JOIN category ON courses.category_id=category.id ORDER BY courses.id DESC ";
                                                $row = mysqli_query($con, $sql);
                                                if (mysqli_num_rows($row) > 0) {
                                                    while ($res = mysqli_fetch_assoc($row)) {

                                                ?>
                                                        <tr>
                                                            <td><?php echo $res['id'];
                                                                ?></td>
                                                            <td>
                                                                <?php echo $res['name']; ?> <br>
                                                                <?php echo $res['category_name']; ?>
                                                            </td>
                                                            <td>
                                                                <span class="text-gray">
                                                                    <label class="badge <?php echo ($res['status'] == "Active") ? 'badge-success' : 'badge-danger'; ?>"> <?php echo $res['status']; ?> </label>

                                                            </td>
                                                            <td><i class="mdi mdi-calendar"> </i> <?php echo $res['create_dt'] . " " . $re['create_tm']; ?></td>
                                                            <td class="text-right">

                                                                <a href="course-add?edit_id=<?php echo $res['id']; ?>">
                                                                    <div class="btn btn-inverse-success has-icon btn-rounded">
                                                                        <i class="mdi mdi-pencil-outline"></i>Edit
                                                                    </div>
                                                                </a>
                                                                <a href="course-view?d_id=<?php echo $res['id']; ?>">
                                                                    <div class="btn btn-inverse-danger has-icon btn-rounded">
                                                                        <i class="mdi mdi-delete-outline"></i>
                                                                        Delete
                                                                    </div>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- page content ends -->
            <?php require_once('footer.php');
            ?>
        </div>
    </div>
    <?php require_once('js-script.php');
    ?>
</body>

</html>