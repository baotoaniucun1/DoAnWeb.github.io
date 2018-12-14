

<?php
	session_start();



    if(isset($_SESSION['username']) && $_SESSION['role'] == 1)
    {
         $showallsp = "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' AND MatKhau = '$enc_password'";

         $rsall = load($showallsp);



         while($rowall = $rsall->fetch_assoc())
        {

            $TenHienThi = $rowall['TenHienThi'];

        }
    }
    else
    {
        header('Location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />



    <title>Admin | Quản lý sản phẩm</title>

    <?php
    include 'modules/include.php';
    ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
        include 'modules/header.php';
        include 'modules/sidebar.php';
        ?>


        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Quản lý sản phẩm </h1>
                        </div>


                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
            

                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive">
                                <thead class="thead-yellow">
                                    <tr>
                                        <th scope="col">ID </th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Tên Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số Lượng Tồn</th>
                                        <th scope="col">Số Lượng Bán</th>
                                        <th scope="col">Lượt Xem</th>
                                        <th scope="col">Ngày Nhập</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Hãng</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                           
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            <img src="" class="img-size-100" />
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                

                </div>

            </div>

        </div>

    </div>
    <?php
    include 'modules/footer.php';
    ?>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/adminlte.js"></script>

    <script src="js/Chart.min.js"></script>

    <script src="js/dashboard3.js"></script>
</body>
</html>
