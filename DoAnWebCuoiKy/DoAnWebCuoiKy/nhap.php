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

    $database->query("set names 'utf8'");
    $result = $database->query($query_login);
    $info_account = $database->singleRecord();

    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $role = $info_account['MaLoaiTaiKhoan'];
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




 <?php if($flag ==0)  echo $kichhoatactive?> 