<?php
	
	session_start();

	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		header('Location: Login.php');
	}
	else{
		header('Location: Login.php');
	}

?>