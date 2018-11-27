<?php
      // trường hợp đăng nhập bằng member
    if(isset($_SESSION['username']) && $_SESSION['role'] == 0)
    {
     $register = '<li><a href="Register.html"><span class="fa fa-user"></span> Đăng ký</a></li>';
      $member = ' <li class="dropdown">
              <a  data-toggle="dropdown" href="#">'.$_SESSION['username'].' <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="User/MyAccount.html"><i class="fa fa-cog"> </i>Quản lí tài khoản</a></li>
                  <li><a href="User/MyOrder.html"><i class="fa fa-file-text"> </i>Đơn hàng của tôi</a></li>
                  <li><a href="Logout.html"><i class="fa fa-sign-out"> </i> Đăng Xuất</a></li>
                </ul>
             </li>';
    }
     // trường hợp đăng nhập bằng admin
    elseif(isset($_SESSION['username']) && $_SESSION['role'] == 1) {
        $member = ' <li class="dropdown">
              <a  data-toggle="dropdown" href="#">'.$_SESSION['username'].' <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="User/MyAccount.html"><i class="fa fa-cog"> </i>Quản lí tài khoản</a></li>
                  <li><a href="User/MyOrder.html"><i class="fa fa-file-text"> </i>Đơn hàng của tôi</a></li>
                  <li><a href="Logout.html"><i class="fa fa-sign-out"> </i> Đăng Xuất</a></li>
                </ul>
             </li>';
       $register = '<li><a href="Admin/index.html"><span class="fa fa-user"></span> Administrator</a></li>';
    }
    // trường hợp chưa đăng nhập
    else {
         $register = '<li><a href="Register.html"><span class="fa fa-user"></span> Đăng ký</a></li>';
         $member = ' <li><a href="Login.html"><span class="fa fa-sign-in"></span> Đăng Nhập </a></li>';
    }

 
  ?>    

<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." />
                <span class="input-group-btn">
                    <button class="btn btn-search" type="button">
                        <i class="fa fa-search fa-fw"></i> Search
                    </button>
                </span>
            </div>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">CHÍCH CHÒE SHOP</a>


        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">

            <span class="input-group-btn">
                <a class="btn btn-sm btn-outline-secondary" href="#">Card</a>
                <a class="btn btn-sm btn-outline-secondary" href="#">Card</a>
                <a class="btn btn-sm btn-outline-secondary" href="login.php">Sign in</a>
            </span>
        </div>
    </div>
</header>


