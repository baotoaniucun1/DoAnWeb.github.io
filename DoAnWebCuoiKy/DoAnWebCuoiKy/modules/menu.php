
<div class="col-12" style="width: 100%; display: grid;">

    <div class="navbar">
        <?php 
            $idropdown = 1;
                   
            while ($idropdown<5) 
            { 
                switch($idropdown)
                    {
                        case 1:
                            $phankhuc = "Phân Khúc Cao Cấp";
                            $giatien = "sp.GiaSanPham > 12000000";
                            $idloai = 1;
                            break; 
                               
                        case 2:
                            $phankhuc = "Phân Khúc Cận Cao Cấp";
                            $giatien = "sp.GiaSanPham > 7000000 and sp.GiaSanPham <= 12000000";
                            $idloai = 2;
                            break; 
                        case 3:
                            $phankhuc = "Phân Khúc Tầm Trung";
                            $giatien = "sp.GiaSanPham > 4000000 and sp.GiaSanPham <= 7000000";
                            $idloai = 3;
                            break; 
                        case 4:
                            $phankhuc = "Phân Khúc Giá Rẻ";
                            $giatien = "sp.GiaSanPham <= 4000000";
                            $idloai = 4;
                            break; 

                    }
                    
        ?>
                <div class="dropdown1">
                <button class="dropbtn">
                <a href="product.php?maloai=<?php echo $idloai?>"><?php echo $phankhuc ?>  </a>
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <?php
                    $ilogo = 1;

                     $querydemlogo = "SELECT * FROM hangsanxuat as hsx where hsx.BiXoa = 0 ";
                     $rsdemlogo = load($querydemlogo);
                     while($rowdemlogo = $rsdemlogo->fetch_assoc())
                     {
                         $ilogo = $rowdemlogo["MaHangSanXuat"];
                    $query = "SELECT * FROM hangsanxuat as hsx where hsx.MaHangSanXuat = $ilogo ";
                    $rs = load($query);

                    while($row = $rs->fetch_assoc())
                    {
                    ?>
                        <div class="column">
                        <a class="logo" href="product.php?mahangsx=<?php echo $ilogo?>"><img src="<?php echo $row['LogoURL']; ?>"  style="height:50px" alt=""></a>
                            <?php

                        $query1 = "SELECT sp.TenSanPham,sp.MaSanPham,sp.GiaSanPham FROM sanpham as sp , hangsanxuat as hsx  where sp.MaHangSanXuat = hsx.MaHangSanXuat and hsx.MaHangSanXuat = $ilogo and $giatien LIMIT 5";
                        $rs1 = load($query1);
                       

                        while($row1 = $rs1->fetch_assoc())
                        {
                            ?>
                            <a class="sp" href="details.php?idsanpham=<?php echo $row1['MaSanPham']; ?>"><?php echo $row1['TenSanPham']; ?>: <span class="giasp"style="float:right;color: #ed5565"><?php echo number_format($row1['GiaSanPham']); ?></span></a>

        <?php
                        }
        ?>
                        </div>
                       
        <?php
                        
                    }
                   
                }
        ?>
                 <!-- <div class="column"></div>  -->
                </div>
                </div>
        <?php       
               $idropdown = $idropdown + 1;
            }
        ?>
        
    </div>




</div>