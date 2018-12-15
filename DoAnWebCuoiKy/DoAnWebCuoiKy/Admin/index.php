

<?php
session_start();

require_once '../lib/db.php';

if(isset($_SESSION['username']) && $_SESSION['role'] == 1)
{

    $demhangsx = "SELECT count( MaHangSanXuat) as SLHSX  FROM HangSanXuat where BiXoa = 0";

    $rshsx = load($demhangsx);
    while($rowhsx = $rshsx->fetch_assoc())
    {
        $soluonghsx=$rowhsx['SLHSX'];
    }

}
else
{
    header('Location: ../index.php');
}

if(isset($_POST['add_item'])){
    $item_name = $_POST['item_name'];
    $item_code = $_POST['item_code'];
    $item_category = $_POST['item_category'];
    $item_description = $_POST['item_description'];

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
		$destination = "assets/img/ava/$user/";
        $destination=$destination.$_FILES["file"]["name"];

		move_uploaded_file($tmp_name, $destination);
	}







    $sql = "INSERT INTO tbl_items (item_name,item_code,item_description,item_category,item_critical_lvl,item_date)VALUES ('$item_name','$item_code','$item_description','$item_category','$item_critical_lvl','$date')";







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
                        <a href="#add" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm mb-2'>
                                <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Thêm Sản Phẩm
                            </button>
                        </a>




                        <table id="example" cellspacing="0" class="table table-hover table-striped">
                            <thead class="thead-yellow" style="text-align:center">
                                <tr>
                                    <th scope="col"># </th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Số Lượng Bán</th>
                                    <th scope="col">Lượt Xem</th>
                                    <th scope="col">Ngày Nhập</th>
                                    <th scope="col">Hãng</th>
                                    <!--<th scope="col">Tình Trạng</th>-->

                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $rowsPerPage=10;
                                $curPage=1;
                                if(isset($_GET['page']))
                                    $curPage=$_GET['page'];
                                $offset=($curPage-1)*$rowsPerPage;
                                $showallsp = "SELECT *,hsx.TenHangSanXuat FROM SanPham as sp, hangsanxuat as hsx where sp.MaHangSanXuat = hsx.MaHangSanXuat order by sp.masanpham  LIMIT $offset,$rowsPerPage";

                                $rsall = load($showallsp);

                                while($rowall = $rsall->fetch_assoc())
                                {

                                    // $id = $rowall['MaSanPham'];
                                    //$hinhanh = $rowall['HinhURL'];
                                    //$TenHienThi = $rowall['TenSanPham'];
                                    //$gia = $rowall['GiaSanPham'];
                                    //$slton = $rowall['SoLuongTon'];
                                    //$slban = $rowall['SoLuongBan'];
                                    //$luotxem = $rowall['SoLuotXem'];
                                    //$ngaynhap = $rowall['NgayNhap'];
                                    //$tinhdang = $rowall['BiXoa'];
                                    //$hang = $rowall['TenHangSanXuat'];


                                ?>
                                <tr style="text-align:center">
                                    <th scope="row">
                                        <?php echo $rowall['MaSanPham']; ?>
                                    </th>
                                    <td>
                                        <img src="../<?php echo $rowall['HinhURL']; ?>" class="img-size-100" />
                                    </td>
                                    <td>
                                        <?php echo $rowall['TenSanPham']; ?>

                                    </td>
                                    <td>
                                        <?php echo number_format($rowall['GiaSanPham']); ?>
                                    </td>
                                    <td>
                                        <?php echo $rowall['SoLuong']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowall['SoLuongBan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowall['SoLuotXem']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowall['NgayNhap']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowall['TenHangSanXuat']; ?>
                                    </td>
                                    <!--<td>
                                        <?php if($rowall['BiXoa'] == '1')
                                              {
                                                  echo "Đang Ẩn";
                                              }
                                              else
                                              {
                                                  echo "Đang hiện";
                                              }



                                        ?>
                                    </td>-->
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
                                <?php
                                }

                                ?>
                            </tbody>

                        </table>


                        <div class="row">
                            <ul class="pagination mx-auto">

                                <?php
                                $demsp = "SELECT count( MaSanPham) as SLSP  FROM sanpham ";

                                $rs3 = load($demsp);
                                while($row3 = $rs3->fetch_assoc())
                                {
                                    $soluongsp=$row3['SLSP'];
                                }


                                $sotrang=ceil($soluongsp/$rowsPerPage);
                                ?>

                                <?php
                                if($curPage>1)
                                {
                                ?>
                                <li class="page-item ">
                                    <a href="index.php?page=1" style="font-size:16px;">Đầu </a>
                                </li>
                                <li class="page-item ">
                                    <a href="index.php?page=<?php echo $curPage-1; ?>" style="font-size:16px;">Trước</a>
                                </li>
                                <?php
                                }
                                for($page=1;$page<=$sotrang;$page++)
                                {
                                    if($page==$curPage)//không hiện liên kết ở trang đang đứng
                                        echo "<li class='page-item active'>  <a style='font-size:16px;'> ".$page."</a> </li>";
                                    else
                                        echo " <li class='page-item'>
                                    <a href='index.php?page=".$page. "'style='font-size:16px;''>".$page. " </a></li>  ";
                                }
                                if($curPage<$sotrang)
                                {
                                ?>
                                <li class='page-item'>
                                    <a href="index.php?page=<?php echo $curPage+1; ?>" style="font-size:16px;">Sau </a>
                                </li>
                                <li class='page-item'>
                                    <a href="index.php?page=<?php echo $sotrang; ?>" style="font-size:16px;"> Cuối</a>
                                </li>
                                <?php
                                }
                                ?>


                            </ul>
                        </div>
                    </div>



                </div>

            </div>
        </div>

    </div>
    <?php
    include 'modules/footer.php';
    ?>
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Sản Phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>




                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3" style="text-align:center">

                                <div>

                                    <img id="blah" for="file" src="img/user2-160x160.jpg" class="img-size-150" />

                                    <div style="margin-top:10px">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Chọn File Ảnh:
                                                <input type="file" id="imgInp" name="file" style="display: none;" />
                                            </span>
                                        </label>
                                        <input type="file" class="form-control" id="imgInp" name="file" hidden />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label class="control-label" for="item_name">Tên Sản Phẩm:</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name" autofocus required />
                                            <br />
                                            <label class="control-label" for="item_date">Ngày Nhập:</label>
                                            <input type="text" class="form-control" id="item_date" name="item_date" readonly value="<?php  echo $today = date('Y-m-d H:i:s');?>" />
                                            <br />
                                            <label class="control-label" for="item_sl">Số Lượng:</label>
                                            <input type="number" class="form-control" id="item_sl" name="item_sl" autofocus required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" for="item_gia">Giá Sản Phẩm:</label>
                                            <input type="number" class="form-control" id="item_gia" name="item_gia" required />
                                            <br />
                                            <label class="control-label" for="item_view">Số Lượt Xem:</label>
                                            <input type="number" class="form-control" id="item_view" name="item_view" readonly value="0" />
                                            <br />
                                            <label class="control-label" for="item_slb">Số Lượng Bán:</label>
                                            <input type="number" class="form-control" id="item_slb" name="item_slb" readonly value="0" />
                                            <br />
                                            <label class="control-label" for="item_hsx">Hãng:</label>
                                            <select class="form-control" type="text" id="item_hsx" name="item_hsx" autofocus required></select>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label" for="item_sub_category">Mô Tả:</label>

                                        <textarea class="form-control" id="item_description" name="item_description" autocomplete="off" required></textarea>

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


        var select = document.getElementById("item_hsx");
        for (var i = <?php echo $soluonghsx; ?>; i >= 1; --i) {
            var option = document.createElement('option');
            option.text = option.value = i;
            select.add(option, 0);
        }
    </script>
</body>
</html>
