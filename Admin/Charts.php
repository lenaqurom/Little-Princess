
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbCon = 'special';

$mysqli = new mysqli($host,$user,$pass,$dbCon) ;
if ($mysqli ->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$data = '';
$pORq='';
$chartShape='';
$flag='';
$year='';
if(isset($_POST['pORq']))
{
    $pORq = $_POST['pORq'];
}
if(isset($_POST['chartShape']))
{
    $chartShape = $_POST['chartShape'];
}
if(isset($_POST['years']))
{
    $year = $_POST['years'];
}
if($pORq === 'Price'){
    $flag ='Monthly Income from selling flowers in '.$year.'';
    $sql = "SELECT sum(total) AS value_sum FROM `sales` where year(date) ="."'".$year."'"." group by month(date) order by year(date),month(date);";
    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $data = $data . '"' . $row['value_sum'] . '",';
    }

}else if($pORq === 'Quantity'){
    $flag ='Monthly Quantities sold in '.$year.'';
    $sql = "SELECT sum(Quantity) AS value_sum FROM `sales` where year(date) ="."'".$year."'"."  group by month(date) order by year(date),month(date);";

    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $data = $data . '"'. $row['value_sum'] .'",';

    }

}
$count=6;
$data = trim($data,",");
$data = '['.$data.']';

