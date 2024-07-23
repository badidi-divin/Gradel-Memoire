<?php 
	require_once('../model/connexion.php');
	$etat=$_GET['id'];
	$id_op=$_GET['id_op'];

	if ($_GET['id']==0){
		$ps=$pdo->prepare("UPDATE rapport SET etat=0 WHERE id_op=?");
		$params=array($id_op);
	}else{
		$ps=$pdo->prepare("UPDATE rapport SET etat=1 WHERE id_op=?");
		$params=array($id_op);
	}

	$ps->execute($params);

	// ********Redirection***********************//
	header("location:".$_SERVER['HTTP_REFERER']);