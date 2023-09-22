<?php
session_start();
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
    <title>Little Princess</title>
    <link href="../CSS/Home.css" type="text/css" rel="Stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
<body>
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
                        <ul class ="nav-menu" id="drop-menu">
                            <li><a class="active">Home</a></li>
                            <li><a href="../PHP/Dress.php">Dress</a></li>
                            <li><a href="../PHP/Ring.php">Shoes</a></li>
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
                                                <li><a href="Gloves.php" >Jeans</a></li>
                                                <li><a href="Flowers.php">T-shirt</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <ul class="mega-links">
                                                <li><a href="Head.php">2-piece</a></li>
                                                <li><a href="acce.php">Shoes</a></li>
                                                <li><a href="acce.php" >Accessories</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!--                            -->
                            <li><a href="../PHP/Bride.php">Accessories</a></li>

                            <?php
                            if($bar){
                                echo '<li class="nr_li dd_main""><a><i class="fa fa-user"></i></a>
                                    <ul class="dd_menu">
                                        <li><a href="profile.php" target="_bla
                                        
                                        
                                        
                                        nk"><i class="fas fa-id-card">َ   َ View profile</i></a></li>
                                        <li><a href="Cart.php"><i class="fas fa-shopping-cart">َ   َ View cart</i></a></li>
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
            <div class="fade"></div>
            <div class="hero-text">
                <h1> Kids' favourites, friendly prices!</h1>
                <!--            <p>All you need is right here ...</p>-->
            </div>
        </section>
    </div>

    <section id="Flowers">
        <div class="container">
            <h2>Some Of Our Kids Collection</h2>
            <div id="Flowers-slider" class="slick">
                <div>
                    <a href="Dress.php" target="_blank">
                        <img src='../image/2022-04-26.png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">Dress</p>
                        <address>
                            <h2>100₪</h2>
                        </address>
                    </div>
                </div>

                <div>
                    <a href="Flowers.php" target="_blank">
                        <img src='../image/2022-04-26 (1).png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">T-shirt</p>

                        <address>
                            <h2>40₪</h2>
                        </address>
                    </div>
                </div>

                <div>
                    <a href="Head.php" target="_blank">
                        <img src='../image/2022-04-26 (3).png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">Jeans</p>
                        <h2>110₪</h2>
                        </address>
                    </div>
                </div>

                <div>
                    <a href="acce.php" target="_blank">
                        <img src='../image/2022-04-26 (4).png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">2-piece</p>
                        <h2> 80₪</h2>
                        </address>
                    </div>
                </div>

                <div>
                    <a href="Ring.php" target="_blank">
                        <img src='../image/2022-04-26 (5).png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">Shoes</p>
                        <address>
                            <h2>100₪</h2>>
                        </address>
                    </div>
                </div>

                <div>
                    <a href="acce.php" target="_blank">
                        <img src='../image/2022-04-26 (6).png' alt="Property 1" />
                    </a>
                    <div class="property-details">
                        <p class="price">Accessories</p>
                        <address>
                            <h2> 50₪</h2>
                        </address>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <section id="the-best">
        <div class="flex container">
            <img src='../image/89af29c8a50c01bc9193a6b0b4cb7724.jpg' alt="Property 1" />
            <div>
                <h2>About Us</h2>
                <p class="large-paragraph"> To Make Your Girl Special </p>
                <p> Welcome to our website, online store market selling kid girls needs.
                    Little Princess it’s a online store that offers different types of categories for kid girls. <br>
                    you can shop and view our categories any time  <br>
                    we can delivered your order where you want <br>
                    we are excited to help you to get every thing for your girl and </p>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <h2>Services</h2>
            <div class="flex">
                <div>
                    <div class="fas fa-desktop"></div>
                    <div class="services-card-right">
                        <h3>Easy to Browse </h3>
                        <p> </p>
                    </div>
                </div>
                <div>
                    <div class="fas fa-clock"></div>
                    <div class="services-card-right">
                        <h3>Open 7 Days</h3>
                        <p>the first and the only online market in Palestine . </p>
                    </div>
                </div>
                <div>
                    <div class="fas fa-shipping-fast"></div>
                    <div class="services-card-right">
                        <h3>Delivery Areas</h3>
                        <p>We deliver to any where you want in few days or weeks.</p>
                    </div>
                </div>
                <div>
                    <div class="fas fa-mobile-alt"></div>
                    <div class="services-card-right">
                        <h3>Shop from Screen </h3>
                        <p>You Can prepare yourself for wedding from your home .</p>
                    </div>
                </div>
                <div>
                    <div class="fas fa-search"></div>
                    <div class="services-card-right">
                        <h3>Find Your needs </h3>
                        <p>Our Categories are International and recent models.</p>
                    </div>
                </div>
                <div>
                    <div class="fas fa-dollar-sign"></div>
                    <div class="services-card-right">
                        <h3>Price Guarantee</h3>
                        <p>The price you see on the screen is the price you pay on your invoice.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="flex">
                <div id="form-container">
                    <h3>Contact Form</h3>
                    <form action="https://formspree.io/f/xqkweeng" method="post" id="my-form">
                        <label for="name">Name</label>
                        <input type="text" id="Name" name="Name" placeholder="Write your name here.." required/>

                        <label for="email">Email</label>
                        <input type="email" id="Email" name="Email" placeholder="Write your email here.." required/>

                        <label for="subject">Subject</label>
                        <input type="text" id="Subject" name="Subject" placeholder="Write the subject here.." required/>

                        <label for="message">Message</label>
                        <textarea id="Message" name="Message" placeholder="Write your message here.." required></textarea>

                        <button type="submit" id="my-form-button" class="rounded">Send Message</button>
                        <p id="my-form-status"></p>
                    </form>
                </div>
                <script src="../JS/JS.js"></script>
                <div id="address-container">
                    <label>Address</label>
                    <address>
                        Palestine - Jerusalem
                    </address>
                    <label>Phone</label>
                    <a href="#">09-2512342</a>
                    <label>Email Address</label>
                    <a href="#">litprenc501@gmail.com</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="flex container">
            <div class="footer-quick-links" >
                <h5>Little Princess</h5>
                <ul>
                    <li><a href="../PHP/Dress.php">Dress</a></li>
                    <li><a href="../PHP/Jeans.php">Jeans</a></li>
                    <li><a href="../PHP/T-shirt.php">T-shirt</a></li>
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