<?php 
	session_start();
	require_once('../bdd/connexion.php');
	require_once('../model/login-ent.php');
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
								<h2 class="text-center text-primary">Connexion Entreprise</h2>	
							</div>
							<form method="post" action="">
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="email" name="email"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Mot de passe" name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<select name="entreprise" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM entreprise");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->code_ent."-".$s->nom; ?>">
									<?php echo $s->code_ent."-".$s->nom; ?>
								</option>
									<?php
									}
								?>
						</select>
								</div>
								

								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Connexion</button>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											
										</div>
									</div>
								</div>
							</form>
							<a href="entreprise-compte.php">créer compte</a>
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
