<?php session_start(); 
	require_once('../model/cookie-config.php');
	
	$interval=3;
	$url="profile-ispt.php";


?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>
		<?php require_once('chargement.php');
				// header('location:blog.php');
				header("refresh:$interval;url=$url");
		 ?>

		<!-- welcome modal start -->
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
