<!DOCTYPE html>
<html lang="zxx" class="no-js">

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

		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.php?kullanici=<?php echo $currentUserID ?>"><img src="img/logo.png" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="index.php?kullanici=<?php echo $currentUserID ?>">Anasayfa</a></li>
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
						Admin Dashboard
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start review Area -->
	<section class="review-area section-gap" id="review">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">What kind of Coffee we serve for you</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
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
				<div class="col-lg-3 col-md-6 single-counter">
					<h1 class="counter">10536</h1>
					<p>deneme</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End review Area -->

	<!-- Start Generic Area -->
	<section class="about-generic-area section-gap">
		<div class="container border-top-generic">
			<h3 class="about-title mb-30" style="text-align:center">Kullanıcılar</h3>
			<div class="row">

				<div class="col-lg-12 col-md-8">
					<form action="" onsubmit={validation()} method="POST">

						<div class="mt-10">
							<input type="text" id="kullaniciAdi" name="kullaniciAdi" placeholder="Kullanıcı Adı" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kullanıcı Adı'" required class="single-input-primary">
						</div>

						<div class="mt-10">
							<input type="password" id="sifre" name="sifre" placeholder="Şifre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifre'" required class="single-input-primary">
						</div>

						<input type="submit" id="btn" class="genric-btn primary circle" value="Kullanıcı Ekle" />

					</form>
				</div>


				<div class="col-lg-12 col-md-8">

					<hr>

					<div class="row">

						<div class="mt-10 col-lg-5">
							<input type="text" id="kullaniciAdi" name="kullaniciAdi" placeholder="Kullanıcı Adı" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kullanıcı Adı'" required class="single-input-primary" disabled>
						</div>

						<div class="mt-10 col-lg-5">
							<input type="password" id="sifre" name="sifre" placeholder="Şifre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifre'" required class="single-input-primary" disabled>
						</div>


					</div>

					<?php

					include('php/connection.php');
					$totalUser = $con->query("select COUNT(kullanici.kullanici_id) from `kullanici`");
					$sonuc = $totalUser->fetch_assoc();
					$totalUser = $sonuc['COUNT(kullanici.kullanici_id)'];

					?>

					<?php

					for ($i = 0; $i < $totalUser; $i++) {
					?>

						<?php

						include 'php/connection.php';
						$db = $con->query("select * from `kullanici` where kullanici.kullanici_id =  $i");
						$sonuc = $db->fetch_assoc();

						if ($db->num_rows == 0) {
							$totalUser = $totalUser + 1;
							continue;
						}

						$kullaniciAdi = $sonuc['kullanici_adi'];
						$sifre = $sonuc['sifre'];
						?>

						<br>
						<div class="row">

							<div class="mt-10 col-lg-5">
								<input type="text" id="kullaniciAdi" name="kullaniciAdi" placeholder="<?php echo $kullaniciAdi ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $kullaniciAdi ?>'" required class="single-input-primary" value="<?php echo $kullaniciAdi ?>" disabled>
							</div>

							<div class="mt-10 col-lg-5">
								<input type="text" id="sifre" name="sifre" placeholder="<?php echo $sifre ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $sifre ?>'" required class="single-input-primary" value="<?php echo $sifre ?>" disabled>
							</div>

							<input type="submit" id="btn" class="genric-btn primary circle" value="X" />



						</div>



					<?php } ?>




					<br><br><br><br><br>
					<?php
					$totalUser = $con->query("select COUNT(kullanici.kullanici_id) from `kullanici`");
					$sonuc = $totalUser->fetch_assoc();
					$totalUser = $sonuc['COUNT(kullanici.kullanici_id)'];
					?>
					<h3>Toplam Kullanıcı : <?php echo $totalUser ?></h3>
					<br><br><br><br><br>


				</div>




				<h1>kullanıcı tablosu !</h1>
			</div>
		</div>
	</section>
	<!-- End Generic Start -->

	<section class="about-generic-area section-gap">
		<div class="container border-top-generic">
			<h3 class="about-title mb-30" style="text-align:center">Yorumlar</h3>
			<div class="row">


			</div>
		</div>
	</section>
	<!-- End Generic Start -->

	<section class="about-generic-area section-gap">
		<div class="container border-top-generic">
			<h3 class="about-title mb-30" style="text-align:center">Bloglar</h3>
			<div class="row">


			</div>
		</div>
	</section>
	<!-- End Generic Start -->


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

	<script>
		function validation() {
			var id = document.f1.user.value;
			var ps = document.f1.pass.value;
			if (id.length == "" && ps.length == "") {
				alert("User Name and Password fields are empty");
				return false;
			} else {
				if (id.length == "") {
					alert("User Name is empty");
					return false;
				}
				if (ps.length == "") {
					alert("Password field is empty");
					return false;
				}
			}
		}
	</script>

</body>

</html>