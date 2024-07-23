<?php 
	session_start();
	require_once('securite.php');
	require_once('../bdd/connexion.php');
	require_once('../model/select-tutos-client.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Le Prof - Devenir intelligent, n'est pas sorcier</title>

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
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/plyr/dist/plyr.css"
		/>
	</head>
	
	<body>
			<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input" name="motcle" value="<?php echo ($mc) ?>"
								placeholder="search"
							/>
						</div>
					</form>
				</div>
				&nbsp;&nbsp;<a href="Tutoriels.php?id=Primaire et Sécondaire"  class="btn btn-outline-success">Primaire</a>
				&nbsp;&nbsp;<a href="Tutoriels.php?id=Humanité"  class="btn btn-outline-primary">Humanités</a>
				&nbsp;&nbsp;<a href="Tutoriels.php?id=Professionnelle et universitaire"  class="btn btn-outline-danger">Professionnel</a>
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
			<div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Vidéos Tutoriels</h4>
								</div>
							</div>
						</div>
					</div>
					<?php
						foreach ($tutos as $tutos):
					?>
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4"><?php echo $tutos->nom ?>(<?php echo $tutos->categorie ?>)</h4>
								<p class="font-14 ml-0">
									<?= $tutos->description;  ?> 
								</p>
							</div>
						</div>
						<div class="container">
							<video
								poster="#"
								controls
								crossorigin
							>
								<source
									src="../includes/tutos/<?= $tutos->chemin ?>"
									type="video/mp4"
								/>
								<source
									src="../includes/tutos/<?= $tutos->chemin ?>"
									type="video/webm"
								/>
							</video>
						</div>

						
					<?php
						endforeach; 
					 ?> 
					 

				</div>

				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php'); ?>
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
		<script src="src/plugins/plyr/dist/plyr.js"></script>
		<script src="https://cdn.shr.one/1.0.1/shr.js"></script>
		<script>
			plyr.setup({
				tooltips: {
					controls: !0,
				},
			});
		</script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
