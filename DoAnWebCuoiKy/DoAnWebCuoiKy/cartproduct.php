<?php
session_start();
require_once 'lib/db.php';
if(!isset($_SESSION['username']))
{
    header('Location: Login.php');
}
else{
    if(!isset($_GET["idsanpham"]))
    {
        header('Location: index.php');
    }
    $maSP = $_GET["idsanpham"];


    $querychonsanphamthemvaogiohang = "SELECT * FROM sanpham where MaSanPham = $maSP";
    $rsthemspvaogio = load($querychonsanphamthemvaogiohang);

    while($rowthemspvaogio = $rsthemspvaogio->fetch_assoc())
    {
        if (!isset($_SESSION['cart'])) //Nếu như cart chưa tồn tại -> tạo mới
        {
            $_SESSION['cart'][$maSP]['MaTaiKhoan'] = $_SESSION['username'];
            $_SESSION['cart'][$maSP]['MaSanPham'] = $maSP;
            $_SESSION['cart'][$maSP]['MaLoaiSanPham'] = $rowthemspvaogio["MaLoaiSanPham"];
            $_SESSION['cart'][$maSP]['TenSanPham'] =  $rowthemspvaogio["TenSanPham"];
            //$_SESSION['cart'][$maSP]['SoLuongConLai'] =$rsthemspvaogio["SoLuongConLai"];
            $_SESSION['cart'][$maSP]['HinhURL'] = $rowthemspvaogio["HinhURL"];
            $_SESSION['cart'][$maSP]['SoLuong'] = 1;
            $_SESSION['cart'][$maSP]['Gia'] = $rowthemspvaogio["GiaSanPham"];
            $_SESSION['cart'][$maSP]['ThanhTien'] = $_SESSION['cart'][$maSP]['SoLuong'] * $_SESSION['cart'][$maSP]['Gia'];
            $trangtruoc = $_SERVER['HTTP_REFERER'];
            header('Location: '.$trangtruoc.'');

        }
        else
        {
            if (isset($_SESSION['cart'][$maSP])) // Nếu trong cart đã tồn tại sản phẩm đó -> tăng số lượng, tính lại thành tiền
            {
                $_SESSION['cart'][$maSP]['SoLuong'] += 1;
                $_SESSION['cart'][$maSP]['ThanhTien'] = $_SESSION['cart'][$maSP]['SoLuong'] * $_SESSION['cart'][$maSP]['Gia'];
                $trangtruoc = $_SERVER['HTTP_REFERER'];
                header('Location: '.$trangtruoc.'');
            }
            else // Chưa tồn tại trong cart -> thêm mới
            {
                $_SESSION['cart'][$maSP]['MaTaiKhoan'] = $_SESSION['username'];
                $_SESSION['cart'][$maSP]['MaSanPham'] = $maSP;
                $_SESSION['cart'][$maSP]['MaLoaiSanPham'] = $rowthemspvaogio["MaLoaiSanPham"];
                $_SESSION['cart'][$maSP]['TenSanPham'] =  $rowthemspvaogio["TenSanPham"];
                //$_SESSION['cart'][$maSP]['SoLuongConLai'] =$rsthemspvaogio["SoLuongConLai"];
                $_SESSION['cart'][$maSP]['HinhURL'] = $rowthemspvaogio["HinhURL"];
                $_SESSION['cart'][$maSP]['SoLuong'] = 1;
                $_SESSION['cart'][$maSP]['Gia'] = $rowthemspvaogio["GiaSanPham"];
                $_SESSION['cart'][$maSP]['ThanhTien'] = $_SESSION['cart'][$maSP]['SoLuong'] * $_SESSION['cart'][$maSP]['Gia'];
                $trangtruoc = $_SERVER['HTTP_REFERER'];
                header('Location: '.$trangtruoc.'');
            }
        }
    }
}

?>