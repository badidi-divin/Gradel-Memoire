<?php

	$num=$_SESSION['num_impot'];

	// ********************Affichage des clients****************************
	require_once('../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['mot1'])) {
		$requete="SELECT * FROM recouvrement WHERE id LIKE '%$mot1%' AND code_redevable='$num'";			
	}else{
		$requete="SELECT * FROM recouvrement WHERE code_redevable='$num'";	
	}
	$resultat=$pdo->query($requete);
	
	// ********************End Affichage des clients************************
	
// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['save'])) {

		$code_op=htmlspecialchars($_POST['code_op']);
		// ************Recherche**************************
		$requser=$pdo->prepare("SELECT * FROM rapport WHERE id_op=?");
		$requser->execute(array($code_op));
		$rech1=$requser->fetch();
		// *************************End********************
		$code_redevable=$rech1['num_cli'];
		$montant_du=$rech1['montant_du'];
		$montant_paye=htmlspecialchars($_POST['montant_paye']);

		$mois=date('m');

		if ($montant_paye <> $montant_du){
			$errors['password']="Le montant payé doit être égal au montant dû!";
		}

		if (empty($errors)) {
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO recouvrement(code_op,code_redevable,montant_du,montant_paye,mois)VALUES(?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($code_op,$code_redevable,$montant_du,$montant_paye,date('m'));
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
			 // actualisation de l'etat de paiement
		    $ps2=$pdo->prepare("UPDATE rapport SET etat=1 WHERE id_op=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params2=array($code_op);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps2->execute($params2);

		}
				 	
	}
// *************End Insert client**************************************



