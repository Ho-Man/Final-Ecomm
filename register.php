<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="./css/custome.css">
  <link rel="stylesheet" href="./css/styles1.css">
  <link rel="stylesheet" href="./css/login.css">
  <script src="js/login.js"></script>
</head>

<?php
include 'signup.php';
if (isset($_POST['signup'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
  $err = "";

  if (empty($email) || empty($password) || empty($repassword)) {
    $err .= "";
    echo "<script>
    $(document).ready(function() { 
    swal({
      title: 'Error!',
      text: 'Username and password fields cannot be empty!',
      icon: 'error',
      button: 'OK',
    }).then(function() {
      window.location.href = '?page=signup';
    });
    });
    </script>";
  } else if (strlen($password) <= 5) {
    $err .= "";
    echo "<script>
    $(document).ready(function() { 
    swal({
      title: 'Error!',
      text: 'Password must be greater than 5 chars!',
      icon: 'error',
      button: 'OK',
    }).then(function() {
      window.location.href = '?page=signup';
    });
    });
    </script>";
  } else if ($password != $repassword) {
    $err .= "";
    echo "<script>
    $(document).ready(function() { 
    swal({
      title: 'Error!',
      text: 'Password and confirm password are not the same!',
      icon: 'error',
      button: 'OK',
    }).then(function() {
      window.location.href = '?page=signup';
    });
    });
    </script>";
  } else {
    include("connection.php");
    $password = md5($repassword);
    $sq = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sq);
    if (mysqli_num_rows($res) == 0) {
      mysqli_query($conn, "INSERT INTO users (firstname,lastname, password,email)
             VALUES ('$firstname','$lastname','$password','$email')") or die(mysqli_error($Connect));
      echo "<script>
      $(document).ready(function() { 
      swal({
        title: 'Success!',
        text: 'Sign Up successfully!',
        icon: 'success',
        button: 'OK',
      }).then(function() {
        window.location.href = '?page=login';
      });
      });
    </script>";
    } else {
      echo "<script>
      $(document).ready(function() { 
      swal({
        title: 'Success!',
        text: 'Username already exists!',
        icon: 'success',
        button: 'OK',
      }).then(function() {
        window.location.href = '?page=login';
      });
      });
    </script>";
    }
  }
}
?>
</script>