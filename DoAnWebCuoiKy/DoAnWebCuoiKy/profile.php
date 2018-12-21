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
               
               <img id="blah" for="file" src="<?php echo $linkanh ?>" class="avatar img-circle img-thumbnail" alt="avatar">
               
               
								<div class="" >
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                          Choose File <input type="file" id="imgInp" name="file" style="display: none;">
                                       </span>
                                     </label>
									<input type="file" class="form-control" id="imgInp" name="file" hidden  >
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
                                        <div>
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

      <div class="row">
          
            <table id="example" cellspacing="0" class="table table-hover table-striped">
                                <thead class="thead-yellow" style="text-align:center">
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">Tên Loại Sản Phẩm</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $showlsp = "SELECT * FROM LoaiSanPham";
                                    $rslsp = load($showlsp);
                                    while($rowlspl = $rslsp->fetch_assoc())
                                    {
                                    ?>
                                    <tr style="text-align:center">
                                        <td>
                                            <?php echo $rowlspl['MaLoaiSanPham']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowlspl['TenLoaiSanPham']; ?>
                                        </td>

                                        <td>
                                            <?php if($rowlspl['BiXoa'] == '1')
                                                  {
                                                      echo "Đang Ẩn";
                                                  }
                                                  else
                                                  {
                                                      echo "Đang hiện";
                                                  }
                                            ?>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <a href="#edit<?php echo $rowlspl['MaLoaiSanPham'];?>" data-toggle="modal">
                                                    <button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <a href="#delete<?php echo $rowlspl['MaLoaiSanPham'];?>" data-toggle="modal">
                                                    <button class="btn btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </a>

                                            </p>
                                        </td>
                                    </tr>

                                      <!--        khúc này là popup thông báo xóa loại sản phẩm lên    -->

                              <div id="delete<?php echo $rowlspl['MaLoaiSanPham'];  ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post">
                                <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-header">
                                                <h4 class="modal-title">Xóa Sản Phẩm</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             
                                          </div>  
                                          <div class="modal-body">
                                            <input type="hidden" name="delete_id" value="<?php echo $rowlspl['MaLoaiSanPham']; ?>">
                                                <div class="alert alert-danger">Bạn có chắc muốn xóa sản phẩm 
                                                     <strong> <?php echo $rowlspl['TenLoaiSanPham']; ?>?</strong> 
                                                 </div>
                                          
                                         </div>

                                           <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Không</button>
                                        </div>
                                        </div>
                                   </form>
                              </div>
                             </div>
                                  <!--    kết thúc popup xóa loai sản phẩm-->

                                    
                                  <!--        khúc này là popup sửa loai sản phẩm  -->

                                <div id="edit<?php echo  $rowlspl['MaLoaiSanPham'];  ?>" class="modal fade" role="dialog">
                                    <form method="post" class="form-horizontal" role="form">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Sửa Loại Sản Phẩm</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>   
                                                </div>

                                                <div class="modal-body">
                                                       <input type="hidden" name="edit_id" value="<?php echo  $rowlspl['MaLoaiSanPham']; ?>">
                                                       <div class="row">
                                                          <div class="col-sm-6">
                                                              <label class="control-label" for="item_nameedit">Tên Loại Sản Phẩm:</label>
                                                              <input type="text" class="form-control" id="item_nameedit" name="item_nameedit" autofocus required  value="<?php echo $rowlspl['TenLoaiSanPham']  ?>"/>
                                                              <br />
                                           
                                                           </div>

                                                           <div class="col-sm-6">
                                           
                                                                <label class="control-label" for="tinhtrang">Tình Trạng:</label>
                                                                <select class="form-control" type="text" id="tinhtrang" name="tinhtrang" autofocus required>
                                                                    <option  <?php if($rowlspl['BiXoa']== 0) echo "selected"  ?>   value="0">Hiện</option>
                                                                    <option  <?php if($rowlspl['BiXoa']== 1) echo "selected"  ?>  value="1">Ẩn</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="update_item"><span class="glyphicon glyphicon-edit"></span>
                                                    Sửa</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>
                                                    Hủy</button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>



                                  <!--      kết thúc popup sửa loai sản phẩm  -->


                                    <?php }?>
                                </tbody>
                            </table>
          
          
           
      </div>
    </div>


    </form>
    <?php
    include 'modules/footer.php';
    ?>
    	<script type="text/javascript" >

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