<?php
$flag = 0;
$userlvl = 0;
try {
    $db = mysqli_connect('localhost', 'root', '', 'special');
    $qryStr = "select * from members WHERE UserLevel = $userlvl";
    $res = $db->query($qryStr);
    $row = $res->fetch_assoc();
    $pic = isset($row['ProfilePic']) ? $row['ProfilePic']: 0;
    $db->close();
} catch (Exception $e) {

}

try{
    $dbb = mysqli_connect('localhost', 'root', '', 'special');
    $qry= "select * from members WHERE flag = $flag and UserLevel = $userlvl" ;
    $ress= $dbb->query($qry);
    $roww=$ress->fetch_assoc();
    $id = isset($roww['id']) ? $roww['id']: 0;


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

                $query = "UPDATE members SET ProfilePic ='$new_img_name' WHERE id =$id";
                $results = mysqli_query($dbb, $query);
//                    header('Location:Orders.php');
                $dbb->commit();
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

    if(isset($_POST['Save'])){
        if(isset($_POST['fullName'])){
            $fname=$_POST['fullName'];
            $query = "UPDATE  members SET FullName ='$fname' WHERE id =$id";
            $results = mysqli_query($dbb, $query);

            $dbb->commit();
        }
        if(isset($_POST['phoneNumber'])){
            $phonee=$_POST['phoneNumber'];
            $query = "UPDATE  members SET Phone =$phonee WHERE id =$id";
            $results = mysqli_query($dbb, $query);
            $dbb->commit();
        }
        if(isset($_POST['City'])){
            $cityy=$_POST['City'];
            $query = "UPDATE  members SET City ='$cityy' WHERE id =$id";
            $results = mysqli_query($dbb, $query);
            $dbb->commit();
        }
        if(isset($_POST['Address'])){
            $adress=$_POST['Address'];
            $query = "UPDATE  members SET Address ='$adress' WHERE id =$id";
            $results = mysqli_query($dbb, $query);
            $dbb->commit();
        }
        if(isset($_POST['password']) && isset($_POST['password2'])){
            if($_POST['password']==$_POST['password2']){
                $pass=sha1($_POST['password']);
                $query = "UPDATE  members SET LoginPass ='$pass' WHERE id =$id";
                $results = mysqli_query($dbb, $query);
                $dbb->commit();
            }
        }
        header('location: profile.php');
    }
}catch (Exception $e){

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <title> Little Princess | Profile </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <link href="../CSS/Admin.css" type="text/css" rel="Stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>

    <style>

        .card {
            box-shadow: 0 1px 3px 0 #d9c6ae, 0 1px 2px 0 #d9c6ae;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .mb-3 {
            margin-bottom: 1rem!important;
        }

    </style>
    <style>

        .button {
            position: relative;
            color: white;
            padding: 5px 37px;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            border: beige;
        /cursor: pointer;/
        background-color: #8b8d78;
        }
        .button:focus{
            background: #8b8d78;
        }
        .form-popup{
            display: none;
        /position: fixed;/
        bottom: 0;
            right: 35%;
            top: 200px;
        /border: 3px solid #f1f1f1;/
        z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 800px;
            padding: 10px;
            background-color: white;
        }
        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus,
        .form-container input[type=email]:focus
        {
            background-color: rgba(147, 186, 252,0.3);
            border-bottom: 2px solid #8b8d78;

        }

        .col-25 {
            float: left;
            width:40%;
            margin-top: 6px;
            padding-right: 20px;
        }

        .col-75 {
            float: left;
            width: 40%;
            margin-top: 6px;
        }
        .col-100 {
            float: left;
            width: 20%;
            margin-top: 6px;
            padding-left: 20px;
        }
        label{
            font-size: 15px;
        }
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 20px;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>

    <script>
        function openForm() {

            document.getElementById("myForm1").style.display = "block";
            document.getElementById("mainDiv").style.display = "none";
        }

        function closeForm() {
            document.getElementById("myForm1").style.display = "none";
            document.getElementById("mainDiv").style.display = "block";

        }
    </script>

    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body translate="no" >

<body>

<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
        <div class="indigo darken-2 white-text" style="height: 180px; background-color: #0e0e0e ; color: #ffffff">
            <div class="row" style="background-color: #0e0e0e ; color: #ffffff">
                <?php
                if($pic[0] == 'h') {
                    echo '
                        <img style="margin-top: 5%;" width="100" height="100" src="'.$pic.'" class="circle responsive-img"  alt=""/>
                        <p style="margin-top: -13%;">
                            <b>Welcome  '.$row['FullName'].' </b>
                        </p>
                         ';

                }
                else{
                    $au = '../uploads/'.$pic;
                    echo '
                        <img src="'.$au.'" alt="Admin" class="rounded-circle" width="150">
                        <p style="margin-top: -13%;">
                            <b>Welcome  '.$row['FullName'].' </b>
                        </p>
                          ';
                }
                ?>
            </div>
        </div>
    </li>

    <li id="dash_dashboard"><a class="waves-effect" href="Admin.php"><b  style="color: #0e0e0e">Dashboard</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="Customers.php"><b  style="color: #0e0e0e">Customers</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">

        <li id="dash_products">
            <div id="dash_products_header" class="collapsible-header waves-effect"><b  style="color: #0e0e0e">Categories</b></div>
            <div id="dash_products_body" class="collapsible-body">
                <ul >
                    <li id="products_product"  >
                        <a class="waves-effect" style="text-decoration: none ; color: #6e6e6e " href="Rings.php">T-shirt</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Jeanss.php">Jeans</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Heading.php">2-piece</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Dressing.php">Dress</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="ACC.php">Accessories</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Glove.php">Shoes</a>

                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <li id="dash_dashboard"><a class="waves-effect" href="Order.php"><b style="color: #0e0e0e">Orders</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="Charts.php"><b style="color: #0e0e0e">Charts</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="Profile.php"><b style="color: #0e0e0e">Profile</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="logout.php"><b style="color: #0e0e0e">Logout</b></a></li>
</ul>

<header>
    <nav >
        <div class="nav-wrapper bg-secondary text-white "  style="background: #0e0e0e" >
            <a style="margin-left: 20px; color: #ffffff" class="breadcrumb" >Admin</a>
            <a class="breadcrumb" style="color: #ffffff">Profile</a>


            <div style="margin-right: 20px; " id="timestamp" class="right"></div>
        </div>
    </nav>
</header>

<main>
    <div id="mainDiv">
        <!--    top left down right-->
        <div class="col-md-8" style="padding:30px 100px 10px 100px">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['FullName']?> <!--                *****-->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['LoginName']?> <!--                *****-->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['Email']?> <!--                *****-->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">Phone Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            0<?php echo $row['Phone']?> <!--                *****-->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">City</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['City']?> <!--                *****-->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0" style="color: #8b8d78">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['Address']?> <!--                *****-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button type="submit" class="button" onclick="openForm()" style="margin-left: 100px; color:#7a0202  ">Edit Profile Info</button>
    </div>

    <div class="form-popup" id="myForm1" style="padding:30px 100px 10px 100px">
        <a style="color: #8b8d78; font-size: 30px">Edit Admin Info</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container" method="post">

            <div class="col-25">
                <label for="FullName"><b style="color: #8b8d78">Full Name</b></label>
                <input type="text" name="firstname" value="<?php echo $row['FullName']?>">
                <label for="Email"><b style="color: #8b8d78">Email</b></label>
                <input type="email" name='Email' value="<?php echo $row['Email']?>">

                <label for="City"><b>City</b style="color: #8b8d78"></label>
                <input type="text" name='City' value="<?php echo $row['City']?>">

                <label for="password" ><b style="color: #8b8d78">Password</b></label>
                <input type="password" name="password" placeholder="Enter password" name="LoginPass">
                <br>
                <br>
            </div>

            <div class="col-75">
                <label for="LoginName"><b style="color: #8b8d78">Username</b></label>
                <input type="text" name="firstname" value="<?php echo $row['LoginName']?>">
                <label for="Phone"><b style="color: #8b8d78">Phone Number</b></label>
                <input type="text" name='Phone' value="0<?php echo $row['Phone']?>" pattern="[0-9]{10}">
                <label for="Address"><b style="color: #8b8d78">Address</b></label>
                <input type="text" name='Address' value="<?php echo $row['Address']?>">
                <label for="password2"><b style="color: #8b8d78">Confirm Password</b></label>
                <input type="password" name="password2" placeholder="Confirm password" name="password2">
                <br>
            </div>

            <br>
            <div class="col-100">
                <label for="pic"><b style="color: #8b8d78">Profile Picture</b></label>
                <br>
                <br>
                <img src="" alt="" id="output" width="200" height="150">
                <br>
                <br>
                <input type="file" name="Picture"  id="pic" value="" onchange="showImage()">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>


            <button type="submit" class="button" name="Save" style=" background-color: #0e0e0e" >Save</button> <!--           *****-->
            <button type="button" class="button" id="closeForm1"
                    style=" background-color: #0e0e0e" onclick="closeForm(this);">Cancel</button>
        </form>
    </div>

    <script>
        function showImage() {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(document.getElementById('pic').files[0]);
            console.log(image.src);
        }
    </script>


</main>
</body>

</html>

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
<script id="rendered-js" >
    $('.button-collapse').sideNav();

    $('.collapsible').collapsible();

    $('select').material_select();
    //# sourceURL=pen.js
</script>


</body>
</html>