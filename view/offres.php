<?php session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/select-offres.php');
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>
		<?php require_once('chargement.php'); ?>

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
								placeholder="Rechercher un article"
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
			<div class="pd-ltr-20 height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Offred d'Emploie</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<!-- <a href="videos.php">Vidéos</a> -->
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Offres
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-8 col-sm-12">
									<div class="blog-list">
										<ul>
											<?php
											          foreach ($emploie as $emploie):
											         ?>
											<li> 
												<div class="row no-gutters">
													<div class="col-lg-4 col-md-12 col-sm-12">
														<div class="blog-img">
															<img
																src="../includes/Photo_emploie/<?php echo $emploie->image; ?>"
																alt=""
																class="bg_img"
															/>
														</div>
													</div>
													<div class="col-lg-8 col-md-12 col-sm-12">
														<div class="blog-caption">
															<h4>
																<a href="detailblog.php?id=<?php echo $blog->id; ?>"
																	><?= $emploie->nom_entreprise;?><span style="color:blue"> (<?php echo $blog->categorie; ?>)</span></a
																>
															</h4>
															<div class="blog-by">
																<p>
																	<?php echo substr($blog->description,0,50); ?>...
																</p>
																<div class="pt-10">
																<span>Publié : <?= $blog->dates;?></span><br><br>

																	<a href="detailblog.php?id=<?php echo $blog->id; ?>" class="btn btn-outline-primary"
																		>Lire Plus</a
																	>
																</div><br>
																 <div class="meta-wrap align-items-center">
													              	<div class="half order-md-last">
														              	<p class="meta">
														              		<?php $id_blog=$blog->id; ?>
														              		<span><a href="../model/aime.php?id_user=<?= $user ?>&id_blog=<?= $id_blog ?>"><i class="fa fa-heart" style="color: red;"><?php
																				$nbcontact=$pdo->prepare("SELECT * FROM aime WHERE id_blog='$id_blog'");
																				$nbcontact->execute();
																				$nbcontact=$nbcontact->fetchAll();
																				echo count($nbcontact); 
																			?></i></a> </span>
														              		<span><a href="detailblog.php?id=<?php echo $blog->id; ?>"><i class="fa fa-comment" style="color: skyblue;"></i><?php
																				$nbcontact=$pdo->prepare("SELECT * FROM comment_blog WHERE  id_article='$id_blog'");
																				$nbcontact->execute();
																				$nbcontact=$nbcontact->fetchAll();
																				echo count($nbcontact); 
																			?></span></a>
														              	</p>
													              	</div>
															</div>
														</div>
													</div>
												</div>
												
											</li>
											<?php
											    endforeach; 
											 ?> 
											
										</ul>
									</div>
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="card-box mb-30">
										<h5 class="pd-20 h5 mb-0">Categories</h5>
										<div class="list-group">
											<a
												href="blog.php"
												class="list-group-item d-flex align-items-center justify-content-between"
												>Tous
												<span class="badge badge-primary badge-pill"></span></a
											>
											 <?php
										          foreach ($categ as $categ):
										         ?>
											<a
												href="blog.php?id=<?= $categ->designation ?>"
												class="list-group-item d-flex align-items-center justify-content-between"
												><?= $categ->designation ?>
												<span class="badge badge-primary badge-pill"></span></a
											>
											<?php
											    endforeach; 
											 ?> 
											
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
