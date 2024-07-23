<?php 
	session_start();
	require_once('../model/connexion.php');
	require_once('../controller/recouvrement-cli.php');
	$num=$_SESSION['num_impot'];
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
							<div class="login-title" align="center">
								<h2 class="text-center text-primary">PAIEMENT DE L'IMPOT PAR MPESA</h2>	
								<img src="../assets/mpesa.png" width="100px" height="150px">
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
                                        <a href="recouvrement-cli.php">voir la liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
								<div class="form-group">
									<label class="control-label">CODE OPERATION</label>
									<select name="code_op" class="form-control" autocomplete="off" required="required">
													<?php

														$ps=$pdo->prepare("SELECT * FROM rapport WHERE num_cli='$num'");
														$ps->execute();
														?>
															<option disabled="disabled">
																Choisissez une rubrique
															</option>
															<?php
														while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
															?>
															<option value="<?php echo $s->id_op; ?>">
																<?php echo "OP:".$s->id_op."(".$s->num_cli.")-Montant à Payer-(".$s->montant_du."$)"; ?>
															</option>
															<?php
														}

													?>
											</select>
								</div>
								<div class="form-group">
									<label class="control-label">Montant Payé($)</label>
									<input
										type="number"
										class="form-control"
										placeholder="xxxx" name="montant_paye" value="0"
									/>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-danger btn btn-block btn-lg" name="save">PAYE</button>
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
