<?php

    session_start();
    require_once '../lib/db.php';
    if(isset($_SESSION['username']) && $_SESSION['role'] == 1)
    {

    }
    else
    {
        header('Location: ../index.php');
    }
    if(isset($_POST['add_item'])){

        $tensp =  $_POST["item_name"];
        $ngaytao = $_POST["item_date"];
        $soluong  =  $_POST["item_sl"];
        $soluongban  =  $_POST["item_slb"];
        $giasp  =  $_POST["item_gia"];

        $luotxem  =  $_POST["item_view"];
        $hangsx  =  $_POST["item_hsx"];
        $loaisp  =  $_POST["item_lsp"]; 
        $mota =  $_POST["item_description"]; 
        $insertsanpham = "INSERT INTO SanPham (TenSanPham,GiaSanPham,NgayNhap,SoLuong,SoLuongBan,SoLuotXem,MoTa,MaLoaiSanPham,MaHangSanXuat,BiXoa)VALUES ('$tensp',$giasp,'$ngaytao',$soluong,$soluongban,$luotxem,'$mota',$loaisp,$hangsx,0)";
        $idong = write($insertsanpham);

        $insertidmotasanpham = "INSERT INTO MoTaSanPham (MaSanPham) VALUES ('$idong')";
        write($insertidmotasanpham);

        $destination = null;
        $f = $_FILES["file"];
	    if ($f["error"] > 0) {

	    } 
        else {
            if(!file_exists("../assets/img"))
            {
                mkdir("../assets/img");
            }
		
		    $tmp_name = $f["tmp_name"];
		    $name = $f["name"];
		    $destination = "../assets/img/";
            $destination=$destination.$_FILES["file"]["name"];

		    move_uploaded_file($tmp_name, $destination);
            $link = "assets/img/";
            $link=$link.$_FILES["file"]["name"];
            $update = "update SanPham set HinhURL = '$link' where MaSanPham = '$idong' ";

            write($update);

        
	    }
        $path = $_SERVER['REQUEST_URI'];
        header("Location: $path");
    
    }

    if(isset($_POST['update_thongso'])){
        $id = $_POST['item_id'];
        $manhinh = $_POST['manhinh'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $camtruoc = $_POST['camtruoc'];
        $camsau = $_POST['camsau'];
        $cpu = $_POST['cpu'];
        $ram = $_POST['ram'];
        $bonhotrong = $_POST['bonhotrong'];
        $thesim = $_POST['thesim'];
        $dungluongpin = $_POST['dungluongpin'];
        $xuatxu = $_POST['xuatxu'];

        $updatemota = "update MoTaSanPham set ManHinh = '$manhinh', HeDieuHanh = '$hedieuhanh', CameraTruoc = '$camtruoc', CameraSau = '$camsau', CPU = '$cpu', RAM = '$ram', BoNhoTrong = '$bonhotrong', TheSim = '$thesim', DungLuongPin = '$dungluongpin', XuatXu = '$xuatxu' where MaSanPham = '$id' ";

        write($updatemota);
        $path = $_SERVER['REQUEST_URI'];
        header("Location: $path");
    }

    if(isset($_POST['delete'])){
    
        $delete_id = $_POST['delete_id'];
        $deleteMoTa = "DELETE FROM MoTaSanPham WHERE MaSanPham='$delete_id' ";
        $deleteSanPham = "DELETE FROM SanPham WHERE MaSanPham='$delete_id' ";
        write($deleteMoTa);
        write($deleteSanPham);
        $path = $_SERVER['REQUEST_URI'];
        header("Location: $path");
    }

    if(isset($_POST['update_item'])){

        $idedit = $_POST['edit_id'];
        $tenspedit =  $_POST["item_nameedit"]; 
        $soluongedit  =  $_POST["item_sledit"];
        $giaspedit  =  $_POST["item_giaedit"];
        $hangsxedit  =  $_POST["item_hsxedit"];
        $loaispedit  =  $_POST["item_lspedit"]; 
        $motaedit =  $_POST["item_descriptionedit"]; 

        $destination = null;
        $f = $_FILES["fileedit"];
               $sdssdds =$f["size"];
	    if ($f["error"] > 0) 
        {
            $update = "update SanPham set TenSanPham = '$tenspedit',SoLuong ='$soluongedit', GiaSanPham = '$giaspedit', MaHangSanXuat = '$hangsxedit', MaLoaiSanPham = '$loaispedit', MoTa = '$motaedit' where MaSanPham = '$idedit' ";

            write($update);
	    } 
        else 
        {
            if(!file_exists("../assets/img"))
            {
                mkdir("../assets/img");
            }
		    $tmp_name = $f["tmp_name"];
		    $name = $f["name"];
		    $destination = "../assets/img/";
            $destination=$destination.$_FILES["fileedit"]["name"];

		    move_uploaded_file($tmp_name, $destination);
            $link = "assets/img/";
            $link=$link.$_FILES["fileedit"]["name"];
            $update = "update SanPham set HinhURL = '$link', TenSanPham = '$tenspedit',SoLuong ='$soluongedit', GiaSanPham = '$giaspedit', MaHangSanXuat = '$hangsxedit', MaLoaiSanPham = '$loaispedit', MoTa = '$motaedit' where MaSanPham = '$idedit' ";

            write($update);
	    }
        $path = $_SERVER['REQUEST_URI'];
        header("Location: $path");

    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />



        <title>Admin | Quản lý sản phẩm</title>

        <?php
        include 'modules/include.php';
        ?>

    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <?php
            include 'modules/header.php';
            include 'modules/sidebar.php';
            ?>

            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Quản lý sản phẩm </h1>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="card-body">
                            <a href="#add" data-toggle="modal">
                                <button type='button' class='btn btn-success btn-sm mb-2'>
                                    <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Thêm Sản Phẩm
                                </button>
                            </a>
                            <table id="example" cellspacing="0" class="table table-hover table-striped">
                                <thead class="thead-yellow" style="text-align:center">
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Tên Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Số Lượng Bán</th>
                                        <th scope="col">Lượt Xem</th>
                                        <th scope="col">Ngày Nhập</th>
                                        <th scope="col">Hãng</th>
                                        <!--<th scope="col">Tình Trạng</th>-->
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                         <th scope="col">Thông Tin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $rowsPerPage=10;
                                    $curPage=1;
                                    if(isset($_GET['page']))
                                        $curPage=$_GET['page'];
                                    $offset=($curPage-1)*$rowsPerPage;
                                    $showallsp = "SELECT *,hsx.TenHangSanXuat FROM SanPham as sp, hangsanxuat as hsx where sp.MaHangSanXuat = hsx.MaHangSanXuat order by sp.masanpham  LIMIT $offset,$rowsPerPage";

                                    $rsall = load($showallsp);

                                    while($rowall = $rsall->fetch_assoc())
                                    {

                                        // $id = $rowall['MaSanPham'];
                                        //$hinhanh = $rowall['HinhURL'];
                                        //$TenHienThi = $rowall['TenSanPham'];
                                        //$gia = $rowall['GiaSanPham'];
                                        //$slton = $rowall['SoLuongTon'];
                                        //$slban = $rowall['SoLuongBan'];
                                        //$luotxem = $rowall['SoLuotXem'];
                                        //$ngaynhap = $rowall['NgayNhap'];
                                        //$tinhdang = $rowall['BiXoa'];
                                        //$hang = $rowall['TenHangSanXuat'];


                                    ?>
                                    <tr style="text-align:center">
                                        <th scope="row">
                                            <?php echo $rowall['MaSanPham']; ?>
                                        </th>
                                        <td>
                                            <img src="../<?php echo $rowall['HinhURL']; ?>" class="img-size-100" />
                                        </td>
                                        <td>
                                            <?php echo $rowall['TenSanPham']; ?>

                                        </td>
                                        <td>
                                            <?php echo number_format($rowall['GiaSanPham']); ?>
                                        </td>
                                        <td>
                                            <?php echo $rowall['SoLuong']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowall['SoLuongBan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowall['SoLuotXem']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowall['NgayNhap']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowall['TenHangSanXuat']; ?>
                                        </td>
                                        <!--<td>
                                            <?php if($rowall['BiXoa'] == '1')
                                                  {
                                                      echo "Đang Ẩn";
                                                  }
                                                  else
                                                  {
                                                      echo "Đang hiện";
                                                  }
                                            ?>
                                        </td>-->
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                               <a href="#edit<?php echo $rowall['MaSanPham'];?>" data-toggle="modal">
                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                               </a>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                 <a href="#delete<?php echo $rowall['MaSanPham'];?>" data-toggle="modal">
                                                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                                </a>

                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Info">
                                              <a href="#info<?php echo $rowall['MaSanPham'];?>" data-toggle="modal">
                                                <button class="btn btn-success btn-xs" data-title="Info" data-toggle="modal" data-target="#Info">
                                                    <span class="glyphicon glyphicon-info-sign"></span>
                                                </button>
                                              </a>
                                            </p>
                                        </td>
                                    </tr>

                                <!--        khúc này là popup thông số kỹ thuật hiện lên    -->
                                     <div id="info<?php echo $rowall['MaSanPham']; ?>" class="modal fade" role="dialog">
                                         <form method="post" class="form-horizontal" role="form">
                                           <div class="modal-dialog modal-lg">
                                           <!-- Modal content-->
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Thông Số Sản Phẩm:     <?php echo $rowall['TenSanPham']; ?>  </h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="item_id" value="<?php echo $rowall['MaSanPham']; ?>">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <?php 
                                    
                                                                        $sqlthongso = "SELECT * FROM MotaSanPham where MaSanPham = '".$rowall['MaSanPham']."'";

                                                                        $rsthongso = load($sqlthongso);

                                                                        while($rowthongso = $rsthongso->fetch_assoc())
                                                                        {
                                        
                                                                            ?>
                                                                            <div class="col-sm-6">
                                                                                <label class="control-label" for="manhinh">Màn Hình</label>
                                                                                <input type="text" class="form-control" id="manhinh" name="manhinh" autofocus value="<?php echo $rowthongso["ManHinh"]?>" />
                                                                                <br />
                                                                                <label class="control-label" for="hedieuhanh">Hệ Điều Hành:</label>
                                                                                <input type="text" class="form-control" id="hedieuhanh" name="hedieuhanh"  value="<?php echo $rowthongso["HeDieuHanh"]?>" />
                                                                                <br />
                                                                                <label class="control-label" for="camtruoc">Camera Trước:</label>
                                                                                <input type="text" class="form-control" id="camtruoc" name="camtruoc" autofocus  autocomplete="off" value="<?php echo $rowthongso["CameraTruoc"]?>"  />
                                                                                <br />
                                                                                <label class="control-label" for="camsau">Camera Sau:</label>
                                                                                <input type="text" class="form-control" id="camsau" name="camsau" autofocus  value="<?php echo $rowthongso["CameraSau"]?>"/>
                                                                                <br />
                                                                                <label class="control-label" for="cpu">CPU:</label>
                                                                                <input type="text" class="form-control" id="cpu" name="cpu"  value="<?php echo $rowthongso["CPU"]?>" />
                                          
                                                                            </div>

                                                                            <div class="col-sm-6">
                                          
                                                                                <label class="control-label" for="ram">RAM:</label>
                                                                                <input type="text" class="form-control" id="ram" name="ram"  value="<?php echo $rowthongso["RAM"]?>" />
                                                                                <br />
                                                                                <label class="control-label" for="bonhotrong">Bộ Nhớ Trong:</label>
                                                                                <input type="text" class="form-control" id="bonhotrong" name="bonhotrong"   value="<?php echo $rowthongso["BoNhoTrong"]?>"/>
                                                                                <br />
                                                                                <label class="control-label" for="thesim">Thẻ Sim:</label>
                                                                                <input type="text" class="form-control" id="thesim" name="thesim" autofocus  value="<?php echo $rowthongso["TheSim"]?>"/>
                                                                                  <br />
                                                                                <label class="control-label" for="dungluongpin">Dung Lượng Pin:</label>
                                                                                <input type="text" class="form-control" id="dungluongpin" name="dungluongpin" autofocus  value="<?php echo $rowthongso["DungLuongPin"]?>"/>
                                                                                  <br />
                                                                                <label class="control-label" for="xuatxu">Xuất Sứ:</label>
                                                                                <input type="text" class="form-control" id="xuatxu" name="xuatxu" autofocus  value="<?php echo $rowthongso["XuatXu"]?>"/>

                                                                            </div>

                                                                            <?php } ?>
                                                                            </div>
                                                                        </div>      
                                                                    </div>
                                                             </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="update_thongso"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--    kết thúc popup thông tin-->


                                       <!--        khúc này là popup thông báo xóa sản phẩm lên    -->

                                  <div id="delete<?php echo $rowall['MaSanPham'];  ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <form method="post">
                                    <!-- Modal content-->
                                           <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Xóa Sản Phẩm</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>  
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" value="<?php echo $rowall['MaSanPham']; ?>">
                                                    <div class="alert alert-danger">Bạn có chắc muốn xóa sản phẩm 
                                                        <strong> <?php echo $rowall['TenSanPham']; ?>?</strong> 
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
                                      <!--    kết thúc popup xóa sản phẩm-->

                                      <!--        khúc này là popup sửa sản phẩm  -->

                                    <div id="edit<?php echo $rowall['MaSanPham']; ?>" class="modal fade" role="dialog">
                                        <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Sửa Sản Phẩm</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                                                    </div>
                                               
                                                    <div class="modal-body">
                                                        <input type="hidden" name="edit_id" value="<?php echo $rowall['MaSanPham']; ?>">
                                                        <div class="row">
                                                            <div class="col-sm-3" style="text-align:center">
                                                                <div>
                                                                    <img id="<?php echo "bla".$rowall['MaSanPham']; ?>"  src="../<?php echo $rowall['HinhURL']; ?>" class="img-size-150 blahedit" />
                                                                    <div style="margin-top:10px">
                                                                      <label class="input-group-btn">
                                                                          <span class="btn btn-primary">Chọn File Ảnh:
                                                                            <input type="file" id="<?php echo "img".$rowall['MaSanPham']; ?>" name="fileedit" class="imgInpedit" style="display: none;" />
                                                                          </span>
                                                                      </label>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                         <label class="control-label" for="item_nameedit">Tên Sản Phẩm:</label>
                                                                         <input type="text" class="form-control" id="item_nameedit" name="item_nameedit" value="<?php  echo $rowall['TenSanPham'];?>" required />
                                                                         <br />
                                                                         <label class="control-label" for="item_dateedit">Ngày Nhập:</label>
                                                                         <input type="text" class="form-control" id="item_dateedit" name="item_dateedit" readonly value="<?php echo $rowall['NgayNhap'];?>" />
                                                                         <br />
                                                                         <label class="control-label" for="item_sledit">Số Lượng:</label>
                                                                         <input type="number" class="form-control" id="item_sledit" name="item_sledit" autofocus  value="<?php echo $rowall['SoLuong'];?>" required />
                                                                         <br />
                                                                         <label class="control-label" for="item_lspedit">Loại Sản Phẩm:</label>
                                                                         <select class="form-control" type="text" id="item_lspedit" name="item_lspedit" autofocus >

                                                                         <?php 
                                                                            $demlsp = "SELECT * FROM LoaiSanPham where BiXoa = 0";
                                                                            $rslsp = load($demlsp);
                                                                            while($rowlsp = $rslsp->fetch_assoc())
                                                                            {
                                                                         ?>
                                                                         <option    <?php if($rowall['MaLoaiSanPham']== $rowlsp["MaLoaiSanPham"]) echo "selected"  ?>     value="<?php echo $rowlsp["MaLoaiSanPham"]?>"><?php  echo $rowlsp["TenLoaiSanPham"] ?></option>

                                                                        <?php  } ?>
                                                                        </select>
                                                                       </div>
                                                                       <div class="col-sm-6">
                                                                            <label class="control-label" for="item_giaedit">Giá Sản Phẩm:</label>
                                                                            <input type="number" class="form-control" id="item_giaedit" name="item_giaedit" required value="<?php echo $rowall['GiaSanPham'];?>" />
                                                                            <br />
                                                                            <label class="control-label" for="item_viewedit">Số Lượt Xem:</label>
                                                                            <input type="number" class="form-control" id="item_viewedit" name="item_viewedit" readonly value="<?php echo $rowall['SoLuotXem'];?>" />
                                                                            <br />
                                                                            <label class="control-label" for="item_slbedit">Số Lượng Bán:</label>
                                                                            <input type="number" class="form-control" id="item_slbedit" name="item_slbedit" readonly value="<?php echo $rowall['SoLuongBan'];?>" />
                                                                            <br />
                                                                            <label class="control-label" for="item_hsxedit">Hãng:</label>
                                                                            <select class="form-control" type="text" id="item_hsxedit" name="item_hsxedit" autofocus required>

                                                                             <?php 
                                                                                $demhangsx = "SELECT *  FROM HangSanXuat where BiXoa = 0";
                                                                                $rshsx = load($demhangsx);
                                                                                while($rowhsx = $rshsx->fetch_assoc())
                                                                                {                                                    
                                                                             ?>
                                                                            <option <?php if($rowall['MaHangSanXuat']== $rowhsx["MaHangSanXuat"]) echo "selected"      ?> value="<?php echo $rowhsx["MaHangSanXuat"]?>"><?php  echo $rowhsx["TenHangSanXuat"] ?></option>

                                                                             <?php  } ?>
                                                                            </select>
                                                                         </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="control-label" for="item_sub_category">Mô Tả:</label>
                                                                        <textarea class="form-control" id="item_descriptionedit" name="item_descriptionedit" autocomplete="off" required><?php echo $rowall['MoTa'];?></textarea>

                                                                    </div>
                                                               </div>
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
                                      <!--      kết thúc popup sửa sản phẩm  -->
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>


                            <div class="row">
                                <ul class="pagination mx-auto">

                                    <?php
                                    $demsp = "SELECT count( MaSanPham) as SLSP  FROM sanpham ";

                                    $rs3 = load($demsp);
                                    while($row3 = $rs3->fetch_assoc())
                                    {
                                        $soluongsp=$row3['SLSP'];
                                    }


                                    $sotrang=ceil($soluongsp/$rowsPerPage);
                                    ?>

                                    <?php
                                    if($curPage>1)
                                    {
                                    ?>
                                    <li class="page-item ">
                                        <a href="index.php?page=1" style="font-size:16px;">Đầu </a>
                                    </li>
                                    <li class="page-item ">
                                        <a href="index.php?page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                                    </li>
                                    <?php
                                    }
                                    for($page=1;$page<=$sotrang;$page++)
                                    {
                                        if($page==$curPage)//không hiện liên kết ở trang đang đứng
                                            echo "<li class='page-item active'>  <a style='font-size:16px;'> ".$page."</a> </li>";
                                        else
                                            echo " <li class='page-item'>
                                        <a href='index.php?page=".$page. "'style='font-size:16px;''>".$page. " </a></li>  ";
                                    }
                                    if($curPage<$sotrang)
                                    {
                                    ?>
                                    <li class='page-item'>
                                        <a href="index.php?page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                                    </li>
                                    <li class='page-item'>
                                        <a href="index.php?page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'modules/footer.php';
        ?>

               <!--        khúc này là popup thêm san phẩm    -->
        <div id="add" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" class="form-horizontal" role="form"  enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Sản Phẩm</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>

                        <div class="modal-body">
                       
                            <div class="row">
                                <div class="col-sm-3" style="text-align:center">

                                    <div>

                                        <img id="blah" for="file" src="img/Photo-icon.png" class="img-size-150" />

                                        <div style="margin-top:10px">
                                            <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Chọn File Ảnh:
                                                    <input type="file" id="imgInp" name="file" style="display: none;" />
                                                </span>
                                            </label>
                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <label class="control-label" for="item_name">Tên Sản Phẩm:</label>
                                                <input type="text" class="form-control" id="item_name" name="item_name" autofocus required />
                                                <br />
                                                <label class="control-label" for="item_date">Ngày Nhập:</label>
                                                <input type="text" class="form-control" id="item_date" name="item_date" readonly value="<?php  echo $today = date('Y-m-d H:i:s');?>" />
                                                <br />
                                                <label class="control-label" for="item_sl">Số Lượng:</label>
                                                <input type="number" class="form-control" id="item_sl" name="item_sl" autofocus  autocomplete="off" required />
                                                <br />
                                                 <label class="control-label" for="item_lsp">Loại Sản Phẩm:</label>
                                                <select class="form-control" type="text" id="item_lsp" name="item_lsp" autofocus required>

                                                    <?php 

                                                    $demlsp = "SELECT * FROM LoaiSanPham where BiXoa = 0";

                                                    $rslsp = load($demlsp);
                                                    while($rowlsp = $rslsp->fetch_assoc())
                                                    {
                                                    

                                                    ?>
                                                     <option value="<?php echo $rowlsp["MaLoaiSanPham"]?>"><?php  echo $rowlsp["TenLoaiSanPham"] ?></option>

                                                    <?php  } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label" for="item_gia">Giá Sản Phẩm:</label>
                                                <input type="number" class="form-control" id="item_gia" name="item_gia" required />
                                                <br />
                                                <label class="control-label" for="item_view">Số Lượt Xem:</label>
                                                <input type="number" class="form-control" id="item_view" name="item_view" readonly value="0" />
                                                <br />
                                                <label class="control-label" for="item_slb">Số Lượng Bán:</label>
                                                <input type="number" class="form-control" id="item_slb" name="item_slb" readonly value="0" />
                                                <br />
                                                <label class="control-label" for="item_hsx">Hãng:</label>
                                                <select class="form-control" type="text" id="item_hsx" name="item_hsx" autofocus required>

                                                    <?php 

                                                    $demhangsx = "SELECT *  FROM HangSanXuat where BiXoa = 0";

                                                    $rshsx = load($demhangsx);
                                                    while($rowhsx = $rshsx->fetch_assoc())
                                                    {
                                                    
                                                    

                                                    ?>
                                                     <option value="<?php echo $rowhsx["MaHangSanXuat"]?>"><?php  echo $rowhsx["TenHangSanXuat"] ?></option>

                                                    <?php  } ?>
                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="item_sub_category">Mô Tả:</label>

                                            <textarea class="form-control" id="item_description" name="item_description" autocomplete="off" required></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="add_item">
                                <span class="glyphicon glyphicon-plus"></span> Thêm
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove-circle"></span> Hủy
                            </button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--         kết thúc  thêm san phẩm    -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/adminlte.js"></script>

        <script src="js/Chart.min.js"></script>

        <script src="js/dashboard3.js"></script>
        <script>

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
        </script>
    </body>
</html>
