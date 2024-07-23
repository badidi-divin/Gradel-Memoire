<?php
	$id=$_SESSION['id'];
   $requete="SELECT * FROM vente WHERE id_utilisateurs='$id'";                  

   $ps=$pdo->query($requete);