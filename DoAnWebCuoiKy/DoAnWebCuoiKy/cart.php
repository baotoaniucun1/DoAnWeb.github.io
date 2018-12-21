<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('Location: Login.php');
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include 'modules/include.php';
    ?>
    <title>Chíc Chòe Shop</title>
</head>

<body>

    <div class="container">


        <?php
        include 'modules/header.php';
        include 'modules/menu.php';
        ?>

        <div class="col-md-12 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom" style="padding-top:10px">
                <span style="color:red">
                    Giỏ Hàng Của Tôi
                </span>
            </h3>

            <?php

          


            ?>
            <table id="example" cellspacing="0" class="table table-hover">
                <thead class="thead-yellow" style="text-align:center">


                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        
                        <th scope="col">Tổng Tiền</th>
                        <!--<th scope="col">Tình Trạng</th>-->

                      
                    </tr>


                </thead>
                <tbody>
                    <?php $cart = $_SESSION['cart'];
                          $demsl = 0;
                          $stt = 1;
                          $tongtien =0;
                          foreach($cart as $value): ?>
                    <tr style="text-align:center;">
                        <td>
                            <?php echo $stt; $stt+=1; ?>
                        </td>
                        <td>
                            <img src="../<?php echo $value['HinhURL']; ?>" class="img-size-100" />
                        </td>
                        <td>
                            <?php echo  $value['TenSanPham'];  ?>
                        </td>
                        <td >
                            <?php echo  number_format($value['Gia']);  ?> đ
                           
                        </td>
                        <td  >
                            <?php echo $value['SoLuong'];
                                  $demsl += $value['SoLuong'];
                            ?>
                        </td>
                        <td>
                            <?php echo  number_format($value['ThanhTien']);
                                  $tongtien += $value['ThanhTien'];
                            ?> đ
                        </td>
                    </tr>
                    <?php endforeach ?>

                    <tr style="background:#00ff90;font-weight:bold  ">

                        <td colspan="4" style="color:red;font-weight:bold;text-align:right;">
                            Tổng:
                        </td>
                        <td style="text-align:center;">
                            <?php  echo $demsl;?>
                        </td>
                        <td style="text-align:center;">
                            <?php  echo number_format($tongtien);?> đ 

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>







    </div>
    <?php   include 'modules/footer.php'; ?>


    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>

</body>

</html>