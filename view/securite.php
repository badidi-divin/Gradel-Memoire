<?php
	if (!isset($_SESSION['password']) || !isset($_SESSION['id'])) {
		header('location:logout.php');
	}

