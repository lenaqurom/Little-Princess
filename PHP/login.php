<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Little Princess | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<div class="center">

    <div class="wrapper">
        <label onclick="javascript:history.back()" class="close-btn fas fa-times" title="close"></label>
        <div class="title"> Login </div>
        <form action="Login.php" method="post">
            <?php include('errors.php'); ?>
            <div class="field">
                <input type="email" name="txtUserLogin" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="txtUserPass" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="forget.php">Forgot password?</a></div>
            </div>
            <div class="field">
                <input type="submit" id="myBtn" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="../PHP/Registration.php">Sign Up now</a></div>
        </form>
    </div>
</div>
</body>
</html>