<?php

// ******Supprimer **********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM user WHERE id=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer **********************************************

// ********************Affichage des clients****************************
	require_once('../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['mot1'])) {
		$requete="SELECT * FROM user WHERE num_impot LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM user";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['save'])) {

		$num_impot=htmlspecialchars($_POST['num_impot']);
		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$plage=htmlspecialchars($_POST['plage']);

		if (strlen($num_impot > 5) AND strlen($num_impot <30)){
			$errors['password']="Votre numéro impôt doit avoir 5 à 20 caractères!";
		}

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO user(num_impot,nom_complet,adresse,plage)VALUES(?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_impot,$nom_complet,$adresse,$plage);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM user WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['save2'])) {

		$num_impot=htmlspecialchars($_POST['num_impot']);
		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$plage=htmlspecialchars($_POST['plage']);


		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE user SET num_impot=?,nom_complet=?,adresse=?,plage=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_impot,$nom_complet,$adresse,$plage,$_GET['dk']);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Modification effectuée avec succès!";
		}

	}
				 	
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$requeteprint="SELECT * FROM user";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************