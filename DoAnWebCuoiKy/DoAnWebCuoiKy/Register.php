<?php
session_start();
require_once 'lib/db.php';
require_once 'vendor/autoload.php';

use Gregwar\Captcha\CaptchaBuilder;

if (isset($_SESSION["dang_nhap_chua"])) {

    header('Location: index.php');
}

if (isset($_POST["txtUserInput"])) {


    $hoten = $_POST["txthoten"];
    $ten = $_POST["txtUsername"];
    $ten =  strtolower($ten);
    $mk = $_POST["txtPWD"];
    $password = md5($mk);
    $today = date('Y-m-d H:i:s');
    $insertqr = "insert taikhoan(TenDangNhap,MatKhau,TenHienThi,MaLoaiTaiKhoan,NgayTao) values('".$ten."','".$password."','".$hoten."','0','".$today."')";
    write($insertqr);


    $_SESSION['username'] = $ten;
    $_SESSION['role'] = 0;

    $_SESSION["dang_nhap_chua"] = 1;
    $_SESSION['TenHienThi'] =$hoten;
    header('Location: index.php');


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
        <div class="container register">
            <div class="row">

                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Chào Mừng Bạn</h3>
                    <p>Rinh ngay quà HOT khi mua sản phẩm. </p>
                    <a href="login.php">
                        <input type="submit" value="Đăng Nhập" />
                    </a>
                </div>
                <div class="col-md-9 register-right">

                    <form id="f" method="POST" action="Register.php">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Đăng Ký Tài Khoản</h3>
                                <div class="row register-form">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">


                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Họ Và Tên *" value=""
                                                id="txthoten" name="txthoten" required/ />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="txtUsername" name="txtUsername"
                                                placeholder="Tên Đăng Nhập *" value="" required />
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Mật Khẩu *" value=""
                                                id="txtPWD" name="txtPWD" required/ />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu *"
                                                value="" id="txtPWD2" name="txtPWD2" required/ />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="txtUserInput" name="txtUserInput"
                                                placeholder="Captcha*" required />
                                        </div>

                                        <div class="form-group">
                                            <?php
                                            $builder = new CaptchaBuilder;
                                            $builder->build();
                                            $_SESSION["captcha"] = $builder->getPhrase();
                                            ?>
                                            <img src="<?= $builder->inline() ?>" alt="captcha" />
                                        </div>


                                        <b class="error" style="font-size:19px; padding-top:20px;color:red;display:none;"></b>
                                        <button type="submit" class="btnRegister" id="btnRegister" name="btnRegister">
                                            Đăng
                                            Ký
                                        </button>
                                    </div>



                                    <div class="col-md-2"></div>


                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <?php
    include 'modules/footer.php';
    ?>
    <script src="/assets/js/theme-bundle.main.js"></script>


    <script type="text/javascript">
        $('#f').on('submit', function (e) {

            e.preventDefault();

            var form = this;

            var username = $('#txtUsername').val();


            var pw = $('#txtPWD').val();
            var pw2 = $('#txtPWD2').val();
            if (pw != pw2) {
                $('.error').show();
                $('.error').html('Mật khẩu và Mật khẩu xác nhận không khớp');
                //   alert('Mật khẩu và Mật khẩu xác nhận không khớp');
                return;
            }

            var url = 'api/user_check.php?user=' + username;
            //   $.ajax({
            //           url: url,
            //           method: 'GET',
            //           data: {
            //             user: username

            //           },
            //           // neu post thanh cong
            //           success: function(result){
            //             if (result === 1) {
            //                     alert('existed');
            //                 } else {
            //                     alert('dang ki thanh cong');
            //                 }
            //           }
            //       });

            $.getJSON(url, function (data) {


                if (data === 1) {

                    $('.error').show();
                    $('.error').html('Tên Đăng Nhập Đã Tồn Tại');
                    //alert();
                } else {
                    var cap1 = $('#txtUserInput').val();
                    var cap2 = '<?php echo $_SESSION["captcha"]?>';

                    if (cap1 != cap2) {
                        $('.error').show();
                        $('.error').html('Captcha sai');

                    } else {
                        form.submit();
                    }

                }
            });

        });
    </script>

</body>

</html>