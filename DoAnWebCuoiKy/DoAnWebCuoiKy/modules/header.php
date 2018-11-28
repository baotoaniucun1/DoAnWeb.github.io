<?php

// trường hợp đăng nhập bằng member
if(isset($_SESSION['username']) && $_SESSION['role'] == 0)
{
    $register = '';
    $member = '<div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="User/MyOrder.html">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="User/MyAccount.html">Thông Tin Tài Khoản</a>
                        <a class="dropdown-item" href="#">Quản lí tài khoản</a>
                        <a class="dropdown-item" href="#">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="Logout.php">Đăng Xuất</a>
                    </div>
                </div>';
}
// trường hợp đăng nhập bằng admin
elseif(isset($_SESSION['username']) && $_SESSION['role'] == 1) {
    $member = '<div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="User/MyOrder.html">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="User/MyAccount.html">Thông Tin Tài Khoản</a>
                        <a class="dropdown-item" href="#">Quản lí tài khoản</a>
                        <a class="dropdown-item" href="#">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="Logout.php">Đăng Xuất</a>
                    </div>
                </div>';
    $register = '<a class="btn btn-sm btn-outline-secondary" href="Admin/index.php">Administrator</a></li>';
}
// trường hợp chưa đăng nhập
else {
    $register = '<a class="btn btn-sm btn-outline-secondary" href="register.php">Đăng Ký</a>';
    $member = ' <a class="btn btn-sm btn-outline-secondary" href="login.php">Đăng Nhập</a>';
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
                <?php

                echo $register;

                echo $member;


                ?>
            </span>
        </div>
    </div>
</header>


