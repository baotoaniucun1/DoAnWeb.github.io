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

    $tennsx =  $_POST["item_name"];
    $tinhtrang = $_POST["tinhtrang"];
  
    $inserthsx = "INSERT INTO HangSanXuat (TenHangSanXuat,BiXoa)VALUES ('$tennsx',$tinhtrang)";
    $idong = write($inserthsx);

    $destination = null;
    $f = $_FILES["file"];
	if ($f["error"] > 0) {

	} else {
        if(!file_exists("../assets/img"))
        {
            mkdir("../assets/img");
        }
		

		
		$tmp_name = $f["tmp_name"];
		$name = $f["name"];
		$destination = "../assets/img/";
        $destination=$destination.$_FILES["file"]["name"];

		move_uploaded_file($tmp_name, $destination);
        $link = "assets/img/";
        $link=$link.$_FILES["file"]["name"];
        $update = "update HangSanXuat set LogoURL = '$link'  TenNhaSanXuat = where MaHangSanXuat = '$idong' ";

        write($update);

        
	}
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
    
}

if(isset($_POST['delete'])){
    
    $delete_id = $_POST['delete_id'];
    $deletehsx = "DELETE FROM HangSanXuat WHERE MaHangSanXuat='$delete_id' ";
   
    write($deletehsx);
    $path = $_SERVER['REQUEST_URI'];
    header("Location: $path");
}

if(isset($_POST['update_item'])){

    $idedit = $_POST['edit_id'];
    $tenhsxedit =  $_POST["item_nameedit"]; 
    $tinhtrang  =  $_POST["tinhtrangedit"];
    
     $destination = null;
     
     $f = $_FILES["fileedit"];
	if ($f["error"] > 0) {
        $update = "update HangSanXuat set TenHangSanXuat = '$tenhsxedit' , BiXoa = $tinhtrang where MaHangSanXuat = '$idedit' ";
        write($update);

	} 
    else {
        if(!file_exists("../assets/img"))
        {
            mkdir("../assets/img");
        }
		

		
            $tmp_name = $f["tmp_name"];
            $name = $f["name"];
            $destination = "../assets/img/";
            $destination=$destination.$_FILES["fileedit"]["name"];

            move_uploaded_file($tmp_name, $destination);
            $link = "assets/img/";
            $link=$link.$_FILES["fileedit"]["name"]; 
            $update = "update HangSanXuat set TenHangSanXuat = '$tenhsxedit' , BiXoa = $tinhtrang, LogoURL = '$link' where MaHangSanXuat = '$idedit' ";
            write($update);
		
    }
  

    
	
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

    <title>Admin | Quản lý Nhà Sản Xuất</title>

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
                                <h3 class="m-0 text-dark"> Quản lý Nhà Sản Xuất</h3>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>


                <div class="content">
                    <div class="container-fluid">
                        <div class="card-body">
                            <a href="#add" data-toggle="modal">
                                <button type='button' class='btn btn-success btn-sm mb-2'>
                                    <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Thêm Nhà Sản Xuất
                                </button>
                            </a>
                            <table id="example" cellspacing="0" class="table table-hover table-striped">
                                <thead class="thead-yellow" style="text-align:center">
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Tên Nhà Sản Xuất</th>
                                        <th scope="col">Tình Trạng</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $showhsx = "SELECT * FROM HangSanXuat";
                                    $rshsx = load($showhsx);
                                    while($rowhsx = $rshsx->fetch_assoc())
                                    {
                                    ?>
                                    <tr style="text-align:center">
                                        <td>
                                            <?php echo $rowhsx['MaHangSanXuat']; ?>
                                        </td>
                                        <td>
                                            <img src="../<?php echo $rowhsx['LogoURL']; ?>" class="img-size-100" />
                                        </td>
                                        <td>
                                            <?php echo $rowhsx['TenHangSanXuat']; ?>
                                        </td>

                                        <td>
                                            <?php if($rowhsx['BiXoa'] == '1')
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
                                                <a href="#edit<?php echo $rowhsx['MaHangSanXuat'];?>" data-toggle="modal">
                                                    <button class="btn btn-primary" data-title="Edit" data-toggle="modal"
                                                        data-target="#edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <a href="#delete<?php echo $rowhsx['MaHangSanXuat'];?>" data-toggle="modal">
                                                    <button class="btn btn-danger" data-title="Delete" data-toggle="modal"
                                                        data-target="#delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </a>

                                            </p>
                                        </td>
                                    </tr>

                                    <!--        khúc này là popup thông báo xóa Nhà sản xuất    -->

                                    <div id="delete<?php echo $rowhsx['MaHangSanXuat'];  ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <form method="post">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Xóa Nhà Sản Xuất</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="delete_id" value="<?php echo $rowhsx['MaHangSanXuat']; ?>">
                                                        <div class="alert alert-danger">Bạn có chắc muốn xóa Nhà này
                                                            <strong>
                                                                <?php echo $rowhsx['TenHangSanXuat']; ?>?</strong>
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
                                    <!--    kết thúc popup xóa Nhà sãn xuất-->


                                    <!--        khúc này là popup sửa Nhà sản xuất  -->

                                    <div id="edit<?php echo  $rowhsx['MaHangSanXuat'];  ?>" class="modal fade" role="dialog">
                                        <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Sửa Nhà sản xuất</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <input type="hidden" name="edit_id" value="<?php echo  $rowhsx['MaHangSanXuat']; ?>">
                                                        <div class="row">
                                                            <div class="col-sm-3" style="text-align:center">
                                                                <div>
                                                                    <img id="blahedit" for="file" src="../<?php echo $rowhsx['LogoURL']; ?>"
                                                                        class="img-size-150" />

                                                                    <div style="margin-top:10px">
                                                                        <label class="input-group-btn">
                                                                            <span class="btn btn-primary"> Chọn File
                                                                                Ảnh:
                                                                                <input type="file" id="imgInpedit" name="fileedit"
                                                                                    style="display: none;" />
                                                                            </span>
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label" for="item_nameedit">Tên
                                                                            Nhà Sản Xuất:</label>
                                                                        <input type="text" class="form-control" id="item_nameedit"
                                                                            name="item_nameedit" autofocus required
                                                                            value="<?php echo $rowhsx['TenHangSanXuat']  ?>" />
                                                                        <br />

                                                                    </div>

                                                                    <div class="col-sm-6">

                                                                        <label class="control-label" for="tinhtrangedit">Tình
                                                                            Trạng:</label>
                                                                        <select class="form-control" type="text" id="tinhtrangedit"
                                                                            name="tinhtrangedit" autofocus required>
                                                                            <option <?php if($rowhsx['BiXoa']==0) echo
                                                                                              "selected" ?> value="0">Hiện</option>
                                                                            <option <?php if($rowhsx['BiXoa']==1) echo
                                                                                              "selected" ?> value="1">Ẩn</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
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



                                    <!--      kết thúc popup sửa Nhà sản xuất -->


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

    <!--        khúc này là popup thêm Nhà sản xuất   -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Nhà Sản Xuất</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-3" style="text-align:center">
                                <div>
                                    <img id="blah" for="file" src="img/Photo-icon.png" class="img-size-150" />
                                    <div style="margin-top:10px">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary"> Chọn File Ảnh:
                                                <input type="file" id="imgInp" name="file" style="display: none;" />
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="item_name">Tên Nhà Sản Xuất:</label>
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
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
</body>

</html>