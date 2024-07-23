<?php 

	if (isset($_POST['save'])) {

		$username=htmlspecialchars($_POST['username']);
		$password=md5($_POST['password']);


		if (!empty($username) && !empty($password)){

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM admin WHERE username=? AND password=?");
			$requiser->execute(array($username,$password));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['username']=$userinfo['username'];
				$_SESSION['password']=$userinfo['password'];
				header("Location: tableau-bord-admin.php");		
			}
			else
			{
				$erreur="Nom d'utilisateur ou Mot de passe incorrect! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}

	}


