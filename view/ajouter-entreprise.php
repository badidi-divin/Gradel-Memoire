<?php 
	session_start();
	require_once('../bdd/connexion.php');
	require_once('../model/ajout-entreprise.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<?php require_once('header.php'); ?>
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="#">
					<h2>ISPT-KIN</h2>
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="../includes/images/16.gif" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Ajouter Entreprise</h2>	
							</div>
							<form method="post" action="">
								<div class="form-group">
									<label class="control-label">Code</label>
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Code entreprise" name="code_ent"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">NOM</label>
									<input
										type="text"
										class="form-control"
										placeholder="Nomination" name="nom"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">RCCM</label>
									<input
										type="text"
										class="form-control"
										placeholder="RCCM" name="rccm"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">ID NAT</label>
									<input
										type="text"
										class="form-control"
										placeholder="Désignation" name="idnat"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Num Impôt</label>
									<input
										type="text"
										class="form-control"
										placeholder="Num Impôt" name="num_impot"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Forme Juridique</label>
									<input
										type="text"
										class="form-control"
										placeholder="Forme Juridique" name="forme_juridique"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Email</label>
									<input
										type="email"
										class="form-control"
										placeholder="Email" name="email"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Adresse Complète</label>
									<input
										type="text"
										class="form-control"
										placeholder="Adresse complete" name="adresse"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Telephone</label>
									<input
										type="number"
										class="form-control"
										placeholder="Telephone" name="tel"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Activité</label>
									<input
										type="text"
										class="form-control"
										placeholder="Type activite" name="type_activite"
									/>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Enregistrer</button>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											
										</div>
										
									</div>
								</div>
							</form>
							<?php
								if (isset($erreur)) {
									echo "<font color='red'>".$erreur."</font>";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
