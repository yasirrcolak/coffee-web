<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Coffee</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <header id="header" id="home">

        <?php
        include 'php/user.php';

        if (isset($_GET['kullanici'])) {
            $currentUserID = $_GET["kullanici"];
        } else {
            $currentUserID = -1;
        }

        ?>

        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php?kullanici=<?php echo $currentUserID ?>"><img src="img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">

                        <li class="menu-active"><a href="index.php?kullanici=<?php echo $currentUserID ?>">Anasayfa</a></li>
                        <li class="menu-active"><a href="bloglar.php?kullanici=<?php echo $currentUserID ?>">Bloglar</a></li>

                        <?php
                        include 'php/user.php';

                        if (isset($_GET['kullanici'])) {
                            $currentUserID = $_GET["kullanici"];
                        } else {
                            $currentUserID = -1;
                        }

                        if ($currentUserID == -1) {
                        ?>
                            <li><a href="signup.html">Kayıt Ol</a></li>
                            <li><a href="login.html">Giriş Yap</a></li>
                        <?php
                        } else {
                        ?>
                            <?php
                            include 'php/connection.php';
                            $currentUserName = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$currentUserID'");
                            $result = $currentUserName->fetch_assoc();
                            $result = $result['kullanici_adi'];
                            ?>
                            <li><a href="#"><?php echo $result ?></a>
                                <ul>
                                    <li><a href="blog_ekle.php?kullanici=<?php echo $currentUserID ?>">Blog Ekle</a></li>

                                    <?php
                                    include 'php/connection.php';
                                    $currentUserTip = $con->query("SELECT kullanici.tip FROM `kullanici` WHERE kullanici.kullanici_id = '$currentUserID'");
                                    $result = $currentUserTip->fetch_assoc();
                                    $result = $result['tip'];

                                    if ($result == "A") {
                                    ?>
                                        <li><a href="admin.php?kullanici=<?php echo $currentUserID ?>">Admin Dashboard</a></li>
                                    <?php
                                    }
                                    ?>

                                    <li><a href="index.php">Çıkış Yap</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>






                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <?php

    if (isset($_GET['blog'])) {
        $currentBlogID = $_GET["blog"];

        include 'php/connection.php';
        $db = $con->query("select * from `bloglar` where bloglar.blog_id = $currentBlogID");
        $sonuc = $db->fetch_assoc();
        $blogresim = $sonuc['resim'];
        $blogbaslik = $sonuc['baslik'];
        $blogicerik = $sonuc['icerik'];
        $blogyazarID = $sonuc['kullanici_id'];
        $blogtarih = $sonuc['tarihSaat'];

        $db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$blogyazarID'");
        $sonuc = $db->fetch_assoc();
        $blogyazarAdi = $sonuc['kullanici_adi'];

    ?>

        <section class="generic-banner relative">
            <div class="container">
                <div class="row height align-items-center justify-content-center">
                    <div class="col-lg-10">
                        <div class="generic-banner-content">

                            <h2 class="text-white"><?php echo $blogbaslik ?></h2>
                            <p class="text-white"><?php echo $blogyazarAdi ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->

        <!-- About Generic Start -->
        <div class="main-wrapper">

            <!-- Start Generic Area -->
            <section class="about-generic-area section-gap">
                <div class="container border-top-generic">
                    <h3 class="about-title mb-30"><?php echo $blogtarih ?></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="img-text">
                                <img src="img/a.jpg" alt="" class="img-fluid float-left mr-20 mb-20">
                                <p><?php echo $blogicerik ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Generic Start -->

            <!-- Start yorum Area -->
            <section class="menu-area section-gap" id="coffee">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-60 col-lg-10">
                            <div class="title text-center">
                                <h1 class="mb-10">Yorumlar ve Değerlendirmeler</h1>
                                <p>Diğer kullanıcılar bu blog yazısı hakkında ne düşünüyor?</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <?php


                        include 'php/connection.php';
                        $db = $con->query("select COUNT(yorum_id) from `yorum` where yorum.blog_id ='$currentBlogID'");
                        $sonuc = $db->fetch_assoc();
                        $toplamYorum = $sonuc['COUNT(yorum_id)'];

                        ?>

                        <?php

                        if ($toplamYorum == 0) {
                        ?>
                            <p style="text-align: center;">Henüz hiç yorum yok.</p>

                            <?php


                        } else {

                            for ($i = 1; $i <= $toplamYorum; $i++) {
                            ?>

                                <?php
                                include 'php/connection.php';
                                $db = $con->query("select * from `yorum` where yorum.yorum_id =  $i");
                                $sonuc = $db->fetch_assoc();
                                $yorumYazarID = $sonuc['kullanici_id'];
                                $yorumMesaj = $sonuc['mesaj'];
                                $yorumYildiz = $sonuc['yildiz'];

                                $db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$yorumYazarID'");
                                $sonuc = $db->fetch_assoc();
                                $yorumYazarAdi = $sonuc['kullanici_adi'];
                                ?>

                                <div class="col-lg-12">
                                    <div class="single-menu">
                                        <div class="title-div justify-content-between d-flex">
                                            <h4><?php echo $yorumYazarAdi ?></h4>
                                            <p class="price float-right">
                                                <i class="fa fa-star" aria-hidden="true"></i> <?php echo $yorumYildiz ?>
                                            </p>
                                        </div>
                                        <p>
                                            <?php echo $yorumMesaj ?>
                                        </p>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>

                    <hr>

                    <?php

                    include 'php/user.php';

                    if (isset($_GET['kullanici'])) {
                        $currentUserID = $_GET["kullanici"];
                    } else {
                        $currentUserID = -1;
                    }

                    if ($currentUserID == -1) {

                    ?>
                        <p style="text-align:center">Yorum eklemek için <a href="signup.html">Kayıt Ol</a> ya da <a href="login.html">Giriş Yap</a></p>
                    <?php
                    } else {
                    ?>

                        <form action="" onsubmit={validation()} method="POST">

                            <div class="mt-10">
                                <input type="text" id="yorum" name="yorum" placeholder="Yorum ekleyin..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yorum ekleyin...'" required class="single-input-primary">
                            </div>

                            <br>

                            <input type="submit" id="btn" class="genric-btn primary circle" value="Yorum Yap" />

                        </form>

                    <?php
                    }
                    ?>

                    <script>
                        function validation() {
                            var id = document.f1.user.value;
                            if (id.length == "") {
                                alert("Lütfen bir yorum metni giriniz.");
                                return false;
                            }
                        }
                    </script>

                </div>
            </section>
            <!-- End yorum Area -->

            <!-- start footer Area -->
            <footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>About Us</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                                </p>
                                <p class="footer-text">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>Newsletter</h6>
                                <p>Stay update with our latest</p>
                                <div class="" id="mc_embed_signup">
                                    <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                        <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                        <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>

                                        <div class="info pt-20"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                            <div class="single-footer-widget">
                                <h6>Follow Us</h6>
                                <p>Let us be social</p>
                                <div class="footer-social d-flex align-items-center">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->

        <?php

    } else {
        ?>
            <section class="generic-banner relative">
                <div class="container">
                    <div class="row height align-items-center justify-content-center">
                        <div class="col-lg-10">
                            <div class="generic-banner-content">

                                <h2 class="text-white">Uupps!</h2>
                                <p class="text-white">Bi şey oldu :(</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php
    }




        ?>



        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="js/easing.min.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/parallax.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/main.js"></script>
</body>

</html>