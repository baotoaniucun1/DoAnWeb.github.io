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
                <?php }
                }?>
                <div id="Top10See" class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">


                        <div class="item active carousel-item">
                            <div class="row">
                                <?php
                                if(isset($_GET["maloai"]))
                                {
                                  
                                    $query = "SELECT * FROM sanpham as sp  where  sp.MaLoaiSanPham =  $maloai  order by rand()";

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
                                <?php }
                                }
                                else
                                {
                                    $mahangsx = $_GET["mahangsx"];
                                    $query = "SELECT * FROM sanpham as sp  where  sp.MaHangSanXuat =  $mahangsx  order by rand()";

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

                                }
                                ?>


                            </div>

                        </div>




                    </div>

                    <div class="row">

                        <ul class="pagination mx-auto">
                            <li class="page-item ">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link">1</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link">Next</a>
                            </li>
                        </ul>

                    </div>



                </div>

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