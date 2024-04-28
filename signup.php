<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  // Check if the form is submitted
  if(isset($_POST['signup'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['repassword'];

    // Kiểm tra xác nhận mật khẩu
    if($password !== $confirm_password) {
        $error_message = "Password and Confirm Password do not match!";
    } else {
        // Xử lý đăng ký người dùng vào cơ sở dữ liệu
        // Sau khi đăng ký thành công, bạn có thể hiển thị thông báo thành công
        if($_SESSION) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Registration Successful!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="register.php" method="POST">
            <!-- Các trường nhập thông tin đăng ký -->
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : '' ?>" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <!-- Hiển thị thông báo lỗi nếu có -->
            <?php if(isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <!-- Hiển thị thông báo lỗi nếu có -->

            <hr>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
                </div>
            </div>
        </form>

        <br>
        <a href="login.php">I already have a membership</a><br>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
    </div>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
