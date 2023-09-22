<?php
session_start();
if(isset($_SESSION['user'])) {
    if ($_SESSION['user'] == 1) {
        $flag = 0;
        $userlvl = 1;
        try {
            $db = mysqli_connect('localhost', 'root', '', 'special');
            $qryStr = "select * from members WHERE flag = $flag and UserLevel = $userlvl";
            $res = $db->query($qryStr);
            $row = $res->fetch_assoc();
            $email = $row['Email'];
            $uname = $row['LoginName'];
            $fname = $row['FullName'];
            $phonee = $row['Phone'];
            $cityy = $row['City'];
            $adress = $row['Address'];
            $id = $row['id'];

            if (isset($_FILES['Picture'])) {
                $img_name = $_FILES['Picture']['name'];
                $img_size = $_FILES['Picture']['size'];
                $tmp_name = $_FILES['Picture']['tmp_name'];
                $error = $_FILES['Picture']['error'];

                if ($error == 0) {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'C:/xampp/htdocs/SpMom/uploads/'.$new_img_name;
//                $img_path = '../firstProject/uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        // Insert into Database

                        $query = "UPDATE members SET ProfilePic ='$new_img_name' WHERE LoginName ='$uname'";
                        $results = mysqli_query($db, $query);
//                    header('Location:Orders.php');
                        $db->commit();
                    }else {
                        array_push($errorss, "You can't upload files of this type");
//                    header("Location: index.php?error=$em");
                    }
//            }
                }else {
                    array_push($errorss,"unknown error occurred!");
//            header("Location: index.php?error=$em");
                }

            }

            if (isset($_POST['Save'])) {
                if (isset($_POST['fullName'])) {
                    $fname = $_POST['fullName'];
                    $query = "UPDATE  members SET FullName ='$fname' WHERE LoginName ='$uname'";
                    $results = mysqli_query($db, $query);

                    $db->commit();
                }
                if (isset($_POST['phoneNumber'])) {
                    $phonee = $_POST['phoneNumber'];
                    $query = "UPDATE  members SET Phone =$phonee WHERE LoginName ='$uname'";
                    $results = mysqli_query($db, $query);
                    $db->commit();
                }
                if (isset($_POST['City'])) {
                    $cityy = $_POST['City'];
                    $query = "UPDATE  members SET City ='$cityy' WHERE LoginName ='$uname'";
                    $results = mysqli_query($db, $query);
                    $db->commit();
                }
                if (isset($_POST['Address'])) {
                    $adress = $_POST['Address'];
                    $query = "UPDATE  members SET Address ='$adress' WHERE LoginName ='$uname'";
                    $results = mysqli_query($db, $query);
                    $db->commit();
                }
                if (isset($_POST['password']) && isset($_POST['password2'])) {
                    if ($_POST['password'] == $_POST['password2']) {
                        $pass = sha1($_POST['password']);
                        $query = "UPDATE  members SET LoginPass ='$pass' WHERE LoginName ='$uname'";
                        $results = mysqli_query($db, $query);
                        $db->commit();
                    }
                }
                header('location: profile.php');
            }
        } catch (Exception $e) {

        }
    }else {
        header('location:login.php');
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


    <title>Little Princess | Edit Profile Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        /* General */
        body {
            font-family: 'Courgette', cursivef;
            background: url("../image/so.png") center center no-repeat;
        /background-size: cover;/
        /height: 100%;/
        /width: 100%;/
        height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-size: cover;
        }

        ::-moz-placeholder {
            color: #7b7e81;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder {
            color: #7b7e81;
            opacity: 1; /* Firefox */

        }

        ::placeholder {
            color: #7b7e81;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #7b7e81;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color: #7b7e81;
        }

        textarea:focus,
        input:focus,
        input[type]:focus{
            box-shadow: #8b8d78;
        }

        textarea {
            resize: none;
            text-shadow: #8b8d78;
        }


        /* Main body */
        .container {
            max-width: 800px;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 15px 20px rgba(0,0,0,0.1);

        }
        .form-group small{
            color: #8b8d78;
            visibility: hidden;
        }
        .form-group.error small {
            visibility: visible;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 50px;
            font-weight: 400;
        }

        .form__wrapper {
            background-color: #fff;
            padding: 50px 50px 58px;
            margin: 100px auto 95px;
        }

        .form__btns {
            text-align: center;
        }

        form .button{
            height: 45px;
            margin: 35px 0;

            display: flex;

        }

        form .button button.cancel,
        form .button input{
            height: 100%;
            width: 50%;
            border-radius: 5px;
            border: none;

            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg,  #8b8d78, #d9c6ae);
        }

        form .button button.cancel:hover,
        form .button input:hover{
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg,  #8b8d78, #d9c6ae);
        }
        .form-control {
            color: #717171;
            background-color: #f7f7f7;
            border-radius: 0;
            box-shadow: #8b8d78;

        }
        .form-control    from-control :focus,
        .form-control from-control :valid {
            border-color: #8b8d78;
        }
        textarea.form-control {
            height: 39px;
        }

        .form__comments label:not(:first-child){
            margin-top: 32px;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        /* Responsive */
        @media (min-width: 576px) {

            .form__btns button {
                min-width: 125px;
                margin: 24px 20px 0;
                background: linear-gradient(135deg, #8b8d78, #d9c6ae);
            }

        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<body translate="no" >

<div class="container form__wrapper">

    <h2>Edit your profile</h2>

    <form id="myForm" action="editProfile.php"  method="post" enctype="multipart/form-data">
        <!--  ************         حط كل شي من الداتا بيس بالفاليو          ******  -->
        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="fullName" >Full Name</label>
                <input name="fullName" type="text" class="form-control" id="fullName" value="  <?php echo $fname?>" >

            </div><!-- /form-group -->

            <div class="form-group col-md-6">

                <label for="Username">Username</label>
                <input name="Username" type="text" class="form-control" id="Username" value="<?php echo $row['LoginName']?>" readonly>

            </div><!-- /form-group -->

        </div><!-- /form-row -->

        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="Email">Email</label>
                <input name="Email" type="text" class="form-control" id="Email" value="<?php echo $row['Email']?>" readonly>

            </div><!-- /form-group -->

            <div class="form-group col-md-6">

                <label for="phoneNumber">Phone Number</label>
                <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" value="0<?php echo $phonee?>">

            </div><!-- /form-group -->

        </div><!-- /form-row -->

        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="City">City</label>
                <input name="City" type="text" class="form-control" id="City" value="<?php echo $cityy?>">

            </div><!-- /form-group -->

            <div class="form-group col-md-6">

                <label for="Address">Address</label>
                <input name="Address" type="text" class="form-control" id="Address" value="<?php echo $adress?>">

            </div><!-- /form-group -->

        </div><!-- /form-row -->

        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">

            </div><!-- /form-group -->

            <div class="form-group col-md-6">

                <label for="Address">Confirm Password</label>
                <input name="password2" type="password" class="form-control" id="password2" placeholder="Confirm Password">
                <small>Passwords does not match , try again to reset your password !</small>
            </div><!-- /form-group -->
        </div><!-- /form-row -->

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="file" name="Picture" id="pic"  onchange="showImage()" required>
            </div>

            <div class="form-group col-md-6">
                <img src="" alt="" id="output" width="200" height="150">
            </div>


        </div>



        <script>

            function showImage() {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(document.getElementById('pic').files[0]);
                console.log(image.src);
            }

            const btn= document.getElementById('btn')
            const form = document.getElementById('myForm');
            const password = document.getElementById('password');
            const password2 = document.getElementById('password2');

            // form.addEventListener('submit', e => {
            //     e.preventDefault();
            //     if(checkInputs())
            //     // window.location.href="profile.php";
            //
            // });
            form.addEventListener('submit', e => {
                // e.preventDefault();

                checkInputs();

            });


            function checkInputs() {
                const passwordValue = password.value.trim();
                const password2Value = password2.value.trim();

                if(passwordValue !== password2Value) {
                    //  setErrorFor(password2, 'Passwords does not match !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    setErrorFor(password2, 'Passwords does not match , try again to reset your password !');
                    return false;
                } else{
                    setSuccessFor(password2);
                    return true;
                }
            }

            function setErrorFor(input, message) {
                const formControl = input.parentElement;
                const small = formControl.querySelector('small');
                formControl.className = 'form-group error';
                small.innerText = message;
            }

            function setSuccessFor(input) {
                const formControl = input.parentElement;
                formControl.className = 'form-group success';
            }

        </script>
        <div class="button">
            <input type="submit" value="Save" name="Save" style='margin-right:16px'>
            <button type="button" onclick="javascript:window.location.href='profile.php'" class="cancel" style='margin-right:16px'>Cancel</button>
        </div>
    </form>
</div>
</body>
</html>