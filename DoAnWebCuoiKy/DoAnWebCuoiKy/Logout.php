<?php

	session_start();

	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		unset($_SESSION["dang_nhap_chua"]);
        unset( $_SESSION['cart']);
        session_destroy();
		header('Location: Login.php');
	}
	else{
		header('Location: Login.php');
	}

?>