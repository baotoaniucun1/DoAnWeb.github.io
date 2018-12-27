<?php

session_start();
require_once 'lib/db.php';
if(!isset($_GET["user"]))
{  
    header('Location: index.php');
}
$user = $_GET["user"];



if (!isset($_SESSION["dang_nhap_chua"])) {

    header('Location: index.php');
}

$profile = "SELECT * FROM taikhoan WHERE TenDangNhap = '$user'";

$rsprofile = load($profile);
while($rowpro = $rsprofile->fetch_assoc())
{
    $linkanh = $rowpro['HinhDaiDien'];
    $tenhienthi =  $rowpro['TenHienThi'];
    $diachi = $rowpro['DiaChi'];
    $sdt  =  $rowpro['SoDienThoai'];
    $email  =  $rowpro['Email'];
}
if(isset($_POST["tennguoidung"]))
{
    $tenhienthi =  $_POST["tennguoidung"];


    $_SESSION['TenHienThi'] = $tenhienthi;
    $diachi = $_POST["diachi"];
    $sdt  =  $_POST["sodienthoai"];
    $email  =  $_POST["email"];



    $updateprofile = "update taikhoan set TenHienThi = '$tenhienthi', DiaChi = '$diachi', SoDienThoai = '$sdt', Email = '$email' where TenDangNhap = '$user' ";

    write($updateprofile);
}





?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <title>Thông Tin Cá Nhân</title>
    <?php
    include 'modules/include.php';
    ?>

</head>

<body>
    <div class="container">
        <?php
        include 'modules/header.php';
        include 'modules/menu.php';
        ?>


        <div class="row">

            <div class="col">
                <h1 style="color:red; margin-top:20px;margin-bottom:20px;">Thông Tin Cá Nhân</h1>
            </div>

        </div>
        <form id="edit" method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-1"> </div>
                <div class="col-sm-3">

                    <div class="text-center">

                        <img id="blah" for="file" src="<?php echo $linkanh ?>" class="avatar img-circle img-thumbnail"
                            alt="avatar">


                        <div class="">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Choose File <input type="file" id="imgInp" name="file" style="display: none;">
                                </span>
                            </label>
                            <input type="file" class="form-control" id="imgInp" name="file" hidden>
                        </div>


                    </div>
                    </hr><br>


                </div>
                <!--/col-3-->
                <div class="col-sm-8">

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row register-form">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input id="tennguoidung" name="tennguoidung" type="text" class="form-control"
                                            placeholder="Họ Tên *" value="<?php  echo $tenhienthi ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input id="diachi" name="diachi" type="text" class="form-control" placeholder="Địa Chỉ *"
                                            value="<?php  echo $diachi; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input id="sodienthoai" name="sodienthoai" type="text" class="form-control"
                                            placeholder="Số Di Động *" value="<?php  echo $sdt; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email *"
                                            value="<?php  echo $email; ?>" />
                                    </div>
                                    <div>
                                        <input type="submit" class="btnSaveProfile text-center" name="btnSaveProfile"
                                            id="btnSaveProfile" value="Lưu Thông Tin" />

                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>


                            </div>
                        </div>
                    </div>


                </div>


            </div>


    </div>


    </form>
    <?php
    include 'modules/footer.php';
    ?>
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        //const url = window.location.pathname;

        //  const form = document.querySelector('form');
        $('#edit').on('submit', function (e) {
            e.preventDefault();
            var url = '../../process.php?user=';
            var form = this;
            var user = GetURLParameter('user');

            console.log(user);
            console.log(url);
            var ulrok = url + user;
            console.log(ulrok);
            const files = document.querySelector('[type=file]').files;
            //var urlweb = window.location.pathname;

            const formData = new FormData();

            console.log(files.length);

            for (let i = 0; i < files.length; i++) {
                let file = files[i];

                formData.append('files[]', file);
            }

            fetch(ulrok, {
                method: 'POST',
                body: formData
            }).then(response => {
                console.log(response);

            });
            form.submit();

        });

        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam) {
                    return sParameterName[1];
                }
            }
        }
    </script>
    <script src="assets/js/theme-bundle.main.js"></script>




</body>

</html>