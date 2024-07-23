<?php 
	session_start(); 
	require_once('../bdd/connexion.php');
	require_once('securite.php');
	require_once('../model/select-message.php');
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
	        <h2 class="modal-title" id="exampleModalLabel">LISTE DES MESSAGES--- <a href="CommentProjet.php?id=<?= $_GET['id'] ?>">Enregistrer</a></h2>
	      </div>
	      <div class="card-box mb-30">
						<div class="pd-20">
							
						</div>
						<div class="pb-20">
							<div class="table-responsive table--no-card m-b-30">
								<table
									class="table hover multiple-select-row data-table-export nowrap"
								>
									<thead>
										<tr>
											<th>N°</th>
											<th>MESSAGE</th>
											<th>Dates</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($et=$ps->fetch()){?>
										<tr>
											<td class="table-plus"><?php  echo($num)?></td>
											<td><?php  echo($et['message'])?></td>
											<td><?php  echo($et['dates'])?></td>
											<td>
												<a href="EditMessage.php?id=<?php echo($et['id_projet'])?>"
											class="btn btn-primary"
											
											><i class="fa fa-pencil"></i
										 ></a>
											<a title="Voulez-vous supprimer?" onclick="return confirm('Etes-vous sûre...?');" class="btn btn-danger" href="../model/SupprimeMessage.php?id=<?php echo($et['id_projet'])?>"><i class="fa fa-trash"></i
										></a>
											</td>
										</tr>
										<?php
										$num++;
										 } ?>	
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
					        <a href="Setting-projet.php" class="btn btn-danger">Fermer</a>
					      </div>
						</div>
					</div>
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
