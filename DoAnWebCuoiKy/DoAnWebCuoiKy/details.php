
  <?php
  
  require_once "lib/db.php";
  
  if(!isset($_GET["idsanpham"]))
  {  
      header('Location: index.php');
  }
  $masp = $_GET["idsanpham"];
  
  $query = "SELECT mt.*,sp.*, l.*,h.*   FROM sanpham as sp , motasanpham as mt,hangsanxuat as h, loaisanpham as l
  where sp.MaSanPham = mt.MaSanPham  and  sp.MaLoaiSanPham = l.MaLoaiSanPham and sp.MaHangSanXuat = h.MaHangSanXuat
                      and sp.MaSanPham = $masp ";
  
  $rs = load($query);
  if($rs->num_rows <=0)
  {
      header('Location: index.php');
  }
  while($row = $rs->fetch_assoc())
  {
      $hinh = $row['HinhURL']; 
      $tensp= $row['TenSanPham']; 
      $gia= number_format($row['GiaSanPham']);

        $luongban = $row['SoLuongBan']; 
        $luotxem = $row['SoLuotXem']; 

      $manhinh = $row['ManHinh']; 
      $hedieuhanh= $row['HeDieuHanh'];
      $camerasau =  $row['CameraSau']; 
      $cameratruoc = $row['CameraTruoc']; 
      $cpu = $row['CPU']; 
      $ram=   $row['RAM']; 
      $bonhotrong=   $row['BoNhoTrong']; 
      $thesim =  $row['TheSim'];
      $dungluongpin = $row['DungLuongPin']; 
      $mota = $row['MoTa']; 
      $loaisp =  $row['MaLoaiSanPham'];
      $mahang =  $row['MaHangSanXuat']; 
      
      $tenloaisp =  $row['TenLoaiSanPham'];
      $tenhangsx =  $row['TenHangSanXuat']; 
        $xuatxu = $row['XuatXu'];
  }

  
  
  


  ?>

<!DOCTYPE html>
<html lang="vi">

<head>
<?php
include 'modules/include.php';
?>
   
    <title><?php echo  $tensp ?></title>
    

</head>

<body>
    <div class="container">
        <?php
        include 'modules/header.php';
        include 'modules/menu.php';
        ?>


       
      
            <div class="row" style="padding-top:40px">
                <div class="col-4 my-auto">

                    <div class="preview_image">
                        <div class="preview-small">
                            <img data-scale="2.4" id="zoom_03" src="  <?php echo  $hinh ?>" alt="Product name">
                          
                        </div>
                    </div>

                </div>

                <div class="col-8 border">
                    <h3 class="name" style="color:red;padding-top:20px;">
                    <?php echo  $tensp ?>
                    </h3>
                    <p>
                    
                        <h6>  <?php echo  $luongban ?>: Lượt mua │ <?php echo  $luotxem ?>: Lượt xem</h6>

                        <b style="font-size:14px; color:red;">
                        Xuất Xứ: </b> 
                        <b style="font-size:14px; color:blue;">
                        <?php echo  $xuatxu ?> |</b> 

                        <b style="font-size:14px; color:red;">
                        Loại Sản phẩm: </b> 
                        <b style="font-size:14px; color:blue;">
                        <?php echo  $tenloaisp ?> |</b> 

                        <b style="font-size:14px; color:red;">
                        Nhà Sản Xuất: </b> 
                        <b style="font-size:14px; color:blue;">
                        <?php echo  $tenhangsx ?>
                        </b>
                    </p>
                    <p style="font-size:15px;">
                    <?php echo  $mota ?>

                    </p>
                    <hr class="border">
                    <div class="price">
                        Giá :
                        <span class="new_price">
                        <?php echo  $gia ?>
                            <sup>₫
                            </sup>
                        </span>
                    </div>
                    <hr class="border">
                    <div class="wided">
                        <div class="qty">
                            Số Lượng: &nbsp;&nbsp;:
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <form action="#?idgiohang=<?php echo $row['MaSanPham']; ?>" method="POST" style="padding-top:20px;padding-bottom: 20px;">
                                            <button class="btn btn-giohang" type="submit">

                                                <i class="fa fa-search fa-fw"></i> Thêm vào giỏ

                                            </button>
                                        </form>
                        </div>


                    </div>

                </div>
            </div>

            <div class="row" style="padding-top:30px">

                <table class="table table-bordered">
                    <tbody>
                        <tr class="techSpecRow">
                            <th colspan="2">
                                <h3 style="color:red; font-weight:bold; font-style:italic"> Thông số kỹ thuật</h3>
                            </th>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Màn hình:</td>
                            <td class="techSpecTD2"><?php echo  $manhinh ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Hệ điều hành:</td>
                            <td class="techSpecTD2"><?php echo  $hedieuhanh ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Camera sau:</td>
                            <td class="techSpecTD2"><?php echo  $camerasau ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Camera trước:</td>
                            <td class="techSpecTD2"><?php echo  $cameratruoc ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">CPU:</td>
                            <td class="techSpecTD2"><?php echo  $cpu ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">RAM:</td>
                            <td class="techSpecTD2"><?php echo  $ram ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Bộ nhớ trong:</td>
                            <td class="techSpecTD2"><?php echo  $bonhotrong ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Thẻ Sim:</td>
                            <td class="techSpecTD2"><?php echo  $thesim ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Dung Lượng Pin</td>
                            <td class="techSpecTD2"><?php echo  $dungluongpin ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
               
        

