<?php
session_start();

require_once 'lib/db.php';

if(isset($_POST['delete'])){

    $madondathangdelete = $_POST['delete_id'];

    $laysoluongsanphammua = "SELECT SoLuongSanPhamMua,MaSanPham FROM ChiTietDonHang where MaDonDatHang = '$madondathangdelete'";
    $rssoluong = load($laysoluongsanphammua);
    while($rowsoluong = $rssoluong->fetch_assoc())
    {
        $soluongsanphammua =$rowsoluong['SoLuongSanPhamMua'];
        $maSanPham =$rowsoluong['MaSanPham'];

        $laysoluongsanphambanduoc = "SELECT SoLuongBan FROM SanPham where MaSanPham = '$maSanPham'";
        $rssoluongban = load($laysoluongsanphambanduoc);
        while($rowsoluongban = $rssoluongban->fetch_assoc())
        {
            $soluongban =$rowsoluongban['SoLuongBan'];
        }
        $soluongban = $soluongban -$soluongsanphammua;
        $updatesoluongban = "Update SanPham set SoLuongBan = $soluongban  where MaSanPham = '$maSanPham'";
        write($updatesoluongban);
    }


    $soluongbansanpham = $soluongbansanpham +$soluongsanpham;
    $deletebangchitietdonhang = "delete from ChiTietDonHang where MaDonDatHang = '$madondathangdelete' ";

    write($deletebangchitietdonhang);


    $deletebangdondathang = "delete from DonDatHang where MaDonDatHang = '$madondathangdelete' ";

    write($deletebangdondathang);

    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");


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

      
            <div class="content-wrapper" style="margin-top:30px">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3 class="m-0" style="color:red;"> Lịch Sử Mua Hàng</h3>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>


                <div class="content">
                    <div class="container-fluid">
                        <div class="card-body">

                            <table id="example" cellspacing="0" class="table table-hover">
                                <thead class="thead-yellow" style="text-align:center">
                                    <tr>
                                        <th scope="col"> Mã Đơn Đặt Hàng</th>
                                      
                                        <th scope="col"> Tên Người Đặt</th>
                                        <th scope="col"> Địa Chỉ</th>
                                        <th scope="col">Ngày Lập</th>
                                        <th scope="col">Tổng Tiền</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Chi Tiết Đơn Hàng</th>
                                        <th scope="col"> Hủy Đơn Đặt Hàng</th>
                                    </tr>
                                </thead>

                                <?php
                                $mataikhoan = $_SESSION['MaTaiKhoan'];
                                $showlsp = "select ddh.MaDonDatHang,ddh.NgayLap,ddh.TongThanhTien,ddh.MaTaiKhoan,tk.TenHienThi,tt.TenTinhTrang,tk.DiaChi from taikhoan as tk, dondathang as ddh, tinhtrang as tt
where tk.MaTaiKhoan = ddh.MaTaiKhoan and ddh.MaTinhTrang = tt.MaTinhTrang  and ddh.MaTaiKhoan= '$mataikhoan'  ORDER BY NgayLap DESC";
                                $rslsp = load($showlsp);
                                while($rowlspl = $rslsp->fetch_assoc())
                                {
                                ?>
                                <tr style="text-align:center; <?php if($rowlspl['TenTinhTrang'] == "Đã Giao") echo "background-color: #0eff00a8;" ?>">
                                    <td>
                                        <?php echo $rowlspl['MaDonDatHang']; ?>
                                    </td>
                                  

                                    <td>
                                        <?php echo $rowlspl['TenHienThi']; ?>
                                    </td>

                                    <td>
                                        <?php echo $rowlspl['DiaChi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowlspl['NgayLap']; ?>
                                    </td>
                                    <td style="color:red;font-weight:bold">
                                        <?php echo  number_format($rowlspl['TongThanhTien']); ?> đồng
                                    </td>
                                    <td>
                                        <?php echo $rowlspl['TenTinhTrang']; ?>         
                                    
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Info"  style="margin:auto">
                                            <a href="#info<?php echo $rowlspl['MaDonDatHang'];?>" data-toggle="modal">
                                                <button class="btn btn-success btn-xs" data-title="Info" data-toggle="modal" data-target="#Info">
                                                    <span class="glyphicon glyphicon-info-sign"></span>
                                                </button>
                                            </a>
                                        </p>
                                    </td>
                                    <td>
                                        <?php 
                                        if($rowlspl['TenTinhTrang'] == "Đang Xử Lý")
                                        {
                                         ?>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete" style="margin:auto">
                                            <a href="#delete<?php echo $rowlspl['MaDonDatHang'];?>" data-toggle="modal">
                                                <button class="btn btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>

                                        </p>
                                        <?php }
                                        else
                                        {
                                            echo "  Không Thể Hủy Đơn Hàng";    
                                        }
                                        ?>
                                      
                                      
                                    </td>
                                </tr>






                                <!--        khúc này là popup thông báo xóa loại sản phẩm lên    -->

                                <div id="delete<?php echo $rowlspl['MaDonDatHang'];  ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <form method="post">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Xóa Sản Phẩm</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" value="<?php echo $rowlspl['MaDonDatHang']; ?>" />
                                                    <div class="alert alert-danger">
                                                        Bạn có chắc muốn xóa sản phẩm
                                                        <strong>
                                                            <?php echo $rowlspl['MaDonDatHang']; ?>?
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
                                <!--    kết thúc popup xóa loai sản phẩm-->

                      



                                <?php }?>

                            </table>
                        </div>

                    </div>
                </div>

            </div>


    </div>
    <?php   include 'modules/footer.php'; ?>


    <?php
    $ganid = "select * from dondathang  ";
    $rsganid = load($ganid);
    while($rowganid = $rsganid->fetch_assoc())
    {
    ?>
    <!--        khúc này là popup chi tiết đơn hàng    -->

    <div id="info<?php echo $rowganid['MaDonDatHang'];  ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form method="post">
                <!-- Modal content-->
                <div class="modal-content" style="width:150% !important;">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Chi Tiết Đơn Hàng: <?php echo $rowganid['MaDonDatHang'];  ?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <table id="example" cellspacing="0" class="table table-hover table-striped">
                            <thead class="thead-yellow" style="text-align:center">
                                <tr>
                                  
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col"> Giá Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Đơn Giá</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $madondathang = $rowganid["MaDonDatHang"];
        $chitetdonhang = "select *, sp.TenSanPham,sp.GiaSanPham from chitietdonhang as ctdh, sanpham as sp where MaDonDatHang = '$madondathang' and sp.MaSanPham = ctdh.MaSanPham ";
        $rschitietdonhang = load($chitetdonhang);
        while($rowchitietdonhang = $rschitietdonhang->fetch_assoc())
        {
                                ?>
                                <tr style="text-align:center">
                                   
                                    <td scope="col">
                                        <?php echo $rowchitietdonhang["TenSanPham"];?>
                                    </td>
                                    <td scope="col">
                                        <?php echo  number_format($rowchitietdonhang["GiaSanPham"]);?>
                                    </td>
                                    <td scope="col">
                                        <?php echo $rowchitietdonhang["SoLuongSanPhamMua"];?>
                                    </td>
                                    <td scope="col" style="color:red;font-weight:bold">
                                        <?php echo  number_format($rowchitietdonhang["SoLuongSanPhamMua"]* $rowchitietdonhang["GiaSanPham"]);?>
                                    </td>

                                </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </form>
        </div>
    </div>


    <!--    kết thúc popup  chi tiết đơn hàng-->
    <?php }?>
    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>

</body>

</html>