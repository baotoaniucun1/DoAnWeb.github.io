<?php
	
	session_start();

	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		unset($_SESSION["dang_nhap_chua"]);
		header('Location: Login.php');
	}
	else{
		header('Location: Login.php');
	}

?>