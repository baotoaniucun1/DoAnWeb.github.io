
<?php


if (!isset($_SESSION['cart']))
{
    $dem =0;
}
else
{
    $cart = $_SESSION['cart'];
    $dem =0;
    foreach($cart as $value)
    {
        $dem +=$value['SoLuong'];
    }

    $d = sizeof($_SESSION["cart"]);
    if(  $d == 0)
    {
        unset($_SESSION['cart']);
    }
}


if (isset($_POST["btndangxuat"])) {

    header('Location: Logout.php');
}

?>

<script>
    function lightbg_clr() {
        $('#qu').val("");
        $('#textbox-clr').text("");
        $('#search-layer').css({ "width": "auto", "height": "auto" });
        $('#livesearch').css({ "display": "none" });
        $("#qu").focus();
    };

    function fx(str) {
        var s1 = document.getElementById("qu").value;
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            document.getElementById("search-layer").style.width = "auto";
            document.getElementById("search-layer").style.height = "auto";
            document.getElementById("livesearch").style.display = "block";
            $('#textbox-clr').text("");
            return;
        }
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                document.getElementById("search-layer").style.width = "100%";
                document.getElementById("search-layer").style.height = "100%";
                document.getElementById("livesearch").style.display = "block";
                $('#textbox-clr').text("X");
            }
        }
        xmlhttp.open("GET", "../api/call_ajax.php?n=" + s1, true);
        xmlhttp.send();
    }
</script>




<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">

        <div class="col-4">
            
            <form class="input-group" method="get" action="../search.php">
                <input type="text" class="form-control" placeholder="Tìm kiếm..." onkeyup="fx(this.value)" autocomplete="off" name="qu" id="qu" />
                <span class="input-group-btn">
                    <button class="btn btn-search" type="submit" tabindex="2">
                        <i class="fa fa-search fa-fw"></i> Tìm
                    </button>

                </span>

                <div id="livesearch"></div>
            </form>




        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">CHÍCH CHÒE SHOP</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <?php


            // trường hợp đăng nhập bằng member
            if(isset($_SESSION['username']) && $_SESSION['role'] == 0)
            {
                if($dem<=0)
                {
                    echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="cart.php">
                            <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
                             </a>';
                    echo  $member = '<form method="POST" style="margin-block-end: unset;"><div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="../profile.php?user='.$_SESSION['username'].'">Thông Tin Tài Khoản</a>
                             <a class="dropdown-item" href="orderhistory.php">Lịch Sử Mua Hàng</a>
                        <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </form>';
                }
                else
                {
                    echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="cart.php">
                     <span class="badge badge-danger">'.$dem.'</span>
                <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
                      </a>';
                    echo  $member = '<form method="POST" style="margin-block-end: unset;"><div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a  data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="../profile.php?user='.$_SESSION['username'].'">Thông Tin Tài Khoản</a>
                         <a class="dropdown-item" href="orderhistory.php">Lịch Sử Mua Hàng</a>
                        <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </form>';
                }

                echo $register = '';

            }
            // trường hợp đăng nhập bằng admin
            elseif(isset($_SESSION['username']) && $_SESSION['role'] == 1) {
                if($dem<=0)
                {
                    echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="cart.php">
                            <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
                             </a>';
                    echo $member = '<form method="POST" style="margin-block-end: unset;">
                    <div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="../profile.php?user='.$_SESSION['username'].'">Thông Tin Tài Khoản</a>
                         <a class="dropdown-item" href="orderhistory.php">Lịch Sử Mua Hàng</a>
                      <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </div>
 </form>';
                    echo  $register = '<a class="btn btn-sm btn-giohang1 ml-2" href="Admin/index.php"> <span class="glyphicon glyphicon-user"></span> Administrator</a></li>';

                }
                else{
                    echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="cart.php">
    <span class="badge badge-danger">'.$dem.'</span>
<span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
   </a>';
                    echo $member = '<form method="POST" style="margin-block-end: unset;">
                    <div class="dropdown ml-2">
                    <button class="btn btn-sm btn-giohang1"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <a data-toggle="dropdown">'.$_SESSION['TenHienThi'].'</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="../profile.php?user='.$_SESSION['username'].'">Thông Tin Tài Khoản</a>
                        <a class="dropdown-item" href="orderhistory.php">Lịch Sử Mua Hàng</a>
                      <button name="btndangxuat" type="submit" class="dropdown-item">Đăng Xuất</button>
                    </div>
                </div>
 </form>';
                    echo  $register = '<a class="btn btn-sm btn-giohang1 ml-2" href="Admin/index.php"> <span class="glyphicon glyphicon-user"></span> Administrator</a></li>';

                }

            }
            // trường hợp chưa đăng nhập
            else {
                echo $card = '<a class="btn btn-sm btn-giohang1 ml-2 btn-5" href="cart.php">

            <span class="glyphicon glyphicon-shopping-cart gly-flip-horizontal"></span>
                                        </a>';
                echo $member = ' <a class="btn btn-sm btn-giohang1 ml-2" href="login.php">Đăng Nhập</a>';
                echo $register = '<a class="btn btn-sm btn-giohang1 ml-2" href="register.php">Đăng Ký</a>';

            }


            ?>



        </div>
    </div>
</header>


