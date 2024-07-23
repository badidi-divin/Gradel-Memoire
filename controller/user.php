<?php 

	if (isset($_POST['save'])) {

		$num=htmlspecialchars($_POST['num_impot']);

		if (!empty($num)){

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM user WHERE num_impot=?");
			$requiser->execute(array($num));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['num_impot']=$userinfo['num_impot'];
				$_SESSION['nom_complet']=$userinfo['nom_complet'];
				$_SESSION['adresse']=$userinfo['adresse'];
				$_SESSION['plage']=$userinfo['plage'];
				header("Location: tableau_bord.php");		
			}
			else
			{
				$erreur="Numéro Impôt incorrect! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}

	}



