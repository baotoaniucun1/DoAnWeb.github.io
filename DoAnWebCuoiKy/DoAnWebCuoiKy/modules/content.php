


<div class="row">
    <div class="col"></div>


    <div id="carouselExampleIndicators" class="carousel slide my-2" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="assets/img/ss.png" />
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="assets/img/ip.png" />
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="assets/img/hw.png" />
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="assets/img/simvn.png" />
            </div>
        </div>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">></span>

        </a>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        </a>

    </div>

    <div class="col"></div>

</div>


<div class="row">
    <div class="col-md-12 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            <span style="color:red">
                TOP
                <span style="font-size:40px"> 10</span>
            </span> Sản Phẩm Mới Nhất
        </h3>

        <div id="Top10New" class="carousel slide" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner ">
                <?php 
                $i = 0;
                $limit = 4;
                $flag = 0;
                $kichhoatactive = 'active';
                while ($i<10) 
                {

                    
                    if($i == 8)
                    {
                        $limit = 2;
                    }
                    
                    $query_Top10New = "SELECT * FROM sanpham ORDER BY NgayNhap desc LIMIT $limit OFFSET $i";
                    
                    $rs = load($query_Top10New);
                    
                ?>

                <div class="item  <?php if($flag ==0)  echo $kichhoatactive?>  carousel-item">
                    <div class="row">
                        <?php 
                    while($row = $rs->fetch_assoc())
                    {
                        ?>

                        <div class="col-3 col-md-3 mb-4">
                            <div class="card h-1100">
                                <div class="preview_image">
                              
                                    <a href="details.php?idsanpham=<?php echo $row['MaSanPham'];?>">
                                        <img class="card-img-top" src="<?php echo $row['HinhURL']; ?>" alt="" />
                                    </a>

                                </div>

                                <div class="card-body">

                                    <h6 class="card-title">
                                        <a href="details.php?idsanpham=<?php echo $row['MaSanPham']; ?>">
                                            <?php echo $row['TenSanPham']; ?></a>
                                    </h6>

                                    <h5><b><?php echo number_format($row['GiaSanPham']); ?> ₫</b></h5>
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
                        <?php } ?>
                    </div>
                    <?php $i = $i + 4; 
                          $flag = $flag +1;
                    ?>
                </div>
                <?php } ?>



            </div>


            <div style="text-align: center;padding-bottom:10px">
                <a href="#Top10New" data-slide="prev">
                    <button class="btn btn-secondary leftLst"> <b>
                            <</b> </button> </a> <a href="#Top10New" data-slide="next">
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
                TOP
                <span style="font-size:40px"> 10</span>
            </span> Sản Phẩm Được Mua Nhiều Nhất
        </h3>

        <div id="Top10Sel" class="carousel slide" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner ">
                <?php 
                $i = 0;
                $limit = 4;
                $flag = 0;
                $kichhoatactive = 'active';
                while ($i<10) 
                {

                    
                    if($i == 8)
                    {
                        $limit = 2;
                    }
                    
                    $query_Top10Sel = "SELECT * FROM sanpham ORDER BY SoLuongBan desc LIMIT $limit OFFSET $i";
                    
                    $rs = load($query_Top10Sel);
                    
                ?>

                <div class="item <?php if($flag ==0)  echo $kichhoatactive?> carousel-item">
                    <div class="row">
                        <?php 
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
                                            <?php echo $row['TenSanPham']; ?></a>
                                    </h6>

                                    <h5>
                                        <?php echo number_format($row['GiaSanPham']); ?> ₫</h5>
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
                        <?php } ?>
                    </div>
                    <?php $i = $i + 4; 
                          $flag = $flag +1;
                    ?>
                </div>
                <?php } ?>



            </div>


            <div style="text-align: center;padding-bottom:10px">
                <a href="#Top10Sel" data-slide="prev">
                    <button class="btn btn-secondary leftLst"><b>
                            <</b> </button> </a> <a href="#Top10Sel" data-slide="next">
                                <button class="btn btn-secondary rightLst"><b>></b></button> </a>

            </div>


        </div>

    </div>


</div>



<div class="row">
    <div class="col-md-12 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            <span style="color:red">
                TOP
                <span style="font-size:40px"> 10</span>
            </span> Sản Phẩm Được Xem Nhiều Nhất
        </h3>

        <div id="Top10See" class="carousel slide" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner ">
                <?php 
                $i = 0;
                $limit = 4;
                $flag = 0;
                $kichhoatactive = 'active';
                while ($i<10) 
                {

                    
                    if($i == 8)
                    {
                        $limit = 2;
                    }
                    
                    $query_Top10See = "SELECT * FROM sanpham ORDER BY SoLuotXem desc LIMIT $limit OFFSET $i";
                    
                    $rs = load($query_Top10See);
                    
                ?>

                <div class="item <?php if($flag ==0)  echo $kichhoatactive?> carousel-item">
                    <div class="row">
                        <?php 

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
                                            <?php echo $row['TenSanPham']; ?></a>
                                    </h6>

                                    <h5>
                                        <?php echo number_format($row['GiaSanPham']); ?> ₫</h5>
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
                        <?php } ?>
                    </div>
                    <?php $i = $i + 4; 
                          $flag = $flag +1;
                    ?>
                </div>
                <?php } ?>



            </div>


            <div style="text-align: center;padding-bottom:10px  ">
                <a href="#Top10See" data-slide="prev">
                    <button class="btn btn-secondary leftLst">
                        <b>
                            <</b> </button> </a> <a href="#Top10See" data-slide="next">
                                <button class="btn btn-secondary rightLst"><b>></b></button>

                </a>

            </div>


        </div>

    </div>


</div>
<?php 

if(isset($_SESSION["vuotsoluong"]) )
{
    if($_SESSION["vuotsoluong"] == "")
    {
        
    }
    else
    {
        echo $_SESSION["vuotsoluong"];
        unset($_SESSION['vuotsoluong']);
    }
}


?>