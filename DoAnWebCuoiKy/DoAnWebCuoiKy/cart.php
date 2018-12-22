<?php
session_start();

require_once 'lib/db.php';

if(!isset($_SESSION['username']))
{
    header('Location: Login.php');
}

if(isset($_POST['update_item'])){

    $idedit = $_POST['edit_id'];
    $soluongedit  =  $_POST["item_sluongsp"];
    $_SESSION['cart'][$idedit]['SoLuong'] = $soluongedit;
    $_SESSION['cart'][$idedit]['ThanhTien'] = $_SESSION['cart'][$idedit]['SoLuong'] * $_SESSION['cart'][$idedit]['Gia'];

}


if(isset($_POST['delete'])){
    
    $delete_id = $_POST['delete_id']; 
    unset( $_SESSION['cart'][$delete_id]);
    
}

if(isset($_POST['dongythanhtoan'])){
    
    $sql = "SELECT max(MaDonDatHang) as MaMax FROM dondathang"; 
    $rs = load($sql);
    while($row = $rs->fetch_assoc())
    {
        $mamax =$row['MaMax'];
    }
    $tang = substr($mamax,6);
    $tang += 1;
    $madondathangmoi = "MDDH00".$tang;

     $cart = $_SESSION['cart'];
     $tongtien =0;
     foreach($cart as $value)
     {
         $tongtien += $value['ThanhTien'];
     }
     $mataikhoan = $_SESSION['MaTaiKhoan'];
     $today = date('Y-m-d H:i:s');

     $sqlthemdondathang = "INSERT INTO dondathang(MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang) VALUES('$madondathangmoi','$today',$tongtien,$mataikhoan,0)"; 
     write($sqlthemdondathang);
     foreach($cart as $value)
     {
        


         $soluongsanpham = $value['SoLuong'];
         $giaban = $value['Gia'];
         $masanphammua = $value['MaSanPham'];

         $laysoluongsanphambanduoc = "SELECT SoLuongBan FROM SanPham where MaSanPham = '$masanphammua'"; 
         $rssoluong = load($laysoluongsanphambanduoc);
         while($rowsoluong = $rssoluong->fetch_assoc())
         {
             $soluongbansanpham =$rowsoluong['SoLuongBan'];
         }
         $soluongbansanpham = $soluongbansanpham +$soluongsanpham;

         $updatesoluongban = "Update SanPham set SoLuongBan = $soluongbansanpham  where MaSanPham = '$masanphammua'"; 
         write($updatesoluongban);


         $sqlchitietcuadonhangtren = "INSERT INTO ChiTietDonHang(SoLuongSanPhamMua,GiaBan,MaDonDatHang,MaSanPham) VALUES($soluongsanpham,$giaban,'$madondathangmoi',$masanphammua)"; 
         write($sqlchitietcuadonhangtren);
     }

     unset($_SESSION['cart']);
     header('Location: cart.php');
}


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include 'modules/include.php';
    ?>
    <title>Chíc Chòe Shop</title>
</head>

