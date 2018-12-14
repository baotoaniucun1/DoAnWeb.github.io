<?php
require_once '../lib/db.php';

if (isset($_GET["user"])) {
	$user = $_GET["user"];
	$sqlQ = "select * from taikhoan where tendangnhap = '$user'";
	$rsQ = load($sqlQ);
	if ($rsQ->num_rows > 0) {
		echo 1;
	} else {
		echo 0;
	}
} else {
	echo -1; // bad request
}



?>