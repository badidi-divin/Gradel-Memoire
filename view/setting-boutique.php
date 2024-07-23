<?php 
	session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/select-boutique-admin.php');
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
								<a href="modal"
										data-toggle="modal"
										data-target="#modal"
										class="edit-avatar">
								</a>
									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-header">
											        <h2 class="modal-title" id="exampleModalLabel">Création de la Boutique</h2>
											      </div>
												<div class="modal-body pd-5">
													
												</div>
												<div class="modal-footer">
													<button
														type="submit"
														class="btn btn-primary"
														name="save"
													>
													Ajouter
													</button>
													</form>
													<?php
														if (isset($erreur)) {
															echo "<font color='red'>".$erreur."</font>";
														}
													?>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Fermer
													</button>
												</div>
								</div>
							</div>

						</div>
					</div>
				</div>
					<!-- Checkbox select Datatable End -->
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Liste des Boutiques</h4>
						</div>
						<div class="pb-20">
							<div class="table-responsive table--no-card m-b-30">
								<table
									class="table hover multiple-select-row data-table-export nowrap"
								>
									<thead>
										<tr>
											<th>N°</th>
											<th>Titre</th>
											<th>Description</th>
											<th>Categorie</th>
											<th>images</th>
											<th>Dates</th>
											<th>Etat</th>
											<th>Certification</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($et=$ps->fetch()){?>
										<tr>
											<td class="table-plus"><?php  echo($num)?></td>
											<td><?php  echo($et['nom_boutique'])?></td>
											<td><?php  echo substr($et['description'],0,20); ?>...</td>
											<td><?php  echo($et['categorie'])?></td>
											<td> <a href="../includes/boutique/<?= $et['image_boutique'] ?>" target="_blank"><img src="../includes/boutique/<?= $et['image_boutique'] ?>" width="80px" height="100px"></a> </td>
											<td><?php  echo($et['dates'])?></td>
											<td>
												<?php 
												if ($et['affiche']<>1) {
													?>
													<a href="#" class="btn btn-danger">Non Approuvé</a>
													<?php
												} else {
													?>
													<a href="#" class="btn btn-success"> Approuvé</a>
													<?php
												}
												
												 ?></td>
											<td>
												<?php 
												if ($et['certifie']<>1) {
													?>
													<a href="#" class="btn btn-danger">Non Certifié</a>
													<?php
												} else {
													?>
													<a href="#" class="btn btn-success"> Certifié</a>
													<?php
												}
												
												 ?>
											</td>
											
											<td>
												<a href="EditBoutique-admin.php?id=<?php echo($et['id_boutique'])?>"
											class="btn btn-primary"
											
											><i class="fa fa-pencil"></i
										 ></a>
											<a title="Voulez-vous supprimer?" onclick="return confirm('Etes-vous sûre...?');" class="btn btn-danger" href="../model/SupprimeBoutique.php?id=<?php echo($et['id_boutique'])?>"><i class="fa fa-trash"></i
										></a>
											</td>
										</tr>
										<?php
										$num++;
										 } ?>	
									</tbody>
								</table>
							</div>
						</div>
					</div>

					
					<!-- Export Datatable End -->
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					<?php require_once('auteur.php'); ?>
				</div>
			</div>
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
