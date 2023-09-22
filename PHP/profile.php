<?php
session_start();
if(isset($_SESSION['user'])) {
    if ($_SESSION['user'] == 1) {
        $flag = 0;
        $userlvl = 1;
        try {
            $db = mysqli_connect('localhost', 'root', '', 'special');
            $qryStr = "select * from members WHERE flag=$flag and UserLevel = $userlvl";
            $res = $db->query($qryStr);
            $row = $res->fetch_assoc();
            $db->close();
            $pic = $row['ProfilePic'];
        } catch (Exception $e) {

        }
    } else {
        header('location: ../PHP/login.php');
    }

}
?>


<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />

    <link href="../CSS/profile.css" type="text/css" rel="Stylesheet" />
    <title>Little Princess | Profile Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

    <style>


    </style>
</head>
<body>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <form action="editProfile.php" method="post">
                                    <?php
                                    if($pic[0] == 'h') {
                                        echo '
                                       <img src=" '.$pic.' " alt="Admin" class="rounded-circle" width="150">
                                       <h4> '. $row['FullName'].' </h4>
                                       <p class="text-secondary mb-1">0'.$row['Phone'].' </p>
                                       <p class="text-muted font-size-sm"> '.$row['City'].'-'.$row['Address'].' </p>
                                       <button type="submit"  class="btn btn-primary">Edit Profile </button>
                                       ';
                                    }
                                    else{
                                        $au = '../uploads/'.$pic;
                                        echo '
                                      <img src="'.$au.'" alt="Admin" class="rounded-circle" width="150">
                                      <h4> '.$row['FullName'].'</h4>
                                       <p class="text-secondary mb-1">0'.$row['Phone'].'</p>
                                       <p class="text-muted font-size-sm"> '.$row['City'].'-'.$row['Address'].'</p>
                                       <button  type="submit" class="btn btn-primary">Edit Profile </button>
                                 ';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['FullName']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['LoginName']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['Email']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['Phone']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['City']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row['Address']?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>