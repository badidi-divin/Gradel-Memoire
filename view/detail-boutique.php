<?php 
	session_start();
	require_once('../bdd/connexion.php');
	require_once('../model/select-boutique.php');
 ?>
<!DOCTYPE html>
<html>
<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Le Prof- Devenir Génie n'est pas sorcier</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<!-- Slick Slider css -->
		<link rel="stylesheet" type="text/css" href="src/plugins/slick/slick.css" />
		<!-- bootstrap-touchspin css -->
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<?php if (!$_SESSION['photo']=='') {
									?>
									<img src="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>" alt="" width="400px"  height="400px"/> 
									<?php	
								} ?>
							</span>
							<span class="user-name"><?php echo $_SESSION['pseudo'] ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="faq.php"
								><i class="dw dw-help"></i> Aide</a
							>
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Se Déconecter</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php  require_once('theme.php');

		?>

		<?php require_once('menu-sidebar.php'); ?>

		<div class="mobile-menu-overlay"></div>


		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Bienvenue dans la boutique de <?= $userinfo['nom_boutique']; ?> </h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item active" aria-current="page">
											Bienvenue dans ma boutique
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="product-wrap">
						<div class="product-detail-wrap mb-30">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="product-slider slider-arrow">
										<div class="product-slide">
											<img src="../includes/boutique/<?= $userinfo['image_boutique'] ?>" alt="" />
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="product-detail-desc pd-20 card-box height-100-p">
										<h4 class="mb-20 pt-20"><?= $userinfo['nom_boutique']; ?> <a href="publier-boutique.php?id=<?= $_GET['id']; ?>" class="btn btn-outline-success">Publier un produit ou service</a></h4>
										<p>
											<?= $userinfo['description']; ?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-20">Liste des Produits ou Services en vente</h4>
						<div class="product-list">
							<ul class="row">
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="product-box">
										<div class="producct-img">
											<img src="vendors/images/product-img1.jpg" alt="" />
										</div>
										<div class="product-caption">
											<h4><a href="#">Gufram Bounce Black</a></h4>
											<div class="price"><del>$55.5</del><ins>$49.5</ins></div>
											<a href="#" class="btn btn-outline-primary">Read More</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php'); ?>	
					>
				</div>
			</div>
		</div>
		<!-- welcome modal start -->

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Slick Slider js -->
		<script src="src/plugins/slick/slick.min.js"></script>
		<!-- bootstrap-touchspin js -->
		<script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script>
			jQuery(document).ready(function () {
				jQuery(".product-slider").slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: true,
					infinite: true,
					speed: 1000,
					fade: true,
					asNavFor: ".product-slider-nav",
				});
				jQuery(".product-slider-nav").slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: ".product-slider",
					dots: false,
					infinite: true,
					arrows: false,
					speed: 1000,
					centerMode: true,
					focusOnSelect: true,
				});
				$("input[name='demo3_22']").TouchSpin({
					initval: 1,
				});
			});
		</script>
	</body>
</html>
