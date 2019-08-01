<?php

use Web\Model\Database\Connection;

include '../Model/Database/Connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $mail = $_POST['email'];
    $pass = md5($_POST['password']);
    $rePass = md5($_POST['re_password']);

    $tableName = Information_User;

    $data = array($name, $mail, $pass);
    $columns = array('name', 'email', 'pass');

    $conn = new Connection();


    if ($conn->query("SELECT name FROM Information_User WHERE name = '$name'")) {
        echo "<script language='javascript'>
           alert('Tên người dùng đã tồn tại!')
           </script>";
        exit;
    }
    if ($conn->query("SELECT email FROM Information_User WHERE email = '$mail'")) {
        echo "<script language='javascript'>
           alert('Email đã tồn tại!')
           </script>";
        exit;
    }
    if ($pass != $rePass) {
        echo "<script language='javascript'>
           alert('Mật khẩu sai, hãy nhập lại!')
           </script>";
        exit;
    }

    $sql = "INSERT INTO Information_User (name, email, pass) VALUES ('{$name}','{$mail}','{$pass}')";
    $result = $conn->query1($sql);
    if ($result) {
        header('Location: signin.php');
    } else {
        echo "<script language='javascript'>
           alert('Đăng ký không thành công!')
           </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <!--===============================================================================================-->

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div method="POST" id="signup-form" class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" method="post" action="">
                    <span class="login100-form-title p-b-45">
                        CREATE ACCOUNT
                    </span>
                <div class="form-group validate-input">
                    <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required=""/>
                </div>
                <div class="form-group validate-input">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"
                           required=""/>
                </div>
                <div class="form-group validate-input">
                    <input type="password" class="form-input" name="password" id="password" placeholder="Password"
                           required=""/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group validate-input">
                    <input type="password" class="form-input" name="re_password" id="re_password"
                           placeholder="Repeat your password" required=""/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required=""/>
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in
                        <a href="#" class="term-service"><u>Terms of service</u></a></label>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="submit">
                            Sign Up
                        </button>
                    </div>
                </div>

            </form>
            <p class="loginhere">
                Have already an account ? <a href="signin.php" class="loginhere-link">Login here</a>
            </p>
        </div>
    </div>
</div>


<div id="signup"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/signup.js"></script>


</body>

</html>