<div class="row">
    <div class="col-md-12 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            <span style="color:red">
                
                <span style="font-size:30px">5 Sản phẩm </span>
            </span>cùng hãng
        </h3>

        <div id="Top5CungHang" class="carousel slide" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner ">
                <?php 
                
                $i = 0;
                $limit = 4;
                $flag = 0;
                $kichhoatactive = 'active';
                while ($i<6) 
                {
                    if($i == 4)
                    {
                        $limit = 1;
                    }
                    $query1 = "SELECT * FROM sanpham as sp  where  sp.MaHangSanXuat = $mahang  order by rand() LIMIT $limit  OFFSET $i ";
                    
                    $rs1 = load($query1);
                    
                ?>

                <div class="item  <?php if($flag ==0)  echo $kichhoatactive?>  carousel-item">
                    <div class="row">
                        <?php 
                    while($row1 = $rs1->fetch_assoc())
                    {
                        ?>

                        <div class="col-3 col-md-3 mb-4">
                            <div class="card h-1100">
                                <div class="preview_image">
                                    <a href="details.php?idsanpham=<?php echo $row1['MaSanPham']; ?>">
                                        <img class="card-img-top" src="<?php echo $row1['HinhURL']; ?>" alt="" />
                                    </a>

                                </div>

                                <div class="card-body">

                                    <h6 class="card-title">
                                        <a href="details.php?idsanpham=<?php echo $row1['MaSanPham']; ?>">
                                            <?php echo $row1['TenSanPham']; ?></a>
                                    </h6>

                                    <h5><b><?php echo number_format($row1['GiaSanPham']); ?> ₫</b></h5>
                                    <div style=" text-align: center;">
                                        <form action="#?idgiohang=<?php echo $row1['MaSanPham']; ?>" method="POST">
                                            <button class="btn btn-giohang" type="submit">

                                                <i class="fa fa-search fa-fw"></i> Thêm vào giỏ

                                            </button>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php $i = $i + 4; 
                          $flag = $flag +1;
                    ?>
                </div>
                <?php } ?>



            </div>


            <div style="text-align: center;padding-bottom:10px">
                <a href="#Top5CungHang" data-slide="prev">
                    <button class="btn btn-secondary leftLst"> <b>
                            <</b> </button> </a> <a href="#Top5CungHang" data-slide="next">
                                <button class="btn btn-secondary rightLst"><b>></b></button>

                </a>

            </div>


        </div>

    </div>


</div>


<div class="row">
    <div class="col-md-12 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            <span style="color:red">
                
                <span style="font-size:30px">5 Sản phẩm </span>
            </span>cùng loại phân khúc
        </h3>

        <div id="Top5CungLoai" class="carousel slide" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner ">
                <?php 
                
                $i = 0;
                $limit = 4;
                $flag = 0;
                $kichhoatactive = 'active';
                while ($i<6) 
                {
                    if($i == 4)
                    {
                        $limit = 1;
                    }
                    $query2 = "SELECT * FROM sanpham as sp  where  sp.MaLoaiSanPham = $loaisp  order by rand() LIMIT $limit  OFFSET $i ";
                    
                    $rs2 = load($query2);
                    
                ?>

                <div class="item  <?php if($flag ==0)  echo $kichhoatactive?>  carousel-item">
                    <div class="row">
                        <?php 
                    while($row2 = $rs2->fetch_assoc())
                    {
                        ?>

                        <div class="col-3 col-md-3 mb-4">
                            <div class="card h-1100">
                                <div class="preview_image">
                                    <a href="details.php?idsanpham=<?php echo $row2['MaSanPham']; ?>">
                                        <img class="card-img-top" src="<?php echo $row2['HinhURL']; ?>" alt="" />
                                    </a>

                                </div>

                                <div class="card-body">

                                    <h6 class="card-title">
                                        <a href="details.php?idsanpham=<?php echo $row2['MaSanPham']; ?>">
                                            <?php echo $row2['TenSanPham']; ?></a>
                                    </h6>

                                    <h5><b><?php echo number_format($row2['GiaSanPham']); ?> ₫</b></h5>
                                    <div style=" text-align: center;">
                                        <form action="#?idgiohang=<?php echo $row2['MaSanPham']; ?>" method="POST">
                                            <button class="btn btn-giohang" type="submit">

                                                <i class="fa fa-search fa-fw"></i> Thêm vào giỏ

                                            </button>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php $i = $i + 4; 
                          $flag = $flag +1;
                    ?>
                </div>
                <?php } ?>



            </div>


            <div style="text-align: center;padding-bottom:10px">
                <a href="#Top5CungLoai" data-slide="prev">
                    <button class="btn btn-secondary leftLst"> <b>
                            <</b> </button> </a> <a href="#Top5CungLoai" data-slide="next">
                                <button class="btn btn-secondary rightLst"><b>></b></button>

                </a>

            </div>


        </div>

    </div>


</div>



       
    </div>
    <?php
    include 'modules/footer.php';
    ?>
    <script src="/assets/js/theme-bundle.main.js"></script>
   
    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
   
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>

</body>

</html>

