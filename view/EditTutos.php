<?php 
	session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/Edit-tutos.php');
	$num=1;
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>

	<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">

	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLabel">Edition Vidéos</h2>
	      </div>
	      <form method="post" action="" enctype="multipart/form-data">
		      <div class="modal-body">
		        <div class="form-group">
								  <label for="completename" style="font-size: 20px">Titre:</label>
								            <input type="text" name="nom"  class="form-control" placeholder="Entrer le nom de l'article" value="<?= $userinfo['nom']; ?>">
								        </div>
								        <div class="form-group">
								            <label for="completename" style="font-size: 20px">Description:</label>
								            <textarea type="text" name="description"  class="form-control" placeholder="Entrer la description de l'article"><?= $userinfo['description']; ?></textarea> 
								        </div>
								        <div class="form-group">
								            <label for="completename" style="font-size: 20px">Vidéos:</label>
								            <input type="file" name="chemin"  class="form-control">
								            <video class="img" src="../includes/video/<?= $userinfo['chemin']; ?>" height="100" width="150" controls>
                            
                							</video>
								        </div>
									        <div class="form-group">
												<select name="categorie" class="form-control" required="required">
													<option value="Primaire et Sécondaire" <?php if($categ=="Primaire et Sécondaire") echo "selected" ?>>
														Primaire et Sécondaire
													</option>
													<option value="Humanité" <?php if($categ=="Humanité") echo "selected" ?>>
														Humanité
													</option>
													<option value="Professionnelle et universitaire" <?php if($categ=="Professionnelle et universitaire") echo "selected" ?>>
														Professionnelle et universitaire
													</option>
												</select>
											</div>
		      <div class="modal-footer">
		        <button class="btn btn-success" type="submit" name="save">Edit</button>
		        <a href="setting-tuto.php" class="btn btn-danger">Fermer</a>
		      </div>
		  </form>
		  <?php
								if (isset($errors)) {
									echo "<font color='red'>".$errors."</font>";
								}
							?>
		    </div>
	  </div>
	</div>		

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
		<script type="text/javascript">
		   $(document).ready(function(){
        		$('#modaledit').modal("show");
    		});
	</script>
	</body>
</html>
