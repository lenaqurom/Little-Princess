<?php
$flag = 0;
$userlvl = 0;
try {
    $db = mysqli_connect('localhost', 'root', '', 'special');
    $qryStr = "select * from members WHERE UserLevel = $userlvl";
    $res = $db->query($qryStr);
    $row = $res->fetch_assoc();
    $pic = $row['ProfilePic'];
    $db->close();
}
catch (Exception $e) {

}
if(isset($_POST['add'])){
    $_SESSION['var'] = $_POST['add'];
    $pri = $_POST['price'];
    $qua = $_POST['Quantity'];
    $Fnam = $_POST['FlowerName'];
    $date = $_POST['Date'];
    $tot = $qua * $pri;
    echo $date;
    $dbb = mysqli_connect('localhost', 'root', '', 'special');
    $query = "INSERT INTO sales (flowerName,Quantity,priceForOne,total, Date)
  			  VALUES('$Fnam',$qua, $pri, $tot,'$date')";
    mysqli_query($dbb, $query);
    header('location:Order.php');
    $db->close();
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
            <a class="breadcrumb" style="color: #ffffff">Orders</a>

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
                border: 1px solid #0e0e0e;
                font-size: 15px;
            }
            #table th, #myTable td {
                text-align: left;
                padding: 12px;
            }

            #table tr {
                border-bottom: 1px solid #0e0e0e;
            }

            #table tr.header, #table tr:hover {
                background-color: #9e9f9f;
            }
            .button {
                position: relative;
                color: white;
                padding: 5px 37px;
                text-decoration: none;
                display: inline-block;
                font-size: 25px;
                border: beige;
                /*cursor: pointer;*/
                background-color: #0e0e0e
            }
            .button:focus{
                background: #9f9e9e;
            }
            #nInput:focus{
                border-bottom: 2px solid #9f9e9e;
            }

            /* The popup form - hidden by default */
            .form-popup,.form-popup2 {
                display: none;
                /*position: fixed;*/
                bottom: 0;
                right: 35%;
                top: 200px;
                border: 3px solid #f1f1f1;
                z-index: 9;
            }

            /* Add styles to the form container */
            .form-container, .form-container2 {
                max-width: 800px;
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
                background-color: #4d4a4a;
                color: #0e0e0e;
            }

            /* Add a color to the delete button */
            .deletebtn, .deletebtn:focus {
                background-color: #4d4a4a;
            }

            /* Add padding and center-align text to the container */
            .container {
                padding: 16px;
                text-align: center;
            }

            /*The Modal (background)*/
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: hidden; /* Enable scroll if needed */
                /*background-color: rgba(121, 120, 120,1);*/
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
                color: #4d4a4a;
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

    <div class="form-popup" id="myForm1" style="padding: 30px">
        <a style="color: #0e0e0e; font-size: 30px">Add Order</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container" method="post">

            <div class="col-25">
                <label for="price"><b>Product Price</b></label>
                <input type="number" name="price" placeholder="Enter Price Of Product" required>
                <label for="Quantity"><b>Quantity</b></label>
                <input type="number" name='Quantity' placeholder="Enter Quantity" required>

                <br>
            </div>
            <div class="col-75">
                <label for="FlowerName"><b>Product Name</b></label>
                <input type="text" name="FlowerName" placeholder="Enter Product Name" required>
                <label for="Date"><b>Order Date</b></label>
                <input type="date" name='Date' placeholder="Enter Date" required>

                <br>
            </div>

            <br>

            <button type="submit" class="button" name="add">Add</button>
            <button type="button" class="button" id="closeForm1"
                    style=" background-color: #7a0202" onclick="closeForm(this);">Cancel</button>
        </form>
    </div>

    <div class="form-popup2" id="myForm2" style="padding: 30px">
        <a style="
       color: black; font-size: 30px">Edit Order</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container2">


            <div class="col-25">
                <label for="ID"><b>Order ID</b></label>
                <input type="number" name="ID">
                <label for="Quantity"><b>Quantity</b></label>
                <input type="number" name='Quantity'>

                <br>
            </div>
            <div class="col-75">
                <label for="FlowerName"><b>Product Name</b></label>
                <input type="text" name="FlowerName">
                <label for="Date"><b>Order Date</b></label>
                <input type="date" name='Date'>

                <br>
            </div>


            <button type="submit" class="button">Edit</button>
            <button type="button" class="button" style=" background-color: #7a0202;"
                    onclick="document.getElementById('id01').style.display='block'">Delete</button><br>

            <button type="button" class="button" id="closeForm2" style=" background-color: #7a0202; margin-top: 10px"
                    onclick="closeForm(this)">Cancel</button>
        </form>
    </div>



    <script>
        function openForm(myForm) {
            var id = myForm.id;
            if (id === "openform1") {

                document.getElementById("myForm1").style.display = "block";
            }else   document.getElementById("myForm2").style.display = "block";
            document.getElementById("mainDiv").style.display = "none";
        }

        function closeForm(myForm) {
            var id = myForm.id;
            if (id === "closeForm2"){
                document.getElementById("myForm2").style.display = "none";
            } else document.getElementById("myForm1").style.display = "none";
            document.getElementById("mainDiv").style.display = "block";

        }
    </script>

    <div id="mainDiv" style="padding: 30px">
        <a style="color: #0e0e0e; font-size: 30px">Orders Table</a>
        <div style="text-align: right">
            <input type="button" class="button" value="ADD" id="openform1" onclick="openForm(this);">
        </div>
        <input type="text" id="nInput" placeholder="Search..." title="Type in" >

        <table id="table">
            <thead>
            <tr class="header">
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Edit/delete</th>

            </tr>
            </thead>
            <tbody id="myTable">
            <form action="editOrder.php" method="post">
                <?php
                $userlvl = 1;
                try{
                    $db = mysqli_connect('localhost', 'root', '', 'special');
                    $qryStr= "select * from sales";
                    $res= $db->query($qryStr);
                    for($i=0;$i<$res->num_rows;$i++) {
                        $row = $res->fetch_object();
                        echo '
                        <tr>
                            <td>'.$row->orderId.'</td>
                            <td>'.$row->productName.'</td>
                            <td>'.$row->Quantity.'</td>
                            <td>'.$row->Date.'</td>
                           
                            <td><button name="edit" type="submit" value="'.$row->orderId. '" style="color: #ffffff; background-color: #7a0202;" id="openform2"
                             >Edit</button></td>
                         </tr>';
                    }
                }
                catch (Exception $e){

                }


                ?>
            </form>
            </tbody>
        </table>
    </div>

    </body>
    </html>

</main>
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" action="Order.php">
        <div class="container">
            <h5>Delete Order</h5>
            <p>Are you sure you want to delete this Order?</p>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                <button type="button"
                        class="deletebtn" id="closeForm2" onclick="

                        closeForm(this);
                        document.getElementById('id01').style.display='none'"
                >Delete</button>
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