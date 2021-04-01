<?php
require_once('dist/php/db_config.php');
require_once('dist/php/function.php');
if (isset($_COOKIE['id'])) {
    load_profile($_COOKIE['id']);
    header("Location:dashboard");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from member where email='$email' && password='$password'";
    $run = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($run);
    $row = mysqli_num_rows($run);
    if ($row > 0) {
        load_profile($data['id']);
        $_SESSION['a_message'] = success("Welcome Back " . $data['name']);
        setcookie("id", $data['id'], time() + 86400 * 30, "/");
        // 86400 = 1 day
        header("Location: dashboard");
    } else {
        $_SESSION['message'] = error("Invalid email or password" . mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> WEB STUDY</title>
    <?php require_once('css-script.php'); ?>
</head>

<body>
    <div class="authentication-theme auth-style_1">
        <div class="row">
            <div class="col-12 logo-section">
                <a href="index" class="logo">
                    <h1>Login</h1>
                </a>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <?php echo $_SESSION['message'];
                $_SESSION['message'] = ''; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                                <form method="POST" name="form1" enctype="multipart/form-data">
                                    <div class="form-group input-rounded">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                                    </div>
                                    <div class="form-inline">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="form-check-input" />Remember me <i class="input-frame"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-block"> Login </button>
                                </form>
                                <div class="signup-link">
                                    <p>Don't have an account yet?</p>
                                    <a href="#">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth_footer">
            <p class="text-muted text-center">© Webstudy <?php echo date("Y");
                                                            ?></p>
        </div>

    </div>

</body>

</html>