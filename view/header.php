<?php

if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
    extract($_SESSION['s_user']);
    $html_account='<a href="index.php?pg=viewcart"><img src="layout/img/cart-outline.svg" width="23px" alt=""></a>
                <a href="index.php?pg=myaccount">'.$tendangnhap.'</a>
                <a href="index.php?pg=logout">Thoát</a>';
}else {
    $html_account='<a href="index.php?pg=dangnhap"><img src="layout/img/person-outline.svg" width="23px" alt=""></a>
                    <a href="index.php?pg=viewcart"><img src="layout/img/cart-outline.svg" width="23px" alt=""></a>';
}

$html_dm=show_dm($danhmuc);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alibu Shop</title>
    <link rel="stylesheet" href="layout/style.css">

</head>

<body>
    <div class="containerfull">
        <div class="header">
            <p>Black Friday -  <span>Free ship </span>cho tất cả đơn hàng</p>
        </div>
    
        <div class="header2">
            <div class="right">
                <div class="col1">
                <form action="index.php?pg=sanpham" method="post">
                    <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                    <button name="timkiem" class="timkiem"><img src="layout/img/search-outline.svg" width="23px" alt=""></button>
                </form>
                </div>
                <div class="col1">
                <?=$html_account;?>   
                </div>             
            </div>
        </div>
    </div>
    <div class="containerfull">
        <div class="container">
   
            <div class="menu"  >
                <div class="col7">
                    <a href="index.php">TRANG CHỦ</a>
                    <a href="index.php?pg=chinhsachdoitra">CHÍNH SÁCH ĐỔI TRẢ</a>
                    <img src="layout/img/alibushop.png" width="250px" alt="">              
                    <a href="index.php?pg=bangsize">BẢNG SIZE</a>
                    <a href="">HỆ THỐNG CỬA HÀNG</a>    
                </div>
                <div class="dm">
                    <hr>
                    <?=$html_dm;?>
                </div>
            </div>
        </div>
    </div>