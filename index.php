	<!DOCTYPE html>
	<html lang="tr" class="no-js">

	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
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
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
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

			<div class="header-top">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">

						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="index.php?kullanici=<?php echo $currentUserID ?>"><img src="img/logo2.png" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">

							<?php
							include 'php/user.php';

							if (isset($_GET['kullanici'])) {
								$currentUserID = $_GET["kullanici"];
							} else {
								$currentUserID = -1;
							}

							?>

							<li class="menu-active"><a href="index.php?kullanici=<?php echo $currentUserID ?>">Anasayfa</a></li>
							<li><a href="#about">Hakkında</a></li>
							<li><a href="#review">Önizleme</a></li>
							<li><a href="#blog">Bloglar</a></li>



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


		<!-- start banner Area -->
		<section class="banner-area" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-start">
					<div class="banner-content col-lg-7">
						<h6 class="text-white text-uppercase">Şimdi enerjiyi hissedebilirsin</h6>
						<h1>
							Her güne <br>
							bir kahve <br> ile başlayanlar
						</h1>
					</div>
				</div>
			</div>
		</section>
		<!-- End banner Area -->

		<!-- Start video-sec Area -->
		<section class="video-sec-area pb-100 pt-40" id="about">
			<div class="container">
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
						<div class="overlay overlay-bg"></div>
						<a class="play-btn" href="https://www.youtube.com/watch?v=kUmQBw1C0dc"><img class="img-fluid" src="img/play-icon.png" alt=""></a>
					</div>
					<div class="col-lg-6 video-left">
						<h6>Kahve bir hayat tarzıdır. </h6>
						<h1>Kahve Bağımlıları</h1>
						<p><span>Kahve hakkında söyleyeceklerinizi dinlemek ve dinletmek için buradayız.</span></p>
						<p>
                        Kahve bağımlılarının kahve ile ilgili söyleyecekleri her
						şeyi yazıya dökerek kalıcı hale getirebildiği diğer bloglara 
						yorumlar atıp yıldız verebildiği forum sitesi. 
						</p>
					
					</div>
				</div>
			</div>
		</section>
		<!-- End video-sec Area -->



		<!-- Start gallery Area -->
		<section class="gallery-area section-gap" id="gallery">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
							<h1 class="mb-10">Her an her yerde kahve</h1>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<a href="img/g1.jpg" class="img-pop-home">
							<img class="img-fluid" src="img/g1.jpg" alt="">
						</a>
						<a href="img/g2.jpg" class="img-pop-home">
							<img class="img-fluid" src="img/g2.jpg" alt="">
						</a>
					</div>
					<div class="col-lg-8">
						<a href="img/g3.jpg" class="img-pop-home">
							<img class="img-fluid" src="img/g3.jpg" alt="">
						</a>
						<div class="row">
							<div class="col-lg-6">
								<a href="img/g4.jpg" class="img-pop-home">
									<img class="img-fluid" src="img/g4.jpg" alt="">
								</a>
							</div>
							<div class="col-lg-6">
								<a href="img/g5.jpg" class="img-pop-home">
									<img class="img-fluid" src="img/g5.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End gallery Area -->

		<!-- Start review Area -->
		<section class="review-area section-gap" id="review">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
							<h1 class="mb-10">Sitemiz ile ilgili</h1>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 single-review">

						<div class="title d-flex flex-row">
							<h4>Beyza</h4>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
						</div>
						<p>
							Çook güzel bir web sitesi.
						</p>
					</div>
					<div class="col-lg-6 col-md-6 single-review">

						<div class="title d-flex flex-row">
							<h4>Yasir</h4>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
						</div>
						<p>
							Mükemmel bir site olmuş elimize sağlık.
						</p>
					</div>
				</div>
				<div class="row counter-row">

					<?php
					include 'php/connection.php';
					$db = $con->query("select COUNT(kullanici_id) from `kullanici`");
					$sonuc = $db->fetch_assoc();
					$toplamKullanici = $sonuc['COUNT(kullanici_id)'];
					?>

					<div class="col-lg-3 col-md-6 single-counter">
						<h1 class="counter"><?php echo $toplamKullanici ?></h1>
						<p>Toplam Kullanıcı</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("select COUNT(blog_id) from `bloglar`");
					$sonuc = $db->fetch_assoc();
					$toplamBlog = $sonuc['COUNT(blog_id)'];
					?>

					<div class="col-lg-3 col-md-6 single-counter">
						<h1 class="counter"><?php echo $toplamBlog ?></h1>
						<p>Toplam Blog Yazısı</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("select COUNT(yorum_id) from `yorum`");
					$sonuc = $db->fetch_assoc();
					$toplamYorum = $sonuc['COUNT(yorum_id)'];
					?>

					<div class="col-lg-3 col-md-6 single-counter">
						<h1 class="counter"><?php echo $toplamYorum ?></h1>
						<p>Toplam Yorum</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("SELECT SUM(yorum.yildiz) FROM `yorum`");
					$sonuc = $db->fetch_assoc();
					$toplamYildiz = $sonuc['SUM(yorum.yildiz)'];
					?>

					<div class="col-lg-3 col-md-6 single-counter">
						<h1 class="counter"><?php echo $toplamYildiz ?></h1>
						<p>Toplam Yıldız</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End review Area -->

		<!-- Start blog Area -->
		<section class="blog-area section-gap" id="blog">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
							<h1 class="mb-10">Bloglar</h1>
							<p>Kahve Bağımlıları Tarafından Paylaşılan Kahve Hakkında Bilgi ve Deneyimler</p>
						</div>
					</div>
				</div>
				<div class="row">

					<?php
					include 'php/connection.php';
					$db = $con->query("select * from `bloglar` where bloglar.blog_id = 1");
					$sonuc = $db->fetch_assoc();
					$blog1resim = $sonuc['resim'];
					$blog1baslik = $sonuc['baslik'];
					$blog1icerik = $sonuc['icerik'];
					$blog1yazarID = $sonuc['kullanici_id'];
					$blog1tarih = $sonuc['tarihSaat'];

					$db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$blog1yazarID'");
					$sonuc = $db->fetch_assoc();
					$blog1yazarAdi = $sonuc['kullanici_adi'];

					?>

					<div class="col-lg-6 col-md-6 single-blog">
						<img class="img-fluid" src="img/<?php echo $blog1resim ?>" alt="">
						<ul class="post-tags">
							<li><a><?php echo $blog1yazarAdi ?></a></li>
						</ul>
						<a href="generic_blog.php?blog=1&kullanici=<?php echo $currentUserID ?>">
							<h4><?php echo $blog1baslik ?></h4>
						</a>

						<p class="post-date">
							<?php echo $blog1tarih ?>
						</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("select * from `bloglar` where bloglar.blog_id = 2");
					$sonuc = $db->fetch_assoc();
					$blog2resim = $sonuc['resim'];
					$blog2baslik = $sonuc['baslik'];
					$blog2icerik = $sonuc['icerik'];
					$blog2yazarID = $sonuc['kullanici_id'];
					$blog2tarih = $sonuc['tarihSaat'];

					$db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$blog2yazarID'");
					$sonuc = $db->fetch_assoc();
					$blog2yazarAdi = $sonuc['kullanici_adi'];

					?>

					<div class="col-lg-6 col-md-6 single-blog">
						<img class="img-fluid"style="width: 510px; height: 300px;" src="<?php echo $blog2resim ?>" alt="">
						<ul class="post-tags">
							<li><a><?php echo $blog2yazarAdi ?></a></li>
						</ul>
						<a href="generic_blog.php?blog=2&kullanici=<?php echo $currentUserID ?>">
							<h4><?php echo $blog2baslik ?></h4>
						</a>

						<p class="post-date">
							<?php echo $blog2tarih ?>
						</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("select * from `bloglar` where bloglar.blog_id = 3");
					$sonuc = $db->fetch_assoc();
					$blog3resim = $sonuc['resim'];
					$blog3baslik = $sonuc['baslik'];
					$blog3icerik = $sonuc['icerik'];
					$blog3yazarID = $sonuc['kullanici_id'];
					$blog3tarih = $sonuc['tarihSaat'];

					$db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$blog3yazarID'");
					$sonuc = $db->fetch_assoc();
					$blog3yazarAdi = $sonuc['kullanici_adi'];

					?>

					<div class="col-lg-6 col-md-6 single-blog">
						<img class="img-fluid"style="width: 510px; height: 300px;" src="<?php echo $blog3resim ?>" alt="">
						<ul class="post-tags">
							<li><a><?php echo $blog3yazarAdi ?></a></li>
						</ul>
						<a href="generic_blog.php?blog=3&kullanici=<?php echo $currentUserID ?>">
							<h4><?php echo $blog3baslik ?></h4>
						</a>

						<p class="post-date">
							<?php echo $blog2tarih ?>
						</p>
					</div>

					<?php
					include 'php/connection.php';
					$db = $con->query("select * from `bloglar` where bloglar.blog_id = 4");
					$sonuc = $db->fetch_assoc();
					$blog4resim = $sonuc['resim'];
					$blog4baslik = $sonuc['baslik'];
					$blog4icerik = $sonuc['icerik'];
					$blog4yazarID = $sonuc['kullanici_id'];
					$blog4tarih = $sonuc['tarihSaat'];

					$db = $con->query("SELECT kullanici.kullanici_adi FROM `kullanici` WHERE kullanici.kullanici_id = '$blog4yazarID'");
					$sonuc = $db->fetch_assoc();
					$blog4yazarAdi = $sonuc['kullanici_adi'];

					?>

					<div class="col-lg-6 col-md-6 single-blog">
						<img class="img-fluid"style="width: 510px; height: 300px;" src="<?php echo $blog4resim ?>" alt="">
						<ul class="post-tags">
							<li><a><?php echo $blog4yazarAdi ?></a></li>
						</ul>
						<a href="generic_blog.php?blog=4&kullanici=<?php echo $currentUserID ?>">
							<h4><?php echo $blog4baslik ?></h4>
						</a>

						<p class="post-date">
							<?php echo $blog2tarih ?>
						</p>
					</div>

					<div>
						<br><br>
						<a href="bloglar.php?kullanici=<?php echo $currentUserID ?>" class="genric-btn primary circle">Tüm Bloglar</a>


					</div>

				</div>
			</div>
		</section>
		<!-- End blog Area -->


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
		<script src="js/waypoints.min.js"></script>
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>