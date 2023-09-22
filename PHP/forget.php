<?php
$errors = array();

require 'PHPMailerAutoload.php';
if (isset($_POST['check-email'])) {
    try {
        $db = new mysqli('localhost', 'root', '', 'special');

        $email = mysqli_real_escape_string($db, $_POST['email']);
// ensure that the user exists on our system
        $query = "SELECT Email FROM members WHERE Email='$email'";
        $results = mysqli_query($db, $query);

        if (empty($email)) {
            array_push($errors, "Your email is required");
        } else if (mysqli_num_rows($results) <= 0) {
            array_push($errors, "Sorry, no user exists on our system with that email");
        }
// generate a unique random token of length 100
        $code = bin2hex(random_bytes(10));
        echo $code;
        if (count($errors) == 0) {
// store token in the password-reset database table against the user's email
            $sql = "UPDATE  members SET code ='$code' WHERE Email = '$email'";
            $results = mysqli_query($db, $sql);

// Send email to user with the token in a link they can click on
            $to = $email;
            $subject = "Reset your password on SpecialMoment.com";
            $msg = "Hi there, click on this  <a href='http://localhost/SpMom/PHP/newPass.php?code=$code'>link</a> to reset your password on our site";
//            $msg = wordwrap($msg, 70);
            echo $msg;
            $mail = new PHPMailer;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'specialm501@gmail.com';
            $mail->Password = 'sp123sp123';
            $mail->SetFrom('specialm501@gmail.com', 'Special Moment');
            $mail->AddAddress($to);
            $mail->addReplyTo('specialm501@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $msg;


            if (!$mail->send()) {
                echo '<script> alert("حدث خطأ أثناء ارسال البريد.")</script>';
                echo '<script> alert("' . $mail->ErrorInfo . '")</script>';
            } else {
                echo '<script> alert("تم ارسال البريد بنجاح")</script>';
                header('location: pending.php?email=' . $email);
            }
        }
    }catch (Exception $e){

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Little Prencess | Forget Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../CSS/forget.css">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="forget.php" method="POST" >
                <label onclick="javascript:history.back()" class="close-btn fas fa-times" title="close"></label>
                <h2 class="text-center">Forget Password</h2>
                <p class="text-center">Enter your email address</p>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="">
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-email" value="Continue">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>