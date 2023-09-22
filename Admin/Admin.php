<?php
session_start();
if(isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1) {
        $flag = 0;
        $userlvl = 0;
        try {
            $db = mysqli_connect('localhost', 'root', '', 'special');
            $qryStr= "select * from members WHERE flag=$flag and UserLevel = $userlvl";
            $res= $db->query($qryStr);
            $row=$res->fetch_assoc();
            $pic = $row['ProfilePic'];
            $db->close();
        } catch (Exception $e) {

        }
    } else {
        header('location: ../PHP/login.php');
    }

}

?>
<!DOCTYPE html>
<html lang="en" >

<head >

    <meta charset="UTF-8" >

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <title> Admin Dashboard </title>
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


    <script >
        window.console = window.console || function(t) {};
    </script>



    <script >
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body translate="no"  >

<body>

<ul id="slide-out" class="side-nav fixed z-depth-2"   >
    <li class="center no-padding"  >
        <div  style="height: 180px; background-color: #0e0e0e ; color: #ffffff" >
            <div class="row" style="background-color: #0e0e0e ; color: #ffffff "  >

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


<header >

    <nav >
        <div class="nav-wrapper bg-secondary text-white "  style="background: #0e0e0e" >
            <a style="margin-left: 20px; color: #ffffff" class="breadcrumb" >Admin</a>
            <a class="breadcrumb" style="color: #ffffff">Dashboard</a>

            <div style="margin-right: 20px; " id="timestamp" class="right"></div>
        </div>
    </nav>
</header>

<main >
    <div class="row" >
        <div class="col s6">
            <div style="padding: 35px;" align="center" class="card" >
                <div class="row">
                    <div class="left card-title" >
                        <b>Little Princess Management</b>
                    </div>
                </div>
                <div class="row">
                    <a href="Dressing.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">Dress</h5></span>
                        </div>
                    </a>

                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="Jeanss.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202 ">Jeans</h5></span>
                        </div>
                    </a>

                </div>
                <div class="row">
                    <a href="ACC.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">Accessories</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="Rings.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">T-shirt </h5></span>
                        </div>
                    </a>


                </div>
                <div class="row">
                    <a href="Heading.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">2-piece</h5></span>
                        </div>
                    </a>
                    <div class="col s1">&nbsp;</div>
                    <div class="col s1">&nbsp;</div>

                    <a href="Glove.php">
                        <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                            <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">Shoes </h5></span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <div style="padding: 35px;" align="center" class="card">
                    <div class="row">
                        <div class="left card-title">
                            <b>User Management</b>
                        </div>
                    </div>

                    <div class="row">
                        <a href="Customers.php">
                            <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                                <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">Customers</h5></span>
                            </div>
                        </a>
                        <div class="col s1">&nbsp;</div>
                        <div class="col s1">&nbsp;</div>

                        <a href="Order.php" >
                            <div style="padding: 30px; " class="grey lighten-3 col s5 waves-effect">
                                <span class="indigo-text text-lighten-1"><h5 style="color: #7a0202">Orders</h5></span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>


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