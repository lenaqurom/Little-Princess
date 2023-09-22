<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Little Princess | Forget Password</title>
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
    <link rel="stylesheet" href="../CSS/pending.css">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form>
                <label onclick="javascript:history.back()" class="close-btn fas fa-times" title="close"></label>
                <h4 class="text-center">We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account.</h4>
                <h5 class="text-center">Please login into your email account and click on the link we sent to reset your password.</h5>

            </form>
        </div>
    </div>
</div>
</body>
</html>