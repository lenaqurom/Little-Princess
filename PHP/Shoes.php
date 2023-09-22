<?php
try {
    $db = mysqli_connect('localhost', 'root', '', 'special');
    $qryStr = "select * from members ";
    $res = $db->query($qryStr);
    $no=0;
    $yes=0;
    for($i=0;$i<$res->num_rows;$i++) {
        $row = $res->fetch_object();
        if($row->flag ==0 and $row->UserLevel == 1){
            $no=0;
        }
        else if($row->flag ==1 and $row->UserLevel == 1){
            $yes=1;
        }
    }
    $bar=($no || $yes);
}catch (Exception $e){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Little Princess | Shoes</title>
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

    <link href="../CSS/product.css" type="text/css" rel="Stylesheet" />
    <link href="../CSS/display.css" type="text/css" rel="Stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <style>

        #hero {
            background: url("../image/portrait-cute-little-kid-girl-stylish-jeans-clothes-looking-camera-smiling-sitting-against-white-studio-wall-kids-fashion-concept.jpg") center center no-repeat;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            height: 100%;
            width: 100%;
        }
    </style>


    <script>

        function c(){
            document.querySelector('.warp').style.display = 'none';
            toggle();

        }
        function d(){
            document.querySelector('.warp').style.display = 'block';
            toggle();
        }
    </script>
    <script type="text/javascript">
        function toggle(){
            var blur = document.getElementById('all');
            blur.classList.toggle('active');
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }

    </script>

</head>

</head>


<body style="background-color: #ffffff">
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
                            if($bar){
                                echo '<li class="nr_li dd_main"><a><i class="fa fa-user"></i></a>
                                    <ul class="dd_menu">
                                        <li><a href="profile.php" target="_blank"><i class="fas fa-id-card">َ   َ View profile</i></a></li>
                                        <li><a href="Cart.php"<i class="fas fa-shopping-cart">َ   َ View cart</i></a></li>
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

        <section id="hero">
            <div class="hero-text">
                <!--                <h1>Wedding Dresses</h1>-->

            </div>
        </section>
    </div>

    <section id="Flowers">
        <div class="container">
            <h2>Shoes</h2>
            <!--            <p class="large-paragraph"> Wedding Dresses :-->
            <!--                Here You can find a lot of  models of dress with international designs . </p>-->

        </div>
    </section>

    <section id="Flowers_cards">
        <div class="main" >
            <!--cards -->
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29.png">
                    </div>
                    <div class="title">
                        <h1>Trainers</h1>
                    </div>
                    <div class="des">
                        <p>90₪</p>
                        <button value="1 glove" name="flowerType">Click here..</button>
                    </div>
                </form>
            </div>
            <!--            ///////////////////-->
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29 (1).png">
                    </div>
                    <div class="title">
                        <h1>Waterproof hi-tops</h1>
                    </div>
                    <div class="des">
                        <p>140₪</p>
                        <button value="2 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>
            <!--            ///////////////////////////////-->
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29 (3).png">
                    </div>
                    <div class="title">
                        <h1>Teddy-lined hi-tops</h1>
                    </div>
                    <div class="des">
                        <p>120₪</p>
                        <button value="3 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>
            <!--            /////////////////////////////////////-->
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29 (4).png">
                    </div>
                    <div class="title">
                        <h1>Slip-on trainers</h1>
                    </div>
                    <div class="des">
                        <p>100₪</p>
                        <button value="4 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>
            <!--            //////////////////////////////////////////-->

            <!--            ///////////////////////////////////////-->
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29 (5).png">
                    </div>
                    <div class="title">
                        <h1>Sandals</h1>
                    </div>
                    <div class="des">
                        <p>80₪</p>
                        <button value="5 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>
            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-04-29 (6).png">
                    </div>
                    <div class="title">
                        <h1>Ballerina trainers</h1>
                    </div>
                    <div class="des">
                        <p>100₪</p>
                        <button value="6 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>

            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-05-05 (1).png">
                    </div>
                    <div class="title">
                        <h1>Sandals</h1>
                    </div>
                    <div class="des">
                        <p>80₪</p>
                        <button value="7 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>

            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-05-05 (2).png">
                    </div>
                    <div class="title">
                        <h1>Printed trainers</h1>
                    </div>
                    <div class="des">
                        <p>100₪</p>
                        <button value="8 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>

            <div class="card"><form action="buy.php" method="post">
                    <div class="image">
                        <img src="../image/2022-05-05.png">
                    </div>
                    <div class="title">
                        <h1>Pastel-coloured trainers
                        </h1>
                    </div>
                    <div class="des">
                        <p>150₪</p>
                        <button value="9 glove" name="flowerType">Click here..</button>
                    </div>
                </form></div>




    </section>

    <footer>
        <div class="flex container">
            <div class="footer-quick-links" >
                <h5>Little Princess</h5>
                <ul>
                    <li><a href="../PHP/Dress.php">Dress</a></li>
                    <li><a href="Jeans.php">Jeans</a></li>
                    <li><a href="T-shirt.php">T-shirt</a></li>
                </ul>
            </div>
            <div class="footer-quick-links" id="quick-links">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="#the-best">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-subscribe">
                <h5 class="follow-us">Follow Us</h5>
                <ul>
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>
        </div>
        <small>
            Copyright &copy; 2022 All rights reserved | Little Princess | designed by Lina
        </small>
    </footer>
</div>
<script>
    $(function () {
        let headerElem = $('header');
        let logo = $('#logo');
        let navMenu = $('#nav-menu');
        let navToggle = $('#nav-toggle');
        $('#Flowers-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a href="#" class="slick-arrow slick-prev">previous</a>',
            nextArrow: '<a href="#" class="slick-arrow slick-next">next</a>',
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 530,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }
            ]
        });
        $('#testimonials-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a href="#" class="slick-arrow slick-prev"><</a>',
            nextArrow: '<a href="#" class="slick-arrow slick-next">></a>'
        });
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