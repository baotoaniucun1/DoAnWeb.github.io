<?php
session_start();

require_once "lib/db.php";

if((!isset($_GET["maloai"])) && (!isset($_GET["mahangsx"])))
{
    header('Location: index.php');
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

        <div class="row">

            <div class="col-md-12 blog-main">
                <?php
                if(isset($_GET["maloai"]))
                {
                    $maloai = $_GET["maloai"];
                    $query1 = "SELECT * FROM loaisanpham  where  MaLoaiSanPham =  $maloai";

                    $rs1 = load($query1);
                    if($rs1->num_rows <=0)
                    {
                        header('Location: index.php');
                    }

                    while($row1 = $rs1->fetch_assoc())
                    {
                ?>

                <h3 class="pb-3 mb-4 font-italic border-bottom" style=" padding-top:20px;">
                    <span style="color:red;">
                        <?php echo $row1['TenLoaiSanPham']; ?>
                    </span>
                </h3>
                <?php }?>

                <div class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">


                        <div class="item active carousel-item">
                            <div class="row">
                                <?php


                    $rowsPerPage=8;
                    $curPage=1;
                    if(isset($_GET['page']))
                        $curPage=$_GET['page'];
                    $offset=($curPage-1)*$rowsPerPage;



                    $query = "SELECT * FROM sanpham as sp  where  sp.MaLoaiSanPham =  $maloai  order by sp.GiaSanPham  LIMIT $offset,$rowsPerPage";

                    $rs = load($query);
                    if($rs->num_rows <=0)
                    {
                        header('Location: index.php');
                    }




                    while($row = $rs->fetch_assoc())
                    {
                                ?>

                                <div class="col-3 col-md-3 mb-4">
                                    <div class="card h-1100">
                                        <div class="preview_image">
                                            <a href="details.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                <img class="card-img-top" src="<?php echo $row['HinhURL']; ?>" alt="" />
                                            </a>

                                        </div>
                                        <div class="card-body">

                                            <h6 class="card-title">
                                                <a href="details.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                    <?php echo $row['TenSanPham']; ?>
                                                </a>
                                            </h6>

                                            <h5>
                                                <?php echo number_format($row['GiaSanPham']); ?> ₫
                                            </h5>
                                            <div style=" text-align: center;">

                                                <form action="#?idgiohang=<?php echo $row['MaSanPham']; ?>" method="POST">
                                                    <button class="btn btn-sm btn-giohang" type="submit">

                                                        <i class="fa fa-search fa-fw"></i> Thêm vào giỏ

                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                    }
                                ?>


                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <ul class="pagination mx-auto">
                        <?php
                    $query3 = "SELECT count( MaSanPham) as SLSP  FROM sanpham as sp  where  sp.MaLoaiSanPham =  $maloai";

                    $rs3 = load($query3);
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
                            <a class="page-link" href="product.php?maloai=<?php echo $maloai ?>&page=1" style="font-size:16px;">Đầu </a>
                        </li>
                        <li class="page-item ">
                            <a class="page-link" href="product.php?maloai=<?php echo $maloai ?>&page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                        </li>
                        <?php
                    }
                    for($page=1;$page<=$sotrang;$page++)
                    {
                        if($page==$curPage)
                            echo "    <li class='page-item active'>  <b class='page-link' style='font-size:16px;'> ".$page."</b>    </li>";
                        else
                            echo "   <li class='page-item'>
                                    <a class='page-link' href='product.php?maloai=".$maloai."&page=".$page. "'style='font-size:16px;''>".$page. " </a> </li> ";
                    }
                    if($curPage<$sotrang)
                    {
                        ?>
                        <li class='page-item'>
                            <a class="page-link" href="product.php?maloai=<?php echo $maloai ?>&page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                        </li>
                        <li class='page-item'>
                            <a class="page-link" href="product.php?maloai=<?php echo $maloai ?>&page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                        </li>
                        <?php
                    }
                        ?>








                    </ul>
                </div>

                <?php
                }
                else
                {
                    $mahangsx = $_GET["mahangsx"];
                    $query1 = "SELECT * FROM hangsanxuat  where  MaHangSanXuat = $mahangsx";

                    $rs1 = load($query1);
                    if($rs1->num_rows <=0)
                    {
                        header('Location: index.php');
                    }

                    while($row1 = $rs1->fetch_assoc())
                    {
                ?>
                <h3 class="pb-3 mb-4 font-italic border-bottom" style=" padding-top:20px;">
                    <span style="color:red;">
                        <?php echo $row1['TenHangSanXuat']; ?>
                    </span>
                </h3>
                <?php }?>
                <div class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">


                        <div class="item active carousel-item">
                            <div class="row">
                                <?php


                    $rowsPerPage=8;
                    $curPage=1;
                    if(isset($_GET['page']))
                        $curPage=$_GET['page'];
                    $offset=($curPage-1)*$rowsPerPage;



                    $query = "SELECT * FROM sanpham as sp  where  sp.MaHangSanXuat =  $mahangsx  order by sp.GiaSanPham LIMIT $offset,$rowsPerPage";

                    $rs = load($query);
                    if($rs->num_rows <=0)
                    {
                        header('Location: index.php');
                    }




                    while($row = $rs->fetch_assoc())
                    {
                                ?>

                                <div class="col-3 col-md-3 mb-4">
                                    <div class="card h-1100">
                                        <div class="preview_image">
                                            <a href="details.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                <img class="card-img-top" src="<?php echo $row['HinhURL']; ?>" alt="" />
                                            </a>

                                        </div>
                                        <div class="card-body">

                                            <h6 class="card-title">
                                                <a href="details.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                    <?php echo $row['TenSanPham']; ?>
                                                </a>
                                            </h6>

                                            <h5>
                                                <?php echo number_format($row['GiaSanPham']); ?> ₫
                                            </h5>
                                            <div style=" text-align: center;">

                                                <form action="#?idgiohang=<?php echo $row['MaSanPham']; ?>" method="POST">
                                                    <button class="btn btn-sm btn-giohang" type="submit">

                                                        <i class="fa fa-search fa-fw"></i> Thêm vào giỏ

                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                    }
                                ?>


                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <ul class="pagination mx-auto">
                        <?php
                    $query3 = "SELECT count( MaSanPham) as SLSP  FROM sanpham as sp  where  sp.MaHangSanXuat =  $mahangsx";

                    $rs3 = load($query3);
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
                            <a class="page-link" href="product.php?mahangsx=<?php echo $mahangsx ?>&page=1" style="font-size:16px;">Đầu </a>
                        </li>
                        <li class="page-item ">
                            <a class="page-link" href="product.php?mahangsx=<?php echo $mahangsx ?>&page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                        </li>
                        <?php
                    }
                    for($page=1;$page<=$sotrang;$page++)
                    {
                        if($page==$curPage)//không hiện liên kết ở trang đang đứng
                            echo "    <li class='page-item active'>  <b class='page-link' style='font-size:16px;'> ".$page."</b>    </li>";
                        else
                            echo "   <li class='page-item'>
                                    <a class='page-link' href='product.php?mahangsx=".$mahangsx."&page=".$page. "'style='font-size:16px;''>".$page. " </a> </li> ";
                    }
                    if($curPage<$sotrang)
                    {
                        ?>
                        <li class='page-item'>
                            <a class="page-link" href="product.php?mahangsx=<?php echo $mahangsx ?>&page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                        </li>
                        <li class='page-item'>
                            <a class="page-link" href="product.php?mahangsx=<?php echo $mahangsx ?>&page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                        </li>
                        <?php
                    }
                        ?>








                    </ul>
                </div>

                <?php
                }
                ?>
            </div>


        </div>



    </div>
    <?php   include 'modules/footer.php'; ?>


    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>

</body>

</html>