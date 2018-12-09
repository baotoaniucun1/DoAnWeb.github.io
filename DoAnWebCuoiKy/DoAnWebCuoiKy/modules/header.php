
<?php


if (isset($_POST["btndangxuat"])) {
    if (isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        unset($_SESSION["dang_nhap_chua"]);
        header('Location: Login.php');
    }

}
?>

<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">

        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm..." />
                <span class="input-group-btn">
                    <button class="btn btn-search" type="button">
                        <i class="fa fa-search fa-fw"></i> Tìm
                    </button>
                </span>
            </div>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">CHÍCH CHÒE SHOP</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <?php


            // trường hợp đăng nhập bằng member
            if(isset($_SESSION['username']) && $_SESSION['role'] == 0)
            {
                echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="#">
    <span class="badge badge-danger">11</span>
<span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
   </a>';
               echo $register = '';
               echo  $member = '<form method="POST"><div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="User/MyOrder.php">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="User/MyAccount.php">Thông Tin Tài Khoản</a>
                        <a class="dropdown-item" href="#">Quản lí tài khoản</a>
                        <a class="dropdown-item" href="#">Đơn hàng của tôi</a>
                        <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </form>';
            }
            // trường hợp đăng nhập bằng admin
            elseif(isset($_SESSION['username']) && $_SESSION['role'] == 1) {
                echo   $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="#">
    <span class="badge badge-danger">11</span>
<span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
   </a>';
                echo $member = '<form method="POST">
                    <div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="User/MyOrder.php">Đơn hàng của tôi</a>
                        <a class="dropdown-item" href="User/MyAccount.php">Thông Tin Tài Khoản</a>
                        <a class="dropdown-item" href="#">Quản lí tài khoản</a>
                        <a class="dropdown-item" href="#">Đơn hàng của tôi</a>
                      <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </div>
 </form>';
                echo  $register = '<a class="btn btn-sm btn-giohang1 ml-2" href="Admin/index.php?id='.$_SESSION['username'].'"> <span class="glyphicon glyphicon-user"></span> Administrator</a></li>';
            }
            // trường hợp chưa đăng nhập
            else {
               echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="#">
                                         <span class="badge badge-danger">11</span>
            <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
                                        </a>';
               echo $member = ' <a class="btn btn-sm btn-giohang1 ml-2" href="login.php">Đăng Nhập</a>';
                echo $register = '<a class="btn btn-sm btn-giohang1 ml-2" href="register.php">Đăng Ký</a>';

            }


            ?>
          


        </div>
    </div>
</header>


