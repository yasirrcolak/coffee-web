<!DOCTYPE html>
<html lang="tr" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo2.png">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
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

        if (isset($_COOKIE["Id"])) {
            $currentUserID = $_COOKIE["Id"];
        } else {
            $currentUserID = -1;
        }
        ?>

        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php?kullanici=<?php echo $currentUserID ?>"><img src="img/logo2.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">

                        <li class="menu-active"><a href="index.php?kullanici=<?php echo $currentUserID ?>">Anasayfa</a></li>
                        <li class="menu-active"><a href="bloglar.php?kullanici=<?php echo $currentUserID ?>">Bloglar</a></li>

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

                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <section class="banner-area" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content col-lg-7">
                    <br><br><br><br><br><br><br><br> <br><br><br>
                    <h1>
                        Blog Ekle
                    </h1>

                    <?php
                    include 'php/connection.php';
                    $currentUserName = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$currentUserID'");
                    $result = $currentUserName->fetch_assoc();
                    $result = $result['kullanici_adi'];
                    ?>

                    <div class="col-lg-12 col-md-8">
                        <br>

                        <form action="php/blogEkle.php" method="POST">

                            <h3 style="color:white;">Yazar : </h3>

                            <div class="mt-10">
                                <input type="text" id="blogYazarName" name="blogYazarName" placeholder=" <?php echo $result ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $result ?>'" required class="single-input-primary" value="<?php echo $result ?>">
                            </div>

                            <br>

                            <div class="mt-10">
                                <input type="text" id="blogResim" name="blogResim" placeholder="Blog Resim URL" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Blog Resim URL'" required class="single-input-primary">
                            </div>

                            <br>

                            <div class="switch-wrap d-flex justify-content-between">
                                <p style="color:white">Varsayılan blog resmini kullan.</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="primary-switch" onchange="onChangeHandler()">
                                    <label for="primary-switch"></label>
                                </div>
                            </div>

                            <br>

                            <div class="mt-10">
                                <input type="text" id="blogBaslik" name="blogBaslik" placeholder="Blog Başlık" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Blog Başlık'" required class="single-input-primary">
                            </div>

                            <div class="mt-10">
                                <textarea name="blogIcerik" class="single-textarea" placeholder="Blog İçerik Metni" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Blog İçerik Metni'" required></textarea>
                            </div>

                            <hr>

                            <input type="submit" id="btn" class="genric-btn primary circle" value="Blog Ekle" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End banner Area -->

    <!-- About Generic Start -->
    <div class="main-wrapper">

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

        <script>
            function validation() {

                document.getElementById("blogYazarName").disabled = false;

                if (document.getElementById("blogBaslik").value.length == 0) {
                    alert("Blog başlık bilgisi boş olamaz !!");
                    return false;
                }

                if (document.getElementById("blogIcerik").value.length == 0) {
                    alert("Blog içerik bilgisi boş olamaz !!");
                    return false;
                }

            }

            function onChangeHandler() {
                var checkboxStatus = document.getElementById("primary-switch").checked;
                if (checkboxStatus == true) {
                    document.getElementById("blogResim").value = "Varsayılan blog resmi...";
                } else {
                    document.getElementById("blogResim").value = "";
                    document.getElementById("blogResim").disabled = false;

                }
            }
        </script>



</body>

</html>