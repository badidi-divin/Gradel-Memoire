<?php
	session_start();
	require_once('../model/connexion.php');
	require_once('../controller/redevable.php');
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
				<h3 class=" pt-1" style="font-weight: bold;">DGRK</h3>
				<img src="../assets/2.jpg" width="100PX" height="80px">
			</div>
		<div class="container col-12" style="margin-top:20px;">
			<div class="panel panel-primary">
				<div class="panel-heading">
						LISTE DES REDEVALES 
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								
								<tr>
									<th>CODE</th>
									<th>NUM-IMPOT</th>
									<th>NOM-COMPLET</th>
									<th>ADRESSE</th>
									<th>PLAGE</th>
									<th>DATES</th>	
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultatprint->fetch()){?>
								<tr>
									<td><?php  echo($et['id'])?></td>
									<td><?php  echo($et['num_impot']);?></td>
									<td><?php  echo($et['nom_complet'])?></td>
									<td><?php  echo($et['adresse'])?></td>
									<td><?php  echo($et['plage'])?></td>
									<td><?php  echo($et['dates'])?></td>
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
