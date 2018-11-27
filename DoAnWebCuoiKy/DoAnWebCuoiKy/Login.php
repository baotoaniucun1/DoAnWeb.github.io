
<?php
	session_start();

	require_once 'lib/Database.class.php';
	require_once 'config.php';

	$database = new Database();
    $database->connect();
    
    if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	}

	

	if (isset($_POST["btnLogin"])) {
		$username = $_POST["txtUserName"];
		$password = $_POST["txtPassword"];
		$enc_password = $password;//md5($password);

		$sql = "select * from users where f_Username = '$username' and f_Password = '$enc_password'";
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$_SESSION["current_user"] = $rs->fetch_object();
			$_SESSION["dang_nhap_chua"] = 1;
			header("Location: profile.php");
		} else {
			// sinh viên xử lý show_alert
		}
	}
  	// $errorLogin = '';
	// 	$username = $password = "";
		

	// if(!empty($_POST))
	// {
	// 	$username = trim($_POST['Username']);
	// 	$password = base64_encode(serialize($_POST['Password']));
		
	// 	// Xử lý để tránh MySQL injection
	// 	$username = stripslashes($username);
	// 	$password = stripslashes($password);
	// 	$username = mysqli_real_escape_string($conn, $username);
	// 	$password = mysqli_real_escape_string($conn, $password);

	// 	$query_login = "SELECT * FROM `nguoidung` WHERE `TenDangNhap` = '$username' AND `MatKhau` = '$password'";
	// 	$result = $database->query($query_login);
	// 	$info_account = $database->singleRecord();

	// 	$count = mysqli_num_rows($result);
	// 	if($count == 1)
	// 	{	$role = $info_account['VaiTro'];
	// 		$_SESSION['username'] = $username;
	// 		$_SESSION['role'] = $role;
	// 		header('Location: index.html');
	// 	}
	// 	else{
	// 		$errorLogin = '<b class="error" style="font-size:19px; padding-top:20px">Tên đăng nhập hoặc mật khẩu không chính xác! </b>';
	// 	}
	// }
	// else{
	// 	$errorLogin = '';
	// }	


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    <?php
    include 'modules/include.php';
    ?>

</head>

<body>
    <div class="container">
        <?php
        include 'modules/header.php';
        ?>

        <div class="container login-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-2">
                    <h3>Đăng Nhập</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword"  placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Forget">Forget Password?</a>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <input type="submit" name="btnLogin" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group" style="text-align:center" >
                            <a href="register.php" class="ForgetPwd" value="Register">Register</a>
                        </div>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <?php
        include 'modules/footer.php';
        ?>
    </div>
    <script src="/assets/js/theme-bundle.main.js"></script>
</body>

</html>