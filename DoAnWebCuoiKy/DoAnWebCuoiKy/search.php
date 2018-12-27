<?php
session_start();

require_once "lib/db.php";
$ketqua= "";
if(isset($_POST['locsanpham']))
{
    unset($_GET["qu"]);
    $_SESSION["Timkiem"] = 1;
    $gan_and = 1;
    $ketqua= "";

    if(isset($_SESSION['hangsanxuat']))
    {
        unset($_SESSION['hangsanxuat']);


    }
    if(isset($_SESSION['loaisanpham']))
    {
        unset($_SESSION['loaisanpham']);
    }

    if(isset($_SESSION['hedieuhanh']))
    {
        unset($_SESSION['hedieuhanh']);
    }
    if(isset($_SESSION['bonhotrong']))
    {
        unset($_SESSION['bonhotrong']);
    }

    //$sqlnhieutieuchi = "select sp.* FROM motasanpham as mtsp, sanpham as sp,  hangsanxuat as hsx , loaisanpham as lsp where 1=1  and  sp.MaSanPham = mtsp.MaSanPham and hsx.MaHangSanXuat = sp.MaHangSanXuat and lsp.MaLoaiSanPham = sp.MaLoaiSanPham  ";
    //$sqldem = " FROM motasanpham as mtsp, sanpham as sp,  hangsanxuat as hsx , loaisanpham as lsp where 1=1  and  sp.MaSanPham = mtsp.MaSanPham and hsx.MaHangSanXuat = sp.MaHangSanXuat and lsp.MaLoaiSanPham = sp.MaLoaiSanPham ";
    if(!empty($_POST['hangsanxuat']))
    {
        $dem=1;

        foreach($_POST['hangsanxuat'] as $value) {


            $_SESSION['hangsanxuat'][$value] = $value;
            if($dem ==1)
            {
                $ketqua =$ketqua."$value".",";
                //$sqlnhieutieuchi = $sqlnhieutieuchi . " and ( hsx.TenHangSanXuat = '$value' ";
                //$sqldem = $sqldem . " and ( hsx.TenHangSanXuat = '$value' ";
                $dem +=1;
            }
            else
            {
                $ketqua =$ketqua."$value".",";
                //$sqlnhieutieuchi = $sqlnhieutieuchi . " or hsx.TenHangSanXuat = '$value' ";
                //$sqldem = $sqldem." or hsx.TenHangSanXuat = '$value' ";
            }
        }
        //$sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //$sqldem=$sqldem. " ) ";
        //$gan_and +=1;
    }

    if(!empty($_POST['loaisanpham']))
    {
        $dem=1;
        //if($gan_and >1)
        //{
        //    foreach($_POST['loaisanpham'] as $value) {


        //        $_SESSION['loaisanpham'][$value] = $value;
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " and ( lsp.TenLoaiSanPham = '$value' ";
        //            //$sqldem = $sqldem . " and ( lsp.TenLoaiSanPham = '$value' ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " or lsp.TenLoaiSanPham = '$value' ";
        //            //$sqldem = $sqldem." or lsp.TenLoaiSanPham = '$value' ";
        //        }
        //    }
        //    $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    $sqldem=$sqldem. " ) ";
        //}
        //else{
            foreach($_POST['loaisanpham'] as $value) {


                $_SESSION['loaisanpham'][$value] = $value;
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . "  and ( lsp.TenLoaiSanPham = '$value' ";
                    //$sqldem = $sqldem . " and ( lsp.TenLoaiSanPham = '$value' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . " or lsp.TenLoaiSanPham = '$value' ";
                    //$sqldem = $sqldem." or lsp.TenLoaiSanPham = '$value' ";
                }
            //}
            //$sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            //$sqldem=$sqldem. " ) ";
        }
    }
    if(!empty($_POST['hedieuhanh']))
    {
        $dem=1;
        //if($gan_and >1)
        //{
        //    foreach($_POST['hedieuhanh'] as $value) {


        //        $_SESSION['hedieuhanh'][$value] = $value;
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " and ( mtsp.HeDieuHanh like '%$value%' ";
        //            //$sqldem = $sqldem . " and (  mtsp.HeDieuHanh like '%$value%'  ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.HeDieuHanh like '%$value%'  ";
        //            //$sqldem = $sqldem." or  mtsp.HeDieuHanh like '%$value%'  ";
        //        }
        //    }
        //    $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    $sqldem=$sqldem. " ) ";
        //}
        //else{
            foreach($_POST['hedieuhanh'] as $value) {


                $_SESSION['hedieuhanh'][$value] = $value;
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . "  and (  mtsp.HeDieuHanh like '%$value%' ";
                    //$sqldem = $sqldem . " and (  mtsp.HeDieuHanh like '%$value%' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.HeDieuHanh like '%$value%' ";
                    //$sqldem = $sqldem." or  mtsp.HeDieuHanh like '%$value%' ";
                }
            //}
            //$sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            //$sqldem=$sqldem. " ) ";
        }
    }


    if(!empty($_POST['bonhotrong']))
    {
        $dem=1;
        //if($gan_and >1)
        //{
        //    foreach($_POST['bonhotrong'] as $value) {


        //        $_SESSION['bonhotrong'][$value] = $value;
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " and ( mtsp.BoNhoTrong like '%$value%' ";
        //            //$sqldem = $sqldem . " and (  mtsp.BoNhoTrong like '%$value%'  ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            //$sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.BoNhoTrong like '%$value%'  ";
        //            //$sqldem = $sqldem." or  mtsp.BoNhoTrong like '%$value%'  ";
        //        }
        //    }
        //    //$sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    //$sqldem=$sqldem. " ) ";
        //}
        //else{
            foreach($_POST['bonhotrong'] as $value) {


                $_SESSION['bonhotrong'][$value] = $value;
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . "  and (  mtsp.BoNhoTrong like '%$value%' ";
                    //$sqldem = $sqldem . " and (  mtsp.BoNhoTrong like '%$value%' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    //$sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.BoNhoTrong like '%$value%' ";
                    //$sqldem = $sqldem." or  mtsp.BoNhoTrong like '%$value%'";
                }
            //}
            //$sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            //$sqldem=$sqldem. " ) ";
        }


    }


}
if(isset($_SESSION["Timkiem"]))
{
    $gan_and = 1;
    $ketqua ="";
    $sqlnhieutieuchi = "select sp.* FROM motasanpham as mtsp, sanpham as sp,  hangsanxuat as hsx , loaisanpham as lsp where 1=1  and  sp.MaSanPham = mtsp.MaSanPham and hsx.MaHangSanXuat = sp.MaHangSanXuat and lsp.MaLoaiSanPham = sp.MaLoaiSanPham  ";
    $sqldem = " FROM motasanpham as mtsp, sanpham as sp,  hangsanxuat as hsx , loaisanpham as lsp where 1=1  and  sp.MaSanPham = mtsp.MaSanPham and hsx.MaHangSanXuat = sp.MaHangSanXuat and lsp.MaLoaiSanPham = sp.MaLoaiSanPham  ";
    if(!empty($_SESSION['hangsanxuat'])) {
        $dem=1;
        foreach($_SESSION['hangsanxuat'] as $value) {
            if($dem ==1)
            {
                $ketqua =$ketqua."$value".",";
                $sqlnhieutieuchi = $sqlnhieutieuchi . " and ( hsx.TenHangSanXuat = '$value' ";
                $sqldem = $sqldem . " and ( hsx.TenHangSanXuat = '$value' ";
                $dem +=1;
            }
            else
            {
                $ketqua =$ketqua."$value".",";
                $sqlnhieutieuchi = $sqlnhieutieuchi . " or hsx.TenHangSanXuat = '$value' ";
                $sqldem = $sqldem." or hsx.TenHangSanXuat = '$value' ";
            }
        }
        $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        $sqldem=$sqldem. " ) ";
        //$gan_and +=1;
    }
    if(!empty($_SESSION['loaisanpham'])) {
        //if($gan_and > 1)
        //{
        //    $dem=1;
        //    foreach($_SESSION['loaisanpham'] as $value) {
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " and ( lsp.TenLoaiSanPham = '$value' ";
        //            $sqldem = $sqldem . " and ( lsp.TenLoaiSanPham = '$value' ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " or lsp.TenLoaiSanPham = '$value' ";
        //            $sqldem = $sqldem." or lsp.TenLoaiSanPham = '$value' ";
        //        }
        //    }
        //    $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    $sqldem=$sqldem. " ) ";
        //}
        //else{
            $dem=1;
            foreach($_SESSION['loaisanpham'] as $value) {
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " and ( lsp.TenLoaiSanPham = '$value' ";
                    $sqldem = $sqldem . "  and ( lsp.TenLoaiSanPham = '$value' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " or lsp.TenLoaiSanPham = '$value' ";
                    $sqldem = $sqldem." or lsp.TenLoaiSanPham = '$value' ";
                }
            //}
            $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            $sqldem=$sqldem. " ) ";
        }
    }
    if(!empty($_SESSION['hedieuhanh'])) {
        //if($gan_and > 1)
        //{
        //    $dem=1;
        //    foreach($_SESSION['hedieuhanh'] as $value) {
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " and (  mtsp.HeDieuHanh like '%$value%' ";
        //            $sqldem = $sqldem . " and (  mtsp.HeDieuHanh like '%$value%' ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.HeDieuHanh like '%$value%' ";
        //            $sqldem = $sqldem." or  mtsp.HeDieuHanh like '%$value%' ";
        //        }
        //    }
        //    $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    $sqldem=$sqldem. " ) ";
        //}
        //else{
            $dem=1;
            foreach($_SESSION['hedieuhanh'] as $value) {
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " and (  mtsp.HeDieuHanh like '%$value%' ";
                    $sqldem = $sqldem . "  and (  mtsp.HeDieuHanh like '%$value%' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.HeDieuHanh like '%$value%' ";
                    $sqldem = $sqldem." or  mtsp.HeDieuHanh like '%$value%' ";
                }
            //}
            $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            $sqldem=$sqldem. " ) ";
        }
    }


    if(!empty($_SESSION['bonhotrong'])) {
        //if($gan_and > 1)
        //{
        //    $dem=1;
        //    foreach($_SESSION['bonhotrong'] as $value) {
        //        if($dem ==1)
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " and ( mtsp.BoNhoTrong like '%$value%' ";
        //            $sqldem = $sqldem . " and (  mtsp.BoNhoTrong like '%$value%' ";
        //            $dem +=1;
        //        }
        //        else
        //        {
        //            $ketqua =$ketqua."$value".",";
        //            $sqlnhieutieuchi = $sqlnhieutieuchi . " or  mtsp.BoNhoTrong like '%$value%' ";
        //            $sqldem = $sqldem." or  mtsp.BoNhoTrong like '%$value%' ";
        //        }
        //    }
        //    $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
        //    $sqldem=$sqldem. " ) ";
        //}
        //else{
            $dem=1;
            foreach($_SESSION['bonhotrong'] as $value) {
                if($dem ==1)
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " and (  mtsp.BoNhoTrong like '%$value%' ";
                    $sqldem = $sqldem . "  and (  mtsp.BoNhoTrong like '%$value%' ";
                    $dem +=1;
                }
                else
                {
                    $ketqua =$ketqua."$value".",";
                    $sqlnhieutieuchi = $sqlnhieutieuchi . " or mtsp.BoNhoTrong like '%$value%' ";
                    $sqldem = $sqldem." or  mtsp.BoNhoTrong like '%$value%' ";
                }
            //}
            $sqlnhieutieuchi = $sqlnhieutieuchi . " ) ";
            $sqldem=$sqldem. " ) ";
        }
    }
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

        <form style="margin-top:30px;" method="post">

            <div class="row">

                <div class="col-md-4">
                    <h3>Hãng Sản Xuất</h3>
                    <?php
                    $showhangsanxuat = "SELECT * FROM hangsanxuat as hsx where hsx.BiXoa = 0 ";
                    $rsshowhangsanxuat = load($showhangsanxuat);
                    while($rowhangsanxuat = $rsshowhangsanxuat->fetch_assoc())
                    {
                    ?>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="hangsanxuat[]" value="<?php echo $rowhangsanxuat["TenHangSanXuat"]; ?>" />
                            <span class="label-text">
                                <?php echo $rowhangsanxuat["TenHangSanXuat"]; ?>
                            </span>
                        </label>
                    </div>

                    <?php }?>

                </div>
                <div class="col-md-4">
                    <h3>Loại Sản PHẩm</h3>
                    <?php
                    $showloaisanpham = "SELECT * FROM LoaiSanPham  where BiXoa = 0 ";
                    $rsshowloaisanpham = load($showloaisanpham);
                    while($rowloaisanpham = $rsshowloaisanpham->fetch_assoc())
                    {
                    ?>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="loaisanpham[]" value="<?php echo $rowloaisanpham["TenLoaiSanPham"]; ?>" />
                            <span class="label-text">
                                <?php echo $rowloaisanpham["TenLoaiSanPham"]; ?>
                            </span>
                        </label>
                    </div>

                    <?php }?>
                </div>
                <div class="col-md-4">
                    <h3>Hệ Điều Hành</h3>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="hedieuhanh[]" value="iOS 11" />
                            <span class="label-text">iOS 11</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="hedieuhanh[]" value="iOS 12" />
                            <span class="label-text">iOS 12</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="hedieuhanh[]" value="Android" />
                            <span class="label-text">Android</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="hedieuhanh[]" value="ColorOS" />
                            <span class="label-text">ColorOS </span>
                        </label>
                    </div>


                </div>
                <br />
           
                <div class="col-md-4">
                    <h3>Bộ Nhớ Trong</h3>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="bonhotrong[]" value="16 GB" />
                            <span class="label-text">16 GB</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="bonhotrong[]" value="32 GB" />
                            <span class="label-text">32 GB</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="bonhotrong[]" value="64 GB" />
                            <span class="label-text">64 GB</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="bonhotrong[]" value="128 GB" />
                            <span class="label-text">128 GB</span>
                        </label>
                    </div>
                </div>



            </div>

            <button style="font-weight:bold" class="btn btn-warning btn-xs" name="locsanpham" type="submit">
                Lọc
            </button>
        </form>






        <div class="row">

            <div class="col-md-12 blog-main">

                <h3 class="pb-3 mb-4 font-italic border-bottom" style=" padding-top:20px;">
                    <span style="color:red;">
                        Kết quả tìm kiếm
                    </span>

                    <?php echo $ketqua; ?>
                </h3>
                <?php
                if(isset($_GET["qu"]))
                {
                    $tenhang = $_GET["qu"];
                    unset($_SESSION["Timkiem"]);


                ?>
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



                    $query = "SELECT * FROM sanpham  where  tensanpham  like '%".$tenhang."%'    LIMIT $offset,$rowsPerPage";

                    $rs = load($query);

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
                                            <div style="text-align: center;">


                                                <a href="../cartproduct.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                    <button class="btn btn-giohang">
                                                        <i class="fa fa-search fa-fw"></i> Thêm vào giỏ
                                                    </button>
                                                </a>

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
                    $query3 = "SELECT count( MaSanPham) as SLSP  FROM sanpham where  tensanpham  like '%".$tenhang."%' ";

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
                            <a class="page-link" href="search.php?qu=<?php echo $tenhang;?>&page=1" style="font-size:16px;">Đầu </a>
                        </li>
                        <li class="page-item ">
                            <a class="page-link" href="search.php?qu=<?php echo $tenhang;?>&page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                        </li>
                        <?php
                    }
                    for($page=1;$page<=$sotrang;$page++)
                    {
                        if($page==$curPage)
                            echo "    <li class='page-item active'>  <b class='page-link' style='font-size:16px;'> ".$page."</b>    </li>";
                        else
                            echo "   <li class='page-item'>
                                    <a class='page-link' href='search.php?qu=".$tenhang."&page=".$page. "'style='font-size:16px;''>".$page. " </a> </li> ";
                    }
                    if($curPage<$sotrang)
                    {
                        ?>
                        <li class='page-item'>
                            <a class="page-link" href="search.php?qu=<?php echo $tenhang;?>&page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                        </li>
                        <li class='page-item'>
                            <a class="page-link" href="search.php?qu=<?php echo $tenhang;?>&page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                        </li>
                        <?php
                    }
                        ?>








                    </ul>
                </div>

                <?php
                }
                if(isset($_POST['locsanpham']) || isset($_SESSION["Timkiem"]) )
                {
                ?>

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



                    $sqlnhieutieuchi = $sqlnhieutieuchi. " LIMIT $offset,$rowsPerPage";

                    $rs = load($sqlnhieutieuchi);

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
                                            <div style="text-align: center;">


                                                <a href="../cartproduct.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                                    <button class="btn btn-giohang">
                                                        <i class="fa fa-search fa-fw"></i> Thêm vào giỏ
                                                    </button>
                                                </a>

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
                    $sqldem = "SELECT count( sp.MaSanPham) as SLSP" .$sqldem;

                    $rs3 = load($sqldem);
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
                            <a class="page-link" href="search.php?page=1" style="font-size:16px;">Đầu </a>
                        </li>
                        <li class="page-item ">
                            <a class="page-link" href="search.php?page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                        </li>
                        <?php
                    }
                    for($page=1;$page<=$sotrang;$page++)
                    {
                        if($page==$curPage)
                            echo "    <li class='page-item active'>  <b class='page-link' style='font-size:16px;'> ".$page."</b>    </li>";
                        else
                            echo "   <li class='page-item'>
                                    <a class='page-link' href='search.php?page=".$page. "'style='font-size:16px;''>".$page. " </a> </li> ";
                    }
                    if($curPage<$sotrang)
                    {
                        ?>
                        <li class='page-item'>
                            <a class="page-link" href="search.php?page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                        </li>
                        <li class='page-item'>
                            <a class="page-link" href="search.php?page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                        </li>
                        <?php
                    }

                        ?>








                    </ul>
                </div>
















                <?php }
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

