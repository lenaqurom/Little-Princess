<?php
session_start();
if(isset($_SESSION['user'])) {
    if ($_SESSION['user'] == 1) {

        try {
            $db = mysqli_connect('localhost', 'root', '', 'special');
            $qryStr = "select * from members ";
            $res = $db->query($qryStr);
            $no = 0;
            $yes = 0;
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_object();
                if ($row->flag == 0 and $row->UserLevel == 1) {
                    $no = 0;
                } else if ($row->flag == 0 and $row->UserLevel == 1) {
                    $yes = 1;
                    $email = $row->Email;
                }
            }
            $bar = ($no || $yes);
        } catch (Exception $e) {

        }
        if (isset($_POST['remove'])) {
            try {
                $ii = $_POST['remove'];
                $db = mysqli_connect('localhost', 'root', '', 'special');
                $sql = "DELETE FROM `cart` WHERE `cart`.`id` = $ii";
                $db->query($sql);
                $db->close();
            } catch (Exception $e) {

            }
        }
        if (isset($_POST['qt-minus'])) {
            try {
                $ii = explode(' ', $_POST['qt-minus']);
                $quaa = $ii[0];
                $idd = $ii[1];
                $db = mysqli_connect('localhost', 'root', '', 'special');
                $quaa = $quaa - 1;
                $sql = "UPDATE cart SET Quantity='$quaa' WHERE id='$idd'";
                $results = mysqli_query($db, $sql);
                header('location:Cart.php');
                $db->close();
            } catch (Exception $e) {

            }
        }
        if (isset($_POST['qt-plus'])) {
            try {
                $ii = explode(' ', $_POST['qt-plus']);
                $quaa = $ii[0];
                $idd = $ii[1];
                $db = mysqli_connect('localhost', 'root', '', 'special');
                $quaa = $quaa + 1;
                $sql = "UPDATE cart SET Quantity='$quaa' WHERE id='$idd'";
                $results = mysqli_query($db, $sql);
                header('location:Cart.php');
                $db->close();
            } catch (Exception $e) {

            }
        }
    }else {
        header('location: ../PHP/login.php');
    }
}
if (isset($_POST['profit'])){
    $message = "your order is done ;)";
    echo "<script type = 'text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Little Princess | Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="../CSS/Cart.css" type="text/css" rel="Stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>

        #hero {
            background: url("../image/black-friday-elements-assortment.jpg") center center no-repeat;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            height: 40%;
            width: 100%;
        }

    </style>

</head>


