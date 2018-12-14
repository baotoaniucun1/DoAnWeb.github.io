
<?php

$getPage = $_SERVER['PHP_SELF'];

$arrayPage = explode("/", $getPage);

$getPage = $arrayPage[2];

$currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;

if($getPage == "Product.php")
{
    $xphp = '<li class="nav-item">
            <a href="index.php" class="nav-link">
              <p>
              <i class="fa fa-th-list"></i>
                Quản Lý Sản Phẩm

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Producttype.php" class="nav-link">
              <i class="fa fa-users"></i>
                  <p> Quản Lý Loại Sản Phẩm</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.php" class="nav-link active">
              <i class="fa fa-dropbox"></i>
                  <p>Quản Lý Nhà Sản Xuất</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.php" class="nav-link">
             <i class="fa fa-shopping-bag"></i>
                  <p>Quản Lý Đơn Hàng</p>
                </a>
          </li>
           ';
}
elseif($getPage == "Order.php")
{
    $xphp = '<li class="nav-item">
            <a href="index.php" class="nav-link">
              <p>
              <i class="fa fa-th-list"></i>
                Quản Lý Sản Phẩm

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Producttype.php" class="nav-link">
              <i class="fa fa-users"></i>
                  <p> Quản Lý Loại Sản Phẩm</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.php" class="nav-link">
              <i class="fa fa-dropbox"></i>
                  <p>Quản Lý Nhà Sản Xuất</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.php" class="nav-link active">
             <i class="fa fa-shopping-bag"></i>
                  <p>Quản Lý Đơn Hàng</p>
                </a>
          </li>
           ';
}
elseif($getPage == "Producttype.php")
{
    $xphp = '<li class="nav-item">
            <a href="index.php" class="nav-link">
              <p>
              <i class="fa fa-th-list"></i>
                Quản Lý Sản Phẩm

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Producttype.php" class="nav-link active">
              <i class="fa fa-users"></i>
                  <p> Quản Lý Loại Sản Phẩm</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.php" class="nav-link">
              <i class="fa fa-dropbox"></i>
                  <p>Quản Lý Nhà Sản Xuất</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.php" class="nav-link">
             <i class="fa fa-shopping-bag"></i>
                  <p>Quản Lý Đơn Hàng</p>
                </a>
          </li>';
}
else{
    $xphp = '<li class="nav-item">
            <a href="" class="nav-link active">
              <p>
              <i class="fa fa-th-list"></i>
                Quản Lý Sản Phẩm

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Producttype.php" class="nav-link">
              <i class="fa fa-users"></i>
                  <p> Quản Lý Loại Sản Phẩm</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.php" class="nav-link">
              <i class="fa fa-dropbox"></i>
                  <p>Quản Lý Nhà Sản Xuất</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.php" class="nav-link">
             <i class="fa fa-shopping-bag"></i>
                  <p>Quản Lý Đơn Hàng</p>
                </a>
          </li>
           ';
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <a href="#" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3"
            style="opacity: .8" />
        <span class="brand-text font-weight-light">CHICH CHOE SHOP</span>
    </a>

 
    <div class="sidebar">
       
        <nav class="mt-2">
            <ul id="pagination" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <?php
                echo $xphp;
                ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
