<?php 
	session_start();
	require_once('../model/connexion.php');
	require_once('../controller/redevable.php');

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
					<h2>DGRK</h2>
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
						<img src="../assets/2.jpg" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">EDITION</h2>	
							</div>
							<form method="post" action="">
								<?php
                        if (!empty($errors)):
                                ?>
                                <div class="alert alert-danger">
                                    <p></p>
                                    <ul>
                                        <?php foreach($errors as $error):?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <?php
                                if (!empty($success)):
                                ?>
                                <div class="alert alert-success">
                                    <p></p>
                                    <ul>
                                        <?php foreach($success as $succes):?>
                                            <li><?= $succes; ?></li>
                                        <?php endforeach; ?>
                                        <a href="redevable.php">voir la liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
								<div class="form-group">
									<label class="control-label">Num-impôt</label>
									<input
										type="text"
										class="form-control"
										placeholder="Num-impôt" name="num_impot" value="<?= $userinfo['num_impot']; ?>"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Nom complet</label>
									<input
										type="text"
										class="form-control"
										placeholder="Nom-complet" name="nom_complet" value="<?= $userinfo['nom_complet']; ?>"
									/>
								</div>
								<div class="form-group">
									<label class="control-label">Adresse complète</label>
									<input
										type="text"
										class="form-control"
										placeholder="Adresse-complet" name="adresse" value="<?= $userinfo['adresse']; ?>"
									/>
								</div>
																<div class="form-group">
									<label class="control-label">Plage</label>
									<select name="plage" class="form-control" autocomplete="off" required="required">
													<?php

														$ps=$pdo->prepare("SELECT * FROM plage");
														$ps->execute();
														?>
															<option disabled="disabled">
																Choisissez une rubrique
															</option>
															<?php
														while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
															?>
															<option value="<?php echo $s->pourcentage; ?>">
																<?php echo $s->design_plage."(".$s->pourcentage."%)"; ?>
															</option>
															<?php
														}

													?>
											</select>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save2">EDITION</button>
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
