
  <?php
  session_start();
      require_once "lib/db.php";
      
        if(!isset($_GET["id"]))
        {  
            header('Location: index.php');
        }
        $masp = $_GET["id"];
        
        $query = "SELECT mt.*,sp.HinhURL,sp.TenSanPham,sp.GiaSanPham FROM sanpham as sp , motasanpham as mt
                    where sp.MaSanPham = mt.MaSanPham and sp.MaSanPham = $masp";
       
         $rs = load($query);
        
             while($row = $rs->fetch_assoc())
                {
                   $hinh = $row['HinhURL']; 
                  $tensp= $row['TenSanPham']; 
                   $gia= number_format($row['GiaSanPham']);
                   $manhinh = $row['ManHinh']; 
                    $hedieuhanh= $row['HeDieuHanh'];
                   $camerasau =  $row['CameraSau']; 
                     $cameratruoc = $row['CameraTruoc']; 
                     $cpu = $row['CPU']; 
                    $ram=   $row['RAM']; 
                     $bonhotrong=   $row['BoNhoTrong']; 
                      $thesim =  $row['TheSim'];
                        $dungluongpin = $row['DungLuongPin']; 
                        

                }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
<?php
    include 'modules/include.php';
    ?>
   
    <title><?php echo  $tensp ?></title>
    

</head>

<body>
    <div class="container">
        <?php
        include 'modules/header.php';
        include 'modules/menu.php';
        ?>


       
      
            <div class="row" style="padding-top:40px">
                <div class="col-4 my-auto">

                    <div class="preview_image">
                        <div class="preview-small">
                            <img data-scale="2.4" id="zoom_03" src="  <?php echo  $hinh ?>" alt="Product name">
                          
                        </div>
                    </div>

                </div>

                <div class="col-8 border">
                    <h3 class="name" style="color:red;padding-top:20px;">
                    <?php echo  $tensp ?>
                    </h3>
                    <p>
                        <p>02 Lượt mua │ Lượt xem</p>
                        <p style="font-size:14px; color:blue;">Xuất Xứ: │Loại Sản phẩm:│Nhà Sản Xuất: </P>
                    </p>
                    <p style="font-size:15px;">
                        <clr></clr>

                    </p>
                    <hr class="border">
                    <div class="price">
                        Giá :
                        <span class="new_price">
                        <?php echo  $gia ?>
                            <sup>₫
                            </sup>
                        </span>
                    </div>
                    <hr class="border">
                    <div class="wided">
                        <div class="qty">
                            Số Lượng: &nbsp;&nbsp;:
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <a class="btn btn-sm btn-outline-secondary" href="#">Thêm vào giỏ hàng <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span></a>
                        </div>


                    </div>

                </div>
            </div>

            <div class="row" style="padding-top:30px">

                <table class="table table-bordered">
                    <tbody>
                        <tr class="techSpecRow">
                            <th colspan="2">
                                <h3 style="color:red; font-weight:bold; font-style:italic"> Thông số kỹ thuật</h3>
                            </th>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Màn hình:</td>
                            <td class="techSpecTD2"><?php echo  $manhinh ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Hệ điều hành:</td>
                            <td class="techSpecTD2"><?php echo  $hedieuhanh ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Camera sau:</td>
                            <td class="techSpecTD2"><?php echo  $camerasau ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Camera trước:</td>
                            <td class="techSpecTD2"><?php echo  $cameratruoc ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">CPU:</td>
                            <td class="techSpecTD2"><?php echo  $cpu ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">RAM:</td>
                            <td class="techSpecTD2"><?php echo  $ram ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Bộ nhớ trong:</td>
                            <td class="techSpecTD2"><?php echo  $bonhotrong ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Thẻ Sim:</td>
                            <td class="techSpecTD2"><?php echo  $thesim ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Dung Lượng Pin</td>
                            <td class="techSpecTD2"><?php echo  $dungluongpin ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
               
        



       
    </div>
    <?php
        include 'modules/footer.php';
        ?>
    <script src="/assets/js/theme-bundle.main.js"></script>
   

</body>

</html>