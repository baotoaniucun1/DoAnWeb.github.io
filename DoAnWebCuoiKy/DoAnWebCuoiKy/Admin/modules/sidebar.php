  
<?php

          $getPage = $_SERVER['PHP_SELF'];
          
          $arrayPage = explode("/", $getPage);

          $getPage = $arrayPage[3];

          $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;

          if($getPage == "Account.php")
          {
            $xhtml = '<li class="nav-item">
            <a href="#" class="nav-link ">
              <p>
                <i class="fa fa-th-list"></i>
                Dashboard            
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link active">
              <i class="fa fa-users"></i>
                  <p> Accounts </p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
          elseif($getPage == "Product.php")
          {
            $xhtml = '<li class="nav-item">
            <a href="index.html" class="nav-link ">
              <p>
              <i class="fa fa-th-list"></i>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link ">
              <i class="fa fa-users"></i>
                  <p> Accounts</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link active">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="Review.html" class="nav-link">
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Customer.html" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
           elseif($getPage == "Order.php")
          {
            $xhtml = '<li class="nav-item">
            <a href="index.html" class="nav-link ">
              <p>
              <i class="fa fa-th-list"></i>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link ">
              <i class="fa fa-users"></i>
                  <p> Accounts</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link ">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link active">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="Review.html" class="nav-link">
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Customer.php" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
           elseif($getPage == "Review.php")
          {
            $xhtml = '<li class="nav-item">
            <a href="index.html" class="nav-link ">
              <p>
              <i class="fa fa-th-list"></i>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link ">
              <i class="fa fa-users"></i>
                  <p> Accounts</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link ">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="Review.html" class="nav-link active" >
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Customer.php" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
           elseif($getPage == "Product.php")
          {
            $xhtml = '<li class="nav-item">
            <a href="index.html" class="nav-link ">
              <p>
              <i class="fa fa-th-list"></i>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link ">
              <i class="fa fa-users"></i>
                  <p> Accounts</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link active">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
          else{
            $xhtml = '<li class="nav-item">
            <a href="#" class="nav-link active">
              <p>
              <i class="fa fa-th-list"></i>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Account.html" class="nav-link">
              <i class="fa fa-users"></i>
                  <p> Accounts</p>
                </a>
          </li>

            <li class="nav-item">
            <a href="Product.html" class="nav-link">
              <i class="fa fa-dropbox"></i>    
                  <p>Products</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="Order.html" class="nav-link">
             <i class="fa fa-shopping-bag"></i>    
                  <p>Orders</p>
                </a>
          </li>
           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-comments"></i>
                  <p>Reviews</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="fa fa-address-book"></i>    
                  <p>Customers</p>
                </a>
          </li>

           <li class="nav-item">
            <a href="" class="nav-link"> 
             <i class="fa fa-globe"></i>        
                  <p>FAQ</p>
                </a>
          </li>';
          }
?>
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
              <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="pagination" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class            with font-awesome or any other icon font library -->
            
            <?php
              echo $xhtml;
            ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
