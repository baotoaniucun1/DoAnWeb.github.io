<?php
	
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = '1660626_quanlysanpham';

	$conn = mysqli_connect($server, $username, $password);

	mysqli_select_db($conn, $db_name);

?>