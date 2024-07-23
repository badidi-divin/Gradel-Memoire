<?php 

	require_once('../bdd/connexion.php'); 
	require_once('../model/inscription.php'); 

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Mibatela- Transport assuer en toute sécurité</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/jquery-steps/jquery.steps.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>

	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.php">
						<h2>MIBATELA</h2>
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="login.php">Se Connecter</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
		<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="../includes/images/jj.jpg" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Inscription</h2>
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
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Prenom" name="prenom" required="required" value="<?php if(isset($prenom)){ echo $prenom; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Nom" name="nom" required="required" value="<?php if(isset($nom)){ echo $nom; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<div class="radio">
										<label for="sexe">Sexe:</label>
										<label><input type="radio" name="sexe" value="Masculin" checked>Masculin</label>
										<label><input type="radio" name="sexe" value="Féminin"> Féminin</label>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="email"
										class="form-control form-control-lg"
										placeholder="user@email.com" name="email" required="required" value="<?php if(isset($email)){ echo $email; } ?>"
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
										placeholder="Mot de passe" name="mdp" required="required" value="<?php if(isset($memo_mdp)){ echo $memo_mdp; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Confirmé le Mot de passe" name="cmdp" required="required" value="<?php if(isset($memo_mdp)){ echo $memo_mdp; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Pays/Ville" name="pays" required="required" value="<?php if(isset($pays)){ echo $pays; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text">
											</span>
									</div>
									<div class="input-group-append custom">
										<span class="input-group-text"
											></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Adresse Complete" name="adresse" required="required" value="<?php if(isset($adresse)){ echo $adresse; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											></span>
									</div>
									<div class="input-group-append custom">
										<span class="input-group-text"
											></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Entrer le titre de votre Music favorite" name="music" required="required" value="<?php if(isset($music)){ echo $music; } ?>"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											></span>
									</div>
									<div class="input-group-append custom">
										<span class="input-group-text"
											></span>
									</div>
								</div>
								<div class="custom-control custom-checkbox mt-4">
												<input
													type="checkbox"
													class="custom-control-input"
													id="customCheck1" required="required"
												/>
												<label class="custom-control-label" for="customCheck1"
													>J'ai <a href="../includes/pdf/Politique-de-confidentialite-type_FR22.pdf" target="_blank">lu et j'accepte</a>  la politique de confidentialité </label
												>
											</div>
								<h5>Juste Confirmer si vous n'êtes pas <span><u>un robot</u></span></h5>
					            <div class="form-group">
					              <label for="code">Entrer le code suivant:</label>
					            </div>
				            <!-- L'image sera générai par le CAPTCHA -->
				            <div class="form-group">
				              <img src="captcha.php" width="90px" height="80px" alt="CAPTCHA"/><br/>
				            </div>
				            <div class="form-group">
				              <input type="text" id="code" class="form-control" name="code" required="required" />
				            </div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Créer un compte</button>
							</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- success Popup html End -->
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
		<script src="vendors/scripts/steps-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
