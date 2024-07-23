<?php session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/selectProjet.php');
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
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
								placeholder="Rechercher"
							/>
						</div>
					</form>
				</div>
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
							<a class="dropdown-item" href="projet.php"
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
									<h4>Liste des Projets qui peuvent vous interessés pour le Partenariat. Nous serons votre intermédiaire</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item active" aria-current="page">
											<a href="liste-projet.php" title="Votre Projet sera visible dans le monde entier et peuvent toucher beaucoup des personnes" class="btn btn-outline-success">Publier votre Projet</a>
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="projet-wrap">
						<h4 class="mb-20 h4 text-blue">Projets Approuvés et vérifiés par le Prof</h4>
						<div id="accordion">
							<?php
								foreach ($projet as $projet):
							?>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block"
										data-toggle="collapse"
										data-target="#projet1"
									>
										<?= $projet->Titre_projet;?>
									</button>
								</div>
								<div id="projet1" class="collapse show" data-parent="#accordion">
									<div class="card-body">
										<?= $projet->Description;?> 
										&nbsp;&nbsp;<?= $projet->dates;?>&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=+243817767357&text=Bonjour chers Secrétaire je suis interessé par ce service...&source=&data=" target="_blank" class="btn btn-outline-success">Discussion <img src="../includes/images/whatasapp.png" width="30px" height="50px"> </a>
									</div>

								</div>
							</div>
							<?php
								endforeach; 
							?> 
							
						</div>
					</div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php');  ?> 
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
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
