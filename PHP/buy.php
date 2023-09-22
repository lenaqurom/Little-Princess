<?php
if(isset($_POST['flowerType'])){
    $string=explode(' ',$_POST['flowerType']);
    $dbTable=$string[1];
    $imgId=$string[0];
    try{

        $db= new mysqli('localhost', 'root', '','special' );
        $qryStr= "select * from $dbTable WHERE ID = $imgId";
        $res= $db->query($qryStr);
        $url="";
        $name="";
        $price="";
        $row=$res->fetch_assoc();
    }
    catch (Exception $e){

    }
}
try {
    $dbb = mysqli_connect('localhost', 'root', '', 'special');
    $qry = "select * from members ";
    $ress = $dbb->query($qry);
    $no=0;
    $yes=0;
    for($i=0;$i<$ress->num_rows;$i++) {
        $roww = $ress->fetch_object();
        if($roww->flag ==0 and $roww->UserLevel == 1){
            $yes=1;
            $emaill = $roww->Email;
        }
        else if($roww->flag ==0 and $roww->UserLevel == 0){
            $no=0;
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
    <title>Little Princess | Buy</title>
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

    <link href="../CSS/buy.css" type="text/css" rel="Stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>

        #hero {
            background-color: #fece00;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            height: 65%;
            width: 100%;
        }

    </style>


    <style>
        #myImg {
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 2; /* Sit on top */
            padding-top: 200px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */

        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 25%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ffffff;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {transform: scale(0.1)}
            to {transform: scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 150px;
            right: 530px;
            color: #8b8d78;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #d9c6ae;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>


</head>

<body >
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
    </div>

    <section id="hero"></section>


    <section id="flower">
        <div class="coner">
            <div class="card">

                <!--                <div class="shoeBackground" style="background: url('img/we.png') center center no-repeat;">-->

                <div class="shoeBackground">

                    <img  src="<?php  echo $row['URL']?>" id="myImg"
                         alt="<?php echo $row['name']?>" width="100%" height="100%">
                </div> <!--هون كود الصورة-->

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');

                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById('myImg');
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                    }

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>


                <div class="info">
                    <div class="shoeName">
                        <div>
                            <h1 class="big"><?php  echo $row['name']?></h1>
                        </div>
                    </div>

                    <div class="description">
                        <h3 class="title">Order  Info</h3>
                        <!--                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>-->
                    </div>

                    <form action="check.php" method="post">
                        <div class="size-coner">
                            <h3 class="title">Quantity : <span id="demo"></span></h3>

                            <div class="slidecontainer">
                                <input  name="slide" type="range" min="1" max="50" value="1" class="slider" id="myRange">

                            </div>

                            <script>
                                var slider = document.getElementById("myRange");
                                var output = document.getElementById("demo");
                                output.innerHTML = slider.value;

                                slider.oninput = function() {
                                    output.innerHTML = this.value;
                                }
                            </script>
                        </div>


                        <div class="buy-price">

                            <button class="buy" name="cart" value="<?php echo $row['name'].'!'.$row['URL'].'!'.$row['price'].'!'.$emaill?>"><i class="fas fa-shopping-cart"></i>Add to cart</button>

                            <div class="price">
                                <h1><?php echo $row['price']?>₪</h1>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="flex container">
            <div class="footer-quick-links" >
                <h5>Special Moment</h5>
                <ul>
                    <li><a href="../PHP/Dress.php">Dress</a></li>
                    <li><a href="Jeans.php">Flowers</a></li>
                    <li><a href="T-shirt.php">Rings</a></li>
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
        <small style="color:  #d9c6ae ">
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