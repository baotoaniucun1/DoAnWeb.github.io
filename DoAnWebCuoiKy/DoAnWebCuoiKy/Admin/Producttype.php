<?php
session_start();
require_once '../lib/db.php';
if(isset($_SESSION['username']) && $_SESSION['role'] == 1)
{

    

}
else
{
    header('Location: ../index.php');
}

if(isset($_POST['add_item'])){

    $tenloaisp =  $_POST["item_name"];
    
    $tinhtrang  =  $_POST["tinhtrang"]; 
    $insertloaisanpham = "INSERT INTO LoaiSanPham (TenLoaiSanPham,BiXoa) VALUES ('$tenloaisp',$tinhtrang)";
    write($insertloaisanpham);

    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
    
}
if(isset($_POST['delete'])){
    
    $delete_id = $_POST['delete_id'];
    
    $deleteloaiSanPham = "DELETE FROM LoaiSanPham WHERE MaLoaiSanPham='$delete_id' ";
    write($deleteloaiSanPham);
    
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
}
if(isset($_POST['update_item'])){

    $idedit = $_POST['edit_id'];
    $tenspedit =  $_POST["item_nameedit"]; 
    $tinhtrang  =  $_POST["tinhtrang"];
 

    $update = "update LoaiSanPham set TenLoaiSanPham = '$tenspedit' , BiXoa = $tinhtrang where MaLoaiSanPham = '$idedit' ";
    write($update);

    
	
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");

    
    
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Admin | Loại Sản Phẩm</title>

    <?php
    include 'modules/include.php';
    ?>


</head>

<body class="hold-transition sidebar-mini">

    <div class="product">
        <div class="wrapper">

            <?php
            include 'modules/header.php';
            include 'modules/sidebar.php';


            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3 class="m-0 text-dark"> Loại Sản Phẩm</h3>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>


                <div class="content">
                    <div class="container-fluid">
                        <div class="card-body">
                            <a href="#add" data-toggle="modal">
                                <button type='button' class='btn btn-success btn-sm mb-2'>
                                    <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Thêm Loại Sản
                                    Phẩm
                                </button>
                            </a>
                            <table id="example" cellspacing="0" class="table table-hover table-striped">
                                <thead class="thead-yellow" style="text-align:center">
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">Tên Loại Sản Phẩm</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $showlsp = "SELECT * FROM LoaiSanPham";
                                    $rslsp = load($showlsp);
                                    while($rowlspl = $rslsp->fetch_assoc())
                                    {
                                    ?>
                                    <tr style="text-align:center">
                                        <td>
                                            <?php echo $rowlspl['MaLoaiSanPham']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowlspl['TenLoaiSanPham']; ?>
                                        </td>

                                        <td>
                                            <?php if($rowlspl['BiXoa'] == '1')
                                                  {
                                                      echo "Đang Ẩn";
                                                  }
                                                  else
                                                  {
                                                      echo "Đang hiện";
                                                  }
                                            ?>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <a href="#edit<?php echo $rowlspl['MaLoaiSanPham'];?>" data-toggle="modal">
                                                    <button class="btn btn-primary" data-title="Edit" data-toggle="modal"
                                                        data-target="#edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <a href="#delete<?php echo $rowlspl['MaLoaiSanPham'];?>" data-toggle="modal">
                                                    <button class="btn btn-danger" data-title="Delete" data-toggle="modal"
                                                        data-target="#delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </a>

                                            </p>
                                        </td>
                                    </tr>

                                    <!--        khúc này là popup thông báo xóa loại sản phẩm lên    -->

                                    <div id="delete<?php echo $rowlspl['MaLoaiSanPham'];  ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <form method="post">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Xóa Loại Sản Phẩm</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="delete_id" value="<?php echo $rowlspl['MaLoaiSanPham']; ?>">
                                                        <div class="alert alert-danger">Bạn có chắc muốn xóa loại sản
                                                            phẩm
                                                            <strong>
                                                                <?php echo $rowlspl['TenLoaiSanPham']; ?> </strong> này
                                                            ?
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete" class="btn btn-danger"><span
                                                                class="glyphicon glyphicon-trash"></span> Xóa</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                                                class="glyphicon glyphicon-remove-circle"></span> Không</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--    kết thúc popup xóa loai sản phẩm-->


                                    <!--        khúc này là popup sửa loai sản phẩm  -->

                                    <div id="edit<?php echo  $rowlspl['MaLoaiSanPham'];  ?>" class="modal fade" role="dialog">
                                        <form method="post" class="form-horizontal" role="form">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Sửa Loại Sản Phẩm</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <input type="hidden" name="edit_id" value="<?php echo  $rowlspl['MaLoaiSanPham']; ?>">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="control-label" for="item_nameedit">Tên
                                                                    Loại Sản Phẩm:</label>
                                                                <input type="text" class="form-control" id="item_nameedit"
                                                                    name="item_nameedit" autofocus required value="<?php echo $rowlspl['TenLoaiSanPham']  ?>" />
                                                                <br />

                                                            </div>

                                                            <div class="col-sm-6">

                                                                <label class="control-label" for="tinhtrang">Tình
                                                                    Trạng:</label>
                                                                <select class="form-control" type="text" id="tinhtrang"
                                                                    name="tinhtrang" autofocus required>
                                                                    <option <?php if($rowlspl['BiXoa']==0) echo
                                                                                      "selected" ?> value="0">Hiện</option>
                                                                    <option <?php if($rowlspl['BiXoa']==1) echo
                                                                                      "selected" ?> value="1">Ẩn</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="update_item"><span
                                                                class="glyphicon glyphicon-edit"></span>
                                                            Sửa</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                                                class="glyphicon glyphicon-remove-circle"></span>
                                                            Hủy</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                    <!--      kết thúc popup sửa loai sản phẩm  -->


                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php
    include 'modules/footer.php';
    ?>

    <!--        khúc này là popup thêm loai san phẩm    -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Loại Sản Phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label" for="item_name">Tên Loại Sản Phẩm:</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name"
                                                autofocus required />
                                            <br />

                                        </div>

                                        <div class="col-sm-6">

                                            <label class="control-label" for="tinhtrang">Tình Trạng:</label>
                                            <select class="form-control" type="text" id="tinhtrang" name="tinhtrang"
                                                autofocus required>
                                                <option value="0">Hiện</option>
                                                <option value="1">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="add_item">
                            <span class="glyphicon glyphicon-plus"></span> Thêm
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove-circle"></span> Hủy
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!--         kết thúc  thêm loai san phẩm    -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/adminlte.js"></script>

    <script src="js/Chart.min.js"></script>

    <script src="js/dashboard3.js"></script>
</body>

</html>