
<?php
	session_start();

	require_once 'lib/Database.class.php';
	require_once 'config.php';

	$database = new Database();
    $database->connect();

  	$errorLogin = '';
      $username = $password = "";

    if(!empty($_POST))
	{
		$username = trim($_POST['txtUserName']);
		$password =  $_POST['txtPassword'];
        $enc_password = md5($password);

        $password;//md5($password);
		$query_login = "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' AND MatKhau = '$enc_password'";
		$result = $database->query($query_login);
		$info_account = $database->singleRecord();

		$count = mysqli_num_rows($result);
		if($count == 1)
		{	$role = $info_account['MaLoaiTaiKhoan'];
			$_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $TenHienThi = $info_account['TenHienThi'];
			$_SESSION['TenHienThi'] = $TenHienThi;
			header('Location: index.php');
		}
		else{
			$errorLogin = '<b class="error" style="font-size:19px; padding-top:20px">Tên đăng nhập hoặc mật khẩu không chính xác! </b>';
		}
	}
	else{
		$errorLogin = '';
	}



?>


<!DOCTYPE html>
<html lang="vi">

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
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Forget">Forget Password?</a>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <input type="submit" name="btnLogin" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group" style="text-align:center">
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