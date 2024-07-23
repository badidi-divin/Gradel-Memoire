<?php
	//Ce fichier me permet de générer le système de CAPTCHA
	//Pour créer ce système nous allons utiliser les sessions, ce qui va nous permettre de faire passer ce code d'une page à une autre
	session_start();
	//On va génerer de code aléatoire grâce à la fonction rand

	$code=strtoupper(substr(md5(uniqid(rand())), 0, 6));
	//On va mettre notre variable à l'intérieur de la  variable de la session,
	$_SESSION['code']=$code;

	//On va créer une image grace à la fonction imagecreate qui nous permet de créer une image vide
	//Il prend en paramètre la largeur et la longueur de l'image
	$largeur=65;
	$longueur=25;
	$image=imagecreate($largeur,$longueur);
	// Cette fonction me permet de colorer mon image en noir blanc
	$noir=imagecolorallocate($image, 0, 0, 0);
	$blanc=imagecolorallocate($image, 255, 255, 255);
	// la fonction image string me permet de créer mon texte
	$font=13;
	imagestring($image, $font, 5, 5, $code, $blanc);
	// Pour créer l'image on utilise la fonction imagejpeg
	//Le 75 est la qualité de l'image plus elle est haut il est bon
	imagejpeg($image, null,75);
	
