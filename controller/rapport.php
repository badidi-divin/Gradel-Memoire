<?php

// ******Supprimer **********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM rapport WHERE id_op=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer **********************************************

// ********************Affichage des clients****************************
	require_once('../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['mot1'])) {
		$requete="SELECT * FROM rapport WHERE id_op LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM rapport";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['save'])) {

		$num_cli=htmlspecialchars($_POST['num_cli']);
		// ************Recherche Redevable******************
		$requser=$pdo->prepare("SELECT * FROM user WHERE num_impot=?");
		$requser->execute(array($num_cli));
		$rech1=$requser->fetch();
		$revenu_brut=htmlspecialchars($_POST['revenu_brut']);
		
		// **********Calcul*********************************
		$montant_du=($revenu_brut*$rech1['plage'])/100;
		$mois=date('m-y');	
		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO rapport(num_cli,revenus_brut,montant_du,mois)VALUES(?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_cli,$revenu_brut,$montant_du,$mois);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		$requser=$pdo->prepare("SELECT * FROM rapport WHERE id_op=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['save2'])) {

		$num_cli=htmlspecialchars($_POST['num_cli']);
		// ************Recherche Redevable******************
		$requser=$pdo->prepare("SELECT * FROM user WHERE num_impot=?");
		$requser->execute(array($num_cli));
		$rech1=$requser->fetch();
		$revenu_brut=htmlspecialchars($_POST['revenu_brut']);
		
		// **********Calcul*********************************
		$montant_du=($revenu_brut*$rech1['plage'])/100;
		$mois=date('m-y');	

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE rapport SET num_cli=?,revenus_brut=?,montant_du=?,mois=? WHERE id_op=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_cli,$revenu_brut,$montant_du,$mois,$_GET['dk']);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Modification effectuée avec succès!";
		}

	}
				 	
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$requeteprint="SELECT * FROM rapport";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************