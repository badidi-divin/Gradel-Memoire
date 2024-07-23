<?php
$num=$_SESSION['num_impot'];

// ********************Affichage des clients****************************
	require_once('../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['mot1'])) {
		$requete="SELECT * FROM rapport WHERE id_op LIKE '%$mot1%' AND num_cli='$num'";			
	}else{
		$requete="SELECT * FROM rapport WHERE num_cli='$num'";	
	}
	$resultat=$pdo->query($requete);

// ********************End Affichage des clients************************

