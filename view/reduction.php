<?php session_start();
		require_once('securite.php');
		require_once('../bdd/connexion.php');
 ?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<style type="text/css">
	    .right p{
	      background-color: #86BB71;
	      padding: 15px;
	      border-radius: 8px;
	      color: white;
	    }
  	</style>
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
									<h4>Votre Taux de Réduction</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-detail card-box overflow-hidden mb-30">
										<div class="blog-img">
											<img src="../includes/Avatar_compte/<?= $_SESSION['photo'] ?>" alt=""/>
										</div>
										<div class="blog-caption">
											<h4 class="mb-10">
											<?php
                                    $nblmd=$pdo->prepare('SELECT SUM(prix) AS prix FROM reduction WHERE id_user=?');
                                    $nblmd->execute(array($_SESSION['id']));
                                    $nblmd=$nblmd->fetch()['prix'];
                                    if ($nblmd=='') {
                                    	?>
                                    	<p style="color: red">Aucune Réduction</p>
                                    	<?php
                                    }else{
                                    	?>
                                    	<div class="alert alert-success">
                                    		<?php
	                                    	echo ($nblmd); 	?>
	                                    	% de Réduction (Félictitation) Montez encore!
                                    	</div>
                                    	<?php
                                    } 
                                    ?>
											</h4>
											<p>
												Pour comprendre comment faire cliquez <a href="../includes/pdf/reduction.pdf" target="_blank" class="btn btn-danger"> ici</a>
											</p>
											
										</div>

									</div>
								</div>
								
							</div>
						
						</div>
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php') ?>
					
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
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