$flag = 0;
$userlvl = 0;
try {
    $dbb = mysqli_connect('localhost', 'root', '', 'special');
    $qry = "select * from members WHERE flag=$flag and UserLevel = $userlvl";
    $ress = $dbb->query($qry);
    $roww = $ress->fetch_assoc();
    $pic = $roww['ProfilePic'];
    $dbb->close();
} catch (Exception $e) {

}
?>
<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <title> Little Princess | Charts </title>
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

    <style>
        #view{
            left: 50%;
            font-size: 15pt;
            margin-top: 30px;
        }
        label{
            font-size: 20px;
        }

        .span-title{
            font-size: 20px;
            font-weight: 500;
        }

        form .gender-details .gender-title{
            font-size: 20px;
            font-weight: 500;
        } form.gender-details .gender-title{
              font-size: 20px;
              font-weight: 500;
          }
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three,
        #dot-4:checked ~ .category label .four,
        #dot-5:checked ~ .category label .five,

        #dot-6:checked ~ .category label .c6,
        #dot-7:checked ~ .category label .c7,
        #dot-8:checked ~ .category label .c8,
        #dot-9:checked ~ .category label .c9,
        #dot-10:checked ~ .category label .c10
        {
            background: #8b8d78;
            border-color: #d9d9d9;
        }
        .category{
            display: flex;
            width: 80%;
            margin: 14px 0 ;
            justify-content: space-between;
        }
        .category label{
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .category label .dot{
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }
        .button {
            position: relative;
            color: white;
            padding: 5px 37px;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            border: beige;
            /*cursor: pointer;*/
            background-color: #8b8d78;
        }
        .button:focus{
            background: #8b8d78;
        }
    </style>
</head>

<body translate="no" >
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

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
                            <b>Welcome  '.$roww['FullName'].' </b>
                        </p>
                         ';

                }
                else{
                    $au = '../uploads/'.$pic;
                    echo '
                        <img src="'.$au.'" alt="Admin" class="rounded-circle" width="150">
                        <p style="margin-top: -13%;">
                            <b>Welcome  '.$roww['FullName'].' </b>
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

<li id="dash_dashboard"><a class="waves-effect" href="Order.php"><b style="color: #8b8d78">Orders</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="Charts.php"><b style="color: #8b8d78">Charts</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="Profile.php"><b style="color: #8b8d78">Profile</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="logout.php"><b style="color: #8b8d78">Logout</b></a></li>
</ul>

<header>
    <nav >
        <div class="nav-wrapper bg-secondary text-white "  style="background: #0e0e0e" >
            <a style="margin-left: 20px; color: #ffffff" class="breadcrumb" >Admin</a>
            <a class="breadcrumb" style="color: #ffffff">Charts</a>

            <div style="margin-right: 20px; " id="timestamp" class="right"></div>
        </div>
    </nav>
</header>
<main>
    <div style="padding: 50px 100px 100px 100px">

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <form action="Charts.php" method="post" >

            <div class="gender-details">
                <input type="radio" name="pORq" id="dot-1" value="Price">
                <input type="radio" name="pORq" id="dot-2" value="Quantity">
                <span class="gender-title">Select the base of the chart</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Price</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Quantity</span>
                    </label>
                </div>
            </div>

            <div class="gender-details">
                <input type="radio" name="chartShape" id="dot-3" value="line">
                <input type="radio" name="chartShape" id="dot-4" value="pie">
                <input type="radio" name="chartShape" id="dot-5" value="bar">
                <span class="gender-title">Select the chart shape</span>
                <div class="category">
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">line</span>
                    </label>
                    <label for="dot-4">
                        <span class="dot four"></span>
                        <span class="gender">pie</span>
                    </label>
                    <label for="dot-5">
                        <span class="dot five"></span>
                        <span class="gender">bar</span>
                    </label>
                </div>
            </div>
            <?php
            $sql = " SELECT DISTINCT year(date) AS years FROM `sales`";
            $result = mysqli_query($mysqli, $sql);
            $count=6;
            echo '<p style=" font-size: 20px;
            font-weight: 500;">Select the year</p>';
            while ($row = mysqli_fetch_array($result)) {
                $years= $row['years'];

                echo '
                 <div class="gender-details">
                <input type="radio" name="years" id="dot-'.$count.'" value="'.$years.'">
               
               
                 <div class="category">
                            <label for="dot-'.$count.'">
                                <span class="dot c'.$count.'"></span>
                                <span class="gender">'.$years.'</span>
                            </label>
                 </div>
                 </div>
            ';
                $count=$count+1;
            }
            ?>
            <!--                    <div class="gender-details">-->
            <!--                        <input type="radio" name="years" id="dot-6" value="2020">-->
            <!--                        <input type="radio" name="years" id="dot-7" value="2021">-->
            <!--                        <span class="gender-title">Select the year</span>-->
            <!--                        <div class="category">-->
            <!--                            <label for="dot-6">-->
            <!--                                <span class="dot six"></span>-->
            <!--                                <span class="gender">2020</span>-->
            <!--                            </label>-->
            <!--                            <label for="dot-7">-->
            <!--                                <span class="dot seven"></span>-->
            <!--                                <span class="gender">2021</span>-->
            <!--                            </label>-->
            <!--                        </div>-->
            <!--                    </div>-->

            <div id="view">
                <button type="submit" class="button">View chart</button>
            </div>
            </section>

        </form>



        <?php
        echo "<br><br><span class='span-title'>The base that you have selected : $pORq </span> <br>";
        echo "<span class='span-title'>The Chart that you have selected : $chartShape </span><br>";
        echo "<span class='span-title'>The year that you have selected : $year </span>";

        ?>
        <!--    top left down right-->
        <canvas id="myChart" style="padding: 50px"></canvas>
        <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                // type: 'bar',
                <?php echo' type: '."'".$chartShape."'".','; ?>
                data: {

                    labels:["January", "February", "March", "April", "May", "June", "July", "August",
                        "September", "October", "November", "December"],
                    datasets: [{

                        label:  <?php echo "'".$flag."'" ?> ,
                        data: <?php echo $data ?> ,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(150,94,69,0.2)',
                            'rgba(248,2,54,0.2)',
                            'rgba(187,200,215,0.2)',
                            'rgba(241,197,3,0.2)',
                            'rgba(3,93,93,0.2)',
                            'rgba(90,17,236,0.2)',
                            'rgba(64,255,233,0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</main>


</body>
</html>
</body>
</html>

