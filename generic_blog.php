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
                            <p style="text-transform:uppercase" class="text-white"><?php echo $blogyazarAdi ?></p>
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
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="img-text">
                                <img src="img/a.jpg" alt="" class="img-fluid float-left mr-20 mb-20">
                                <p><?php echo $blogicerik ?></p>
                            </div>
                        </div>
                    </div>
                    <h3 class="about-title mb-30">Zaman: <?php echo $blogtarih ?></h3>
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
                        $db = $con->query("select COUNT(yorum.yorum_id) from `yorum` where yorum.blog_id=$currentBlogID");
                        $sonuc = $db->fetch_assoc();
                        $toplamYorum = $sonuc['COUNT(yorum.yorum_id)'];

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
                                $db = $con->query("select * from `yorum` where yorum.yorum_id=  $i");
                                $sonuc = $db->fetch_assoc();

                                if($db->num_rows == 0){
                                    $toplamYorum++;

                                    continue;
                                }

                                if($sonuc['blog_id'] == $currentBlogID){


                                    $yorumYazarID = $sonuc['kullanici_id'];
                                    $yorumMesaj = $sonuc['mesaj'];
                                    $yorumYildiz = $sonuc['yildiz'];
    
                                    $db = $con->query("select kullanici.kullanici_adi from `kullanici` where kullanici.kullanici_id = '$yorumYazarID'");
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
                                else{
                                    $toplamYorum++;


                                }
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

                        <form action="php/yorumEkle.php" onsubmit={validation()} method="POST">

                            <div class="mt-10">
                                <input type="text" id="yorum" name="yorum" placeholder="Yorum ekleyin..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yorum ekleyin...'" required class="single-input-primary">
                            </div>

                            <br>
                            <h5 class="mb-30">Yıldız</h5>
                            <div class="default-select" id="default-select">
                                <select name="yildiz">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>


                            <input type="hidden" name="kullaniciID" value="<?php echo $currentUserID ?>">
                            <input type="hidden" name="blogID" value="<?php echo $currentBlogID ?>">


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

					<div class="col-lg-2 col-md-12 col-sm-12 social-widget">
						<div class="single-footer-widget">
							<h6>Bizi takip edin</h6>
							<p>Sosyal medya hesaplarımız</p>
							<div class="footer-social d-flex align-items-center">
								<a href="https://www.linkedin.com/in/beyza-küçük-159007221" target="_blank"><i class="fa  fa-linkedin-square"></i></a>
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