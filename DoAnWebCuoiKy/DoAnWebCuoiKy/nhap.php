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



 $tenloai = "Phân Khúc Cao Cấp";
                        switch($i)
                        {
                            case 1:
                                $mahang = 1;
                                
                                $giatien = "sp.GiaSanPham < 4000000";

                                break; 
                               
                            // case 2:
                            //     $masp ; 
                            //     $tensp;
                            //     $gia;
                            // case 3:
                            //     $masp ; 
                            //     $tensp;
                            //     $gia;
                            // case 4:
                            //     $masp ; 
                            //     $tensp;
                            //     $gia;
                            // case 5:
                            //     $masp ; 
                            //     $tensp;
                            //     $gia;
    
                            
    
    
                        }
                   

                         $query = "SELECT sp.TenSanPham, hsx.LogoURL FROM sanpham as sp , hangsanxuat as hsx
                        where sp.MaHangSanXuat = hsx.MaHangSanXuat and hsx.MaHangSanXuat = $mahang and $giatien LIMIT 5";

                        $rs = load($query);



                              <div class="column">
                
                <a href="#"><img src="" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>
            <div class="column">
                <a href="#"><img src="assets/img/SamSung.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>
            <div class="column">
                <a href="#"><img src="assets/img/Nokia.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>
            <div class="column">
                <a href="#"><img src="assets/img/Oppo.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>
            <div class="column">
                <a href="#"><img src="assets/img/Huawei.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>
            <div class="column">

            </div>

        </div>
    </div>

    <div class="dropdown1">
        <button class="dropbtn">
            <a href="#"> Phân Khúc Cận Cao Cấp</a>

            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="column">
                <a href="#"><img src="assets/img/iPhone.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/SamSung.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Nokia.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Oppo.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Huawei.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
            </div>

        </div>
    </div>


    <div class="dropdown1">
        <button class="dropbtn">
            <a href="#"> Phân Khúc Tầm Trung </a>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="column">
                <a href="#"><img src="assets/img/iPhone.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/SamSung.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Nokia.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Oppo.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Huawei.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
            </div>

        </div>
    </div>







    <div class="dropdown1">
        <button class="dropbtn">
            <a href="#"> Phân Khúc Giá Rẻ </a>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="column">
                <a href="#"><img src="assets/img/iPhone.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/SamSung.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Nokia.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Oppo.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
                <a href="#"><img src="assets/img/Huawei.png" alt=""></a>

                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <a href="#">Link 4</a>
                <a href="#">Link 5</a>
            </div>

            <div class="column">
            </div>

        </div>
    </div>

