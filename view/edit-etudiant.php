<?php 
	session_start();
	require_once('../bdd/connexion.php');
	require_once('../model/edit-etudiant.php');
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
								<h2 class="text-center text-primary">Editer Etudiant</h2>	
							</div>
							<form method="post" action="">
								<div class="form-group">
									<label class="control-label">Nom Complet</label>
									<input
										type="text"
										class="form-control"
										placeholder="Nom complet" name="nom_complet" value="<?= $userinfo['nom_complet'] ?>"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Sexe</label>
									<select name="sexe" class="form-control">
										<option value="M">
											M
										</option>
										<option value="F">
											F
										</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Option</label>
									<select name="option" class="form-control">
										<option value="Informatique de gestion">
											Informatique de gestion
										</option>
										<option value="Informatique Industriel">
											Informatique Industriel
										</option>
										<option value="Mecanique Agricole">
											Mecanique Agricole
										</option>
										<option value="Mecanique de Production">
											Mecanique de Production
										</option>
										<option value="Electro-technique">
											Electro-technique
										</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Promotion</label>
									<select name="promotion" class="form-control">
										<option value="LPTA3">
											LPTA3
										</option>
										<option value="LPTA4">
											LPTA4
										</option>
										<option value="LPTIG3">
											LPTIG3
										</option>
										<option value="LPTIG4">
											LPTIG4
										</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Email</label>
									<input
										type="email"
										class="form-control"
										placeholder="Email" name="email" value="<?= $userinfo['email'] ?>"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Télephone</label>
									<input
										type="number"
										class="form-control"
										placeholder="tel" name="tel" value="<?= $userinfo['tel'] ?>"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Adresse Complète</label>
									<input
										type="text"
										class="form-control"
										placeholder="adresse" name="adresse" value="<?= $userinfo['adresse'] ?>"
									/>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Editer</button>
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
