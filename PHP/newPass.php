<?php
include('server.php')
?>
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
    <link rel="stylesheet" href="../CSS/forget.css">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="newPass.php" method="POST" >
                <label onclick="javascript:history.back()" class="close-btn fas fa-times" title="close" ></label>
                <h2 class="text-center">Forgot Password</h2>
                <p class="text-center">Enter your email address</p>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                </div>
                <div class="form-group">
                    <button class="form-control button"  name="new_password" value="<?php echo $_GET['code']  ?>">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
