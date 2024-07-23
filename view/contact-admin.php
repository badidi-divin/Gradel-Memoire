<?php 
	session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/select-contact.php');
	
	$num=1;
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
					<form method="get" action="">
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								name="mot1" value="<?php echo $mot1 ?>"
								type="text"
								class="form-control search-input"
								placeholder="Rechercher un nom complet"
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
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
							</div>
							<div class="col-md-6 col-sm-12 text-right">
									
								</a>
							</div>

					</div>
				</div>
					<!-- Checkbox select Datatable End -->
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Liste des Contacts: (<?php
									$nbcontact=$pdo->prepare('SELECT * FROM contact');
									$nbcontact->execute();
									$nbcontact=$nbcontact->fetchAll();
									echo count($nbcontact); 
								?>)</h4>
						</div>
						<div class="pb-20">
							<div class="table-responsive table--no-card m-b-30">
								<table class="table hover multiple-select-row data-table-export nowrap">
									<thead>
										<tr>
									<th>CODE</th><th>NOM_COMPLET</th><th>EMAIL</th><th>SUJET</th><th>MESSAGE</th><th>TIME</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($num)?></td>
								<td><?php  echo($et['nom'])?></td>
								<td> <a href="mailto:<?php  echo($et['email'])?>"> <?php  echo($et['email'])?></a></td>
								<td><?php  echo($et['sujet'])?></td>
								<td><?php  echo($et['message'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a title="Voulez-vous supprimer?" onclick="return confirm('Etes-vous sûre...?');" class="btn btn-danger" href="../model/Supprimecontact.php?id=<?php echo($et['id'])?>"><i class="fa fa-trash"></i
										></a></td>
											</tr>	
										<?php
										$num++;
										 } ?>	
									</tbody>
								</table>
								<div class="col-md-12 col-xs-12 ">
									<ul class="pagination pagination-md">
										<?php for($i=1;$i<=$nbrePage;$i++) {?>
											<li class="<?php if($i==$page) echo 'active';?>"> 
												<a href="contact-admin.php?page=<?php echo $i; ?>" class="btn btn-outline-primary"> 
													Page<?php echo $i ?>	
												</a>
											</li>
										 <?php } ?>
									</ul>
								</div>
						</div>
					</div>
					</div>
				</div>

				</div>
					<!-- Export Datatable End -->
				</div>

				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php'); ?>

				</div>

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

