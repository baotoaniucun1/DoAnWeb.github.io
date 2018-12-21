<?php


if (isset($_POST["btndangxuat"])) {
    header('Location: ../Logout.php');

}
?>

<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fa fa-bars">
                    <img src="img/bar.png" alt="Smiley face" height="30" width="30" />
                </i>
            </a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <div class="dropdown ml-2" style="padding-right:100px">
            <form method="POST">
                <button class="btn btn-sm btn-giohang1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <?php echo $_SESSION['TenHienThi'] ?>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../../index.php">Quay Lại Shop</a>
                    <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                </div>
            </form>
        </div>



    </ul>
</nav>