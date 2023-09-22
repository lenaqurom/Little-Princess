<?php
$flag = 0;
$userlvl = 0;
try {
    $db = mysqli_connect('localhost', 'root', '', 'special');
    $qryStr = "select * from members WHERE flag=$flag and UserLevel = $userlvl";
    $res = $db->query($qryStr);
    $row = $res->fetch_assoc();
    $pic = $row['ProfilePic'];
    $db->close();
} catch (Exception $e) {

}
$dbb = mysqli_connect('localhost', 'root', '', 'special');
if(isset($_POST['edit'])){
    $id=$_POST['edit'];
    $qry = "select * from sales WHERE orderId = $id";
    $ress = $dbb->query($qry);
    $roww = $ress->fetch_assoc();
    $dbb->close();
}
if(isset($_POST['btn'])){
    $idd = $_POST['ID'];
    $qua = $_POST['Quantity'];
    $fName = $_POST['flowerName'];
    $date = $_POST['Date'];
    $qryy = "select * from sales WHERE orderId  = $idd";
    $reess = $dbb->query($qryy);
    $rooww = $reess->fetch_assoc();
    $pri = $rooww['priceForOne'];
    $tot = $qua * $pri;
    $query = "UPDATE sales SET productName ='$fName', Quantity = $qua, Date = '$date', total = $tot WHERE orderId = $idd";
    $results = mysqli_query($dbb, $query);
    header('Location:Order.php');
    $dbb->commit();
}
if(isset($_POST['del'])){
    $i=$_POST['del'];
    $sql = "DELETE FROM `sales` WHERE orderId = $i";
    $dbb->query($sql);
    header('Location:Order.php');
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <title> Little Princess | Orders </title>
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
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
        <div class="indigo darken-2 white-text" style="height: 180px; background-color: #0e0e0e ; color: #ffffff">
            <div class="row"style="background-color: #0e0e0e ; color: #ffffff">
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
                        <a class="waves-effect" style="text-decoration: none ; color: #6e6e6e " href="Rings.php">Rings</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Jeanss.php">Flowers</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Heading.php">Head Accessories</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Dressing.php">Dress</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="ACC.php">Accessories</a>
                        <a class="waves-effect" style="text-decoration: none; color: #6e6e6e" href="Glove.php">Wedding Invitation</a>
                        <a class="waves-effect" style="text-decoration: none;; color: #6e6e6e " href="Bridess.php">Brides</a>
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
            <a class="breadcrumb" style="color: #ffffff">Edit-Orders</a>


            <div style="margin-right: 20px; " id="timestamp" class="right"></div>
        </div>
    </nav>
</header>

<main>




    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <style>
            * {
                box-sizing: border-box;
            }
            #table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #8b8d78;
                font-size: 15px;
            }
            #table th, #myTable td {
                text-align: left;
                padding: 12px;
            }

            #table tr {
                border-bottom: 1px solid #8b8d78;
            }

            #table tr.header, #table tr:hover {
                background-color: rgba(147, 186, 252,0.3);
            }
            .button {
                position: relative;
                color: white;
                padding: 5px 37px;
                text-decoration: none;
                display: inline-block;
                font-size: 25px;
                border: beige;
            /cursor: pointer;/
            background-color: #8b8d78;
            }
            .button:focus{
                background: #8b8d78;
            }
            #nInput:focus{
                border-bottom: 2px solid #8b8d78;
            }

            /* The popup form - hidden by default */
            .form-popup,.form-popup2 {
                display: block;
            /position: fixed;/
            bottom: 0;
                right: 35%;
                top: 200px;
                border: 3px solid #f1f1f1;
                z-index: 9;
            }

            /* Add styles to the form container */
            .form-container, .form-container2 {
                max-width: 600px;
                padding: 10px;
                background-color: white;
            }
            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus,
            .form-container input[type=password]:focus,
            .form-container input[type=email]:focus,

            .form-container2 input[type=text]:focus,
            .form-container2 input[type=password]:focus,
            .form-container2 input[type=email]:focus
            {
                background-color: rgba(147, 186, 252,0.3);
                border-bottom: 2px solid #8b8d78;

            }

            .col-25 {
                float: left;
                width:50%;
                margin-top: 6px;
                padding-right: 20px;
            }

            .col-75 {
                float: left;
                width: 50%;
                margin-top: 6px;
            }
            label{
                font-size: 15px;
            }
        </style>

        <style>

            .cancelbtn, .deletebtn {
                float: left;
                width: 50%;
                border: whitesmoke;
                color: whitesmoke;
            }

            /* Add a color to the cancel button */
            .cancelbtn ,.cancelbtn:focus{
                background-color: #ccc;
                color: black;
            }

            /* Add a color to the delete button */
            .deletebtn, .deletebtn:focus {
                background-color: #8b8d78;
            }

            /* Add padding and center-align text to the container */
            .container {
                padding: 16px;
                text-align: center;
            }

            /The Modal (background)/
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: hidden; /* Enable scroll if needed */
            /background-color: rgba(121, 120, 120,1);/
            background: none;
                padding-top: 50px;


            }

            /* Modal Content/Box */
            .modal-content {
                background-color: whitesmoke;
                margin: 5% auto 20% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 37%; /* Could be more or less, depending on screen size */

            }

            /* Style the horizontal ruler */
            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* The Modal Close Button (x) */
            .close {
                position: absolute;
                right: 35px;
                top: 15px;
                font-size: 40px;
                font-weight: bold;
                color: #f1f1f1;
            }

            .close:hover,
            .close:focus {
                color: #8b8d78;
                cursor: pointer;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Change styles for cancel button and delete button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .deletebtn {
                    width: 100%;
                }
            }
        </style>

        <script>
            $(document).ready(function(){
                $("#nInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    </head>
    <body>

    <div class="form-popup2" id="myForm2" style="padding: 30px">
        <a style="color: #8b8d78; font-size: 30px">Edit Order</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container2" method="post">


            <div class="col-25">
                <label for="ID"><b>Order ID</b></label>
                <input type="number" name="ID" value="<?php echo $row['orderId']?>" readonly>
                <label for="Quantity"><b>Quantity</b></label>
                <input type="number" name='Quantity' value="<?php echo $row['Quantity']?>">

                <br>
            </div>
            <div class="col-75">
                <label for="flowerName"><b>Product Name</b></label>
                <input type="text" name="flowerName" value="<?php echo isset($row['productName'])?>">
                <label for="Date"><b>Order Date</b></label>
                <input type="date" name='Date' value="<?php echo $row['Date']?>">

                <br>
            </div>


            <button type="submit" class="button" name="btn" style=" background-color: #0e0e0e ">Edit</button>
            <button type="button" class="button" style=" background-color: #0e0e0e;"
                    onclick="document.getElementById('id01').style.display='block'">Delete</button><br>

            <button type="button" class="button" id="closeForm2"  style=" background-color:#0e0e0e; margin-top: 10px"
                    onclick="javascript:history.back()">Cancel</button>
        </form>
    </div>

    </body>
    </html>

</main>

<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container">
            <h5>Delete Order</h5>
            <p>Are you sure you want to delete this Order?</p>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                <button type="submit" class="deletebtn" id="closeForm2" name="del" value="<?php echo $roww['orderId']?>">Delete</button>
            </div>
        </div>
    </form>
</div>

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