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

		if (isset($_COOKIE["Id"])) {
			$currentUserID = $_COOKIE["Id"];
		} else {
			$currentUserID = -1;
		}
		?>

		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.php"><img src="img/logo2.png" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">

						<li class="menu-active"><a href="index.php">Anasayfa</a></li>

						<?php
						include 'php/user.php';

						if (isset($_COOKIE["Id"])) {
							$currentUserID = $_COOKIE["Id"];
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
									<li><a href="blog_ekle.php">Blog Ekle</a></li>

									<?php
									include 'php/connection.php';
									$currentUserTip = $con->query("SELECT kullanici.tip FROM `kullanici` WHERE kullanici.kullanici_id = '$currentUserID'");
									$result = $currentUserTip->fetch_assoc();
									$result = $result['tip'];

									if ($result == "A") {
									?>
										<li><a href="admin.php">Admin Dashboard</a></li>
									<?php
									}
									?>

									<li><a href="php/cikis.php">Çıkış Yap</a></li>
								</ul>
							</li>
						<?php
						}
						?>
						</a></li>
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
					<h1>
						Bloglar
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start blog Area -->
	<section class="blog-area section-gap" id="blog">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">Kahve Bağımlılarının Bilgi ve Deneyimleri</h1>

					</div>
				</div>
			</div>
			<div class="row">

				<?php

				include 'php/connection.php';
				$db = $con->query("select COUNT(blog_id) from `bloglar`");
				$sonuc = $db->fetch_assoc();
				$toplamBlog = $sonuc['COUNT(blog_id)'];

				?>

				<?php
				for ($i = 1; $i <= $toplamBlog; $i++) {
				?>

					<?php
					include 'php/connection.php';
					$db = $con->query("select * from `bloglar` where bloglar.blog_id = $i");

					if ($db->num_rows == 0) {
						$toplamBlog = $toplamBlog + 1;
						continue;
					}

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

					<div class="col-lg-6 col-md-6 single-blog">
						<img class="img-fluid" style="width: 510px; height: 300px;" <?php if ($blogresim == "b1.jpg" || $blogresim == "b2.jpg") { ?> src="img/<?php echo $blogresim ?>" <?php } else { ?> src="<?php echo $blogresim ?>" <?php } ?> alt="">
						<ul class="post-tags">
							<li><a><?php echo $blogyazarAdi ?></a></li>
						</ul>
						<a href="generic_blog.php?blog=<?php echo $i ?>">
							<h4><?php echo $blogbaslik ?></h4>
						</a>

						<p class="post-date">
							<?php echo $blogtarih ?>
						</p>
					</div>

				<?php
				}
				?>

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
							<a href="https://www.linkedin.com/in/muhammet-yasir-%C3%A7olak-9895641a0/" target="_blank"><i class="fa  fa-linkedin-square"></i></a>
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