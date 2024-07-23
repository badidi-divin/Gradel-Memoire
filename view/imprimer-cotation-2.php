<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('../model/imprime-affectation-2.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Impression</title>
	<link rel="stylesheet" href="test.css">
	<style type="text/css">
		@page
		{
			size:A4;
			margin:0; 

		}
		#print-btn{
			display: none;
			visibility: none;
		}
		.margetop{
			margin-top: 82px;
		}
		.spacer{
			margin-top: 10px;
		}
		.space{
			margin-top: 70px;
		}
		.spac{
			margin-top: 80px;
		}
		.a{
			text-align:center;
			text-decoration: blink;
		}
	</style>
</head>
<body>
	<!--************************ Header ***********************************-->
	<!-- Navigation -->

			<div class="container headings text-center margetop" >
				<h3 class=" pt-1" style="font-weight: bold;">ISPT-KIN</h3>
				<img src="../includes/images/16.gif" width="60PX" height="80px">
			</div>
		<div class="container col-12" style="margin-top:20px;">
			<div class="panel panel-primary">
				<div class="panel-heading">
						LISTE DES AFFECTATION DE STAGE
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>NUMERO</th>
									<th>CODE ETUDIANT</th>
									<th>CODE ENTREPRISE</th>
									<th>DATE ENREGISTREMENT</th>
									<th>DUREE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['num_affect'])?></td>
									<td><?php  echo($et['code_etudiant']);?></td>
									<td><?php  echo($et['code_entreprise'])?></td>
									<td><?php  echo($et['date_enreg'])?></td>
									<td><?php  echo($et['duree'])?></td>
								<!--liens -->
								<td>
											</tr>	
									<?php } ?>	
							</tbody>
						</table>	
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	
	
	<!-- Affichage inscris end -->
		
	




<!-- ***********footer Ends******************** -->
<!-- **********************Code Javascript*********************-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