<body style="background-color: #ffc460">
<div id="all">
    <div id="header-hero-container">
        <header>
            <div class="flex container">
                <a id="logo" href="#">Little Princess</a>
                <nav>

                    <div class="h">

                        <button id="nav-toggle" class="hamburger-menu">
                            <span class="strip"></span>
                            <span class="strip"></span>
                            <span class="strip"></span>
                        </button>

                        <ul class ="nav-menu" id="nav-menu">
                            <li><a class="active">Home</a></li>
                            <li><a href="../PHP/Dress.php">Dress</a></li>
                            <li><a href="Shoes.php">Shoes</a></li>
                            <li>
                                <a href="#" class="desktop-item">Kids Collection</a>
                                <input type="checkbox" id="showMega">
                                <label for="showMega" class="mobile-item">All Categories</label>
                                <div class="mega-box">
                                    <div class="content">
                                        <div class="row">
                                            <img src='../image/istockphoto-1268183201-612x612.jpg' alt="">
                                        </div>
                                        <div class="row">
                                            <ul class="mega-links">
                                                <li><a href="Dress.php">Dress</a></li>
                                                <li><a href="Jeans.php" >Jeans</a></li>
                                                <li><a href="T-shirt.php">T-shirt</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <ul class="mega-links">
                                                <li><a href="2-piece.php">2-piece</a></li>
                                                <li><a href="Shoes.php">Shoes</a></li>
                                                <li><a href="acce.php" >Accessories</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!--                            -->
                            <li><a href="../PHP/acce.php">Accessories</a></li>
                            <?php
                            $no = 0;
                            $yes = 1;
                            $bar = ($no || $yes);
                            if($bar){
                                echo '<li class="nr_li dd_main"><a><i class="fa fa-user"></i></a>
                                    <ul class="dd_menu">
                                        <li><a href="profile.php" target="_blank"><i class="fas fa-id-card">َ   َ View profile</i></a></li>
                                        <li><a href="#"><i class="fas fa-shopping-cart">َ   َ View cart</i></a></li>
                                        <li><a href="logout.php"><i class="fas fa-sign-out-alt">َ   َ Logout</i></a></li>
                                    </ul>
                                </li>';
                            }
                            else if(!$bar){
                                echo '   <li class="nr_li dd_main"><a><i class="fa fa-user"></i></a>
                                    <ul class="dd_menu">
                                        <li><a href="login.php"><i class="fas fa-sign-in-alt">َ   َ Login</i></a></li>
                                        <li><a href="Registration.php"><i class="fas fa-user-plus">َََ   َ Sign up</i></a></li>
                                    </ul>
                                </li>';
                            }
                            ?>
                            <script>
                                var dd_main = document.querySelector(".dd_main");

                                dd_main.addEventListener("click", function(){
                                    this.classList.toggle("active");
                                })
                            </script>


                            <li id="close-flyout"><span class="fas fa-times"></span></li>
                        </ul>

                    </div>

                </nav>
            </div>
        </header>
    </div>

    <section id="hero"></section>

    <div class="Card_cart">
        <section id="cart">
            <form action="Cart.php" method="post">


                <!--        <article class="product">-->
                <?php

                try {
                    $total=0;
                    $dbb = new mysqli('localhost', 'root', '', 'special');
                    $qryStr = "select * from cart where Email = '$email' ";
                    $res= $dbb->query($qryStr);
                    if(!$res){
                        echo ' <div>
                                <h2>hi</h2>
                           </div>';
                    }
                    for($i=0;$i<$res->num_rows;$i++) {
                        $row = $res->fetch_object();
                        if($row->Email == $email){
                            $Fname = $row->name;
                            $Furl = $row->URL;
                            $Fprice = $row->price;
                            $id=$row->id;
                            $qua=$row->Quantity;
                            echo '
                         <article class="product">
                        <header>
                            <button  class="remove" name="remove" type="submit" value='.$id.'>
                            <img src='.$Furl.' alt="صورة الوردة">
                            <h3>Remove product</h3>
                            </button>
                        </header>

                        <div class="content">
                        <h1>'.$Fname.'</h1>
                        Thank you for chose our shop
                        </div>

                        <footer class="content">
                            <button class="qt-minus" name="qt-minus" value="'.$qua.' '.$id.'">-</button>
                            <span class="qt">'.$qua.'</span>
                            <button class="qt-plus" name="qt-plus" value="'.$qua.' '.$id.'">+</button>
                            <form action="/Cart.php">
  <label for="cars">Choose a size:</label>
  <select name="cars" id="SIZE">
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
  </select>
                             <h2 class="full-price">
                        <!--                    هون سعر الوردة                -->
                               '.($qua*$Fprice).'₪
                             </h2>

                            <h2 class="price">
                                <!--                    هون سعر الوردة                -->
                                '.$Fprice.'₪
                            </h2>
                        </footer>
                        </article>
                    ';
                            $total=$total + ($qua*$Fprice);
                        }
                    }
                }
                catch (Exception $e){
                }
                ?>
            </form>

        </section>
    </div>



    <footer id="site-footer">
        <div class="Card_cart clearfix">
            <div class="left">
                <h2 class="subtotal">Subtotal: <span> <?php echo $total ?></span>₪</h2>
                <h3 class="shipping">Delivery: <span>20.00</span>₪</h3>
            </div>
            <form action="Cart.php" action="profit.php" method="post">
                <div class="right">
                    <h1 >Total: <span><?php echo $total+ 20 ?></span>₪</h1>
                    <button type="submit" class="btn" name="profit" value="<?php echo $email?>">Checkout</button>
                </div>
            </form>
        </div>
    </footer>


    <footer id="dica" style="height: 300px"; color="white";>

    </footer>
    <script>
        $(function () {
            let headerElem = $('header');
            let logo = $('#logo');
            let navMenu = $('#nav-menu');
            let navToggle = $('#nav-toggle');



            navToggle.on('click', () => {
                navMenu.css('right', '0');
            });
            $('#close-flyout').on('click', () => {
                navMenu.css('right', '-100%');
            });
            $(document).on('click', (e) => {
                let target = $(e.target);
                if (!(target.closest('#nav-toggle').length > 0 || target.closest('#nav-menu').length > 0)) {
                    navMenu.css('right', '-100%');
                }
            });
            $(document).scroll(() => {
                let scrollTop = $(document).scrollTop();
                if (scrollTop > 0) {
                    navMenu.addClass('is-sticky');
                    logo.css('color', '#8B008B');
                    headerElem.css('background', '#F5FFFA');
                    navToggle.css('border-color', '#8B008B');
                    navToggle.find('.strip').css('background-color', '#0e0e0e');
                } else {
                    navMenu.removeClass('is-sticky');
                    logo.css('color', '#8B008B');
                    headerElem.css('background', 'transparent');
                    navToggle.css('bordre-color', '#0e0e0e');
                    navToggle.find('.strip').css('background-color', '#0e0e0e');
                }
// headerElem.css(scrollTop >= 200 ? {'padding': '0.5rem', 'box-shadow': '0 -4px 10px 1px #999'} : {'padding': '1rem 0', 'box-shadow': 'none' });
// مشان المربعات يلي حوالين الهيدر ينشالو
            });
            $(document).trigger('scroll');
        });
    </script>
</body>
</html>