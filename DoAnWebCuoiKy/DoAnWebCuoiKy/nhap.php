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


if(isset($_POST["btnSaveProfile"]))
{
    $tenhienthi =  $_POST["tennguoidung"];
    $diachi = $_POST["diachi"];
    $sdt  =  $_POST["sodienthoai"];
    $email  =  $_POST["email"];

    $destination = null;
    $f = $_FILES["file"];
	if ($f["error"] > 0) {

	} else {
        if(!file_exists("assets/img/ava/$user"))
        {
            mkdir("assets/img/ava/$user");
        }
		

		
		$tmp_name = $f["tmp_name"];
		$name = $f["name"];
		$destination = "assets/img/ava/$user/";
        $destination=$destination.$_FILES["file"]["name"];

		move_uploaded_file($tmp_name, $destination);
	}
    
    $updateprofile = "update taikhoan set TenHienThi = '$tenhienthi', DiaChi = '$diachi', SoDienThoai = '$sdt', Email = '$email', HinhDaiDien = '$destination' where TenDangNhap = '$user' ";

    write($updateprofile);

    // echo "<meta http-equiv='refresh' content='0.1'>";
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
               
               <img id="blah" for="file" src="<?php echo $linkanh ?>" class="avatar img-circle img-thumbnail" alt="avatar">
               
               
								<div class="col-sm-10">
									<input type="file" class="form-control" id="imgInp" name="file">
								</div>
                <!--<input type="file" class="text-center center-block file-upload">-->
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
                                            <input  id="tennguoidung" name="tennguoidung" type="text" class="form-control" placeholder="Họ Tên *" value="<?php  echo $tenhienthi ?>"  />
                                        </div>
                                        <div class="form-group">
                                            <input  id="diachi" name="diachi" type="text" class="form-control" placeholder="Địa Chỉ *" value="<?php  echo $diachi; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input  id="sodienthoai" name="sodienthoai" type="text" class="form-control" placeholder="Số Di Động *" value="<?php  echo $sdt; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input  id="email" name="email" type="text" class="form-control"  placeholder="Email *" value="<?php  echo $email; ?>" />
                                        </div>
                                        <div >
                                       <input type="submit" class="btnSaveProfile text-center" name="btnSaveProfile"  id="btnSaveProfile" value="Lưu Thông Tin"/>

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
    <script src="/assets/js/theme-bundle.main.js"></script>
   	<script src="assets/js/upload.js"></script>


   
</body>

</html>






if(isset($_POST['add_item'])){

    $tenloaisp =  $_POST["item_name"];
    
    $tinhtrang  =  $_POST["tinhtrang"]; 
    $insertloaisanpham = "INSERT INTO LoaiSanPham (TenLoaiSanPham,BiXoa) VALUES ('$tenloaisp',$tinhtrang)";
    write($insertloaisanpham);

    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
    
}
if(isset($_POST['delete'])){
    
    $delete_id = $_POST['delete_id'];
    
    $deleteloaiSanPham = "DELETE FROM LoaiSanPham WHERE MaLoaiSanPham='$delete_id' ";
    write($deleteloaiSanPham);
    
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
}
if(isset($_POST['update_item'])){

    $idedit = $_POST['edit_id'];
    $tenspedit =  $_POST["item_nameedit"]; 
    $tinhtrang  =  $_POST["tinhtrang"];
    

    $update = "update LoaiSanPham set TenLoaiSanPham = '$tenspedit' , BiXoa = $tinhtrang where MaLoaiSanPham = '$idedit' ";
    write($update);

    
	
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");

    
    
}





<script>
                                     function readURL1(input) {

                                    if (input.files && input.files[0]) {
                                  var reader = new FileReader();

                                  reader.onload = function (e) {

                                    $(<?php echo "'#bla".$rowall['MaSanPham']."'"; ?>).attr('src', e.target.result);
                                     }

                                    reader.readAsDataURL(input.files[0]);
                                    }
                                     }

                                    
                                  $(<?php echo "'#img".$rowall['MaSanPham']."'"; ?>).change(function () {
                                readURL1(this);
                                    });
                                </script>
           
=----------
 action="#idgiohang=<?php echo $row['MaSanPham']; ?>"


  echo "<pre>";
            print_r($_SESSION['cart']);
            echo "</pre>";