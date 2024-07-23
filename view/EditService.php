<?php 
	session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/Edit-service.php');
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
	        <h2 class="modal-title" id="exampleModalLabel">Edition du Service</h2>
	      </div>
	      <form method="post" action="" enctype="multipart/form-data">
		      <div class="modal-body">
		        <div class="form-group">
								  <label for="completename" style="font-size: 20px">DESIGNATION:</label>
								            <input type="text" name="nom"  class="form-control" placeholder="Entrer le nom de l'article" value="<?= $userinfo['nom'] ?>">
								        </div>
								        <div class="form-group">
								            <label for="completename" style="font-size: 20px">Description:</label>
								            <textarea type="text" name="description"  class="form-control" placeholder="Entrer la description de l'article"><?= $userinfo['description'] ?></textarea> 
								        </div>
								        <div class="form-group">
								            <label for="completename" style="font-size: 20px">Image:</label>
								            <input type="file" name="photo"  class="form-control">
								            <img src="../includes/images/<?= $userinfo['image'];?>" width="100px" height="100px">
								        </div>
								        <div class="form-group">
					                     <label for="categorie">Categorie:</label>
						                     <select name="categorie" class="form-control" required="required">
						                        <option value="Formation"  <?php if($categ=="Formation") echo "selected" ?>>
						                           Formation
						                        </option>
						                        <option value="Service" <?php if($categ=="Service") echo "selected" ?>>
						                           Service
						                        </option>
						                     </select>
						                	</div>
		      <div class="modal-footer">
		        <button class="btn btn-success" type="submit" name="save">Edition</button>
		        <a href="setting-service.php" class="btn btn-danger">Fermer</a>
		      </div>
		  </form>
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