<body>

    <div class="container">


        <?php
        include 'modules/header.php';
        include 'modules/menu.php';
        ?>

        <div class="col-md-12 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom" style="padding-top:10px">
                <span style="color:red">
                    Giỏ Hàng Của Tôi
                </span>
            </h3>

            <?php
            if (isset($_SESSION['cart']))
            {



            ?>
            <table id="example" cellspacing="0" class="table table-hover">
                <thead class="thead-yellow" style="text-align:center">


                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>

                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>


                    </tr>


                </thead>
                <tbody>

                    <?php $cart = $_SESSION['cart'];
                          $demsl = 0;
                          $stt = 1;
                          $tongtien =0;
                          foreach($cart as $value): ?>
                    <tr style="text-align:center;">
                        <td>
                            <?php echo $stt; $stt+=1; ?>
                        </td>
                        <td>
                            <img src="../<?php echo $value['HinhURL']; ?>" class="img-size-100" />
                        </td>
                        <td>
                            <?php echo  $value['TenSanPham'];  ?>
                        </td>
                        <td>
                            <?php echo  number_format($value['Gia']);  ?> đ

                        </td>
                        <td>
                            <?php echo $value['SoLuong'];
                                  $demsl += $value['SoLuong'];
                            ?>
                        </td>
                        <td>
                            <?php echo  number_format($value['ThanhTien']);
                                  $tongtien += $value['ThanhTien'];
                            ?> đ
                        </td>

                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                <a href="#edit<?php echo $value['MaSanPham'];?>" data-toggle="modal">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                </a>
                            </p>
                        </td>

                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <a href="#delete<?php echo $value['MaSanPham'];?>" data-toggle="modal">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </a>

                            </p>
                        </td>

                    </tr>
                    

            <!--        khúc này là popup thông báo xóa sản phẩm lên    -->

            <div id="delete<?php echo $value['MaSanPham'];  ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="post">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Xóa Sản Phẩm</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" value="<?php echo $value['MaSanPham']; ?>" />
                                <div class="alert alert-danger">
                                    Bạn có chắc muốn xóa sản phẩm
                                    <strong>
                                        <?php echo $value['TenSanPham']; ?>?
                                    </strong>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove-circle"></span> Không
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--    kết thúc popup xóa sản phẩm-->



            <!--        khúc này là popup sửa sản phẩm  -->

            <div id="edit<?php echo $value['MaSanPham']; ?>" class="modal fade" role="dialog">
                <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa Sản Phẩm</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="edit_id" value="<?php echo $value['MaSanPham']; ?>" />
                                <div class="row">
                                      <div class="col-md-12">
                                      <select class="form-control" type="text" id="item_sluongsp" name="item_sluongsp" autofocus >
                                    <?php 
                              $i =1;
                              while($i<= 10)
                              {
                                    ?>     
                                           <option <?php  if($value['SoLuong']==$i) echo "selected"?> value="<?php echo $i;?>"><?php echo $i;?></option>  
                                          
                                    <?php 
                                  
                                  $i +=1;   
                              } 
                                    ?> 
                                    </select>
                                          </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="update_item">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Sửa
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                    Hủy
                                </button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>



            <!--      kết thúc popup sửa sản phẩm  -->

                    <?php endforeach ?>

                    <tr style="background:#00ff90;font-weight:bold  ">

                        <td colspan="4" style="color:red;font-weight:bold;text-align:right;">
                            Tổng:
                        </td>
                        <td style="text-align:center;">
                            <?php  echo $demsl;?>
                        </td>
                        <td style="text-align:center;">
                            <?php  echo number_format($tongtien);?> đ

                        </td>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;"></td>
                    </tr>
                </tbody>
            </table>

            <div id="edit" style="text-align:center;margin-bottom:30px">
        
              <a href="#thanhtoan" data-toggle="modal">
                 <button style="font-weight:bold" class="btn btn-warning btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                             Thanh Toán</button>
                   </a>
            </div> 
           
            <?php




            }

            else
            {

                echo "  <h3> Chưa có sản phẩm trong giỏ hàng</h3>";
            }
            ?>
        </div>

              <!--        khúc này là popup hỏi thanh toán    -->

            <div id="thanhtoan" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="post">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thanh Toán</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                             
                                <div class="alert alert-success">
                                  
                                    <strong>
                                       Bạn có chắc muốn Thanh Toán ?
                                    </strong>
                                       <?php    $taikhoan = $_SESSION['username'];
                                                $sqldiachi = "SELECT * FROM TaiKhoan where TenDangNhap = '$taikhoan'"; 
                                               $rsdiachi = load($sqldiachi);
                                               while($rowdiachi = $rsdiachi->fetch_assoc())
                                               {?>

                                            <p> Địa chỉ: <?php echo $rowdiachi['DiaChi'];?> <br />
                                                 Số Điện Thoại: <?php  echo $rowdiachi['SoDienThoai']; ?>

                                            
                                                  </p>
                                        <?php }?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="dongythanhtoan" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span> Đống Ý
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove-circle"></span> Không
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--    kết thúc popup hỏi thanh toán-->





    </div>
    <?php   include 'modules/footer.php'; ?>


    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>

</body>

</html>