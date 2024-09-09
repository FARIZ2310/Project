<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Balitbang Bappeda Banjarbaru Kalimantan Selatan">

	<!-- title -->
	<title>Sistem Informasi, Riset & Inovasi Daerah</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="https://bappeda.banjarbarukota.go.id/media/2023/01/cropped-Logo-Kota-Banjarbaru-3-32x32.webp">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/css/responsive.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">

</head>

<body>

	<!--PreLoader-->
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="<?= base_url() ?>/assets/landing/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<?= $this->include('Landing/layout/navigation') ?>
						<a style="display: none;" class="mobile-show search-bar-icon" href="#"><i style="display: none;" class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<?= $this->renderSection('content') ?>

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="footer-box about-widget">
						<h2 class="widget-title">BAPPEDA Banjarbaru</h2>
						<p>Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah adalah unsur pelaksana urusan pemerintahan di bidang Penunjang Perencanaaan, Penunjang Penelitian dan Pengembangan pada Pemerintah Kota Banjarbaru.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Alamat dan Kontak</h2>
						<ul>
							<li>Jl. Pangeran Suriansyah No.16, Kel. Komet, Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70711.</li>
							<li>Telp. +62 511 4789937</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2023 - BAPPEDA Kota Banjarbaru
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://www.facebook.com/bappedabjb.juara/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/Bappedabjbid" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/bappedabjb_juara/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/@bappedabanjarbaru3833" target="_blank"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://goo.gl/maps/gQMafLFJZf86GFfg6" target="_blank"><i class="fas fa-map-marker"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="<?= base_url() ?>/assets/landing/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= base_url() ?>/assets/landing/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?= base_url() ?>/assets/landing/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?= base_url() ?>/assets/landing/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?= base_url() ?>/assets/landing/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?= base_url() ?>/assets/landing/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?= base_url() ?>/assets/landing/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?= base_url() ?>/assets/landing/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?= base_url() ?>/assets/landing/js/sticker.js"></script>
	<!-- main js -->
	<script src="<?= base_url() ?>/assets/landing/js/main.js"></script>
	<script src="<?= base_url() ?>/assets/dashboard/vendor/libs/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

	<?= $this->renderSection('js') ?>

</body>

</html>