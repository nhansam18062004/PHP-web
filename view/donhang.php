<?php
$html_tong=get_tongdonhang();
$html_ttcart=ttcart();
$ttt=number_format($html_tong,0,".",".");
$ship=0;

if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
    extract($_SESSION['s_user']);
    $userinfo=get_user($matk);
    $_SESSION['s_user']=$userinfo;
    extract($userinfo);
}


if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
    extract($_SESSION['s_user']);
    $html='<p>Xin chào <span style="font-size: 20px">'.$tendangnhap.' </span></p>';
    $html_input='<label for="hovaten">Họ và tên:</label> <br>
                <input type="text" id="hovaten" name="hovaten" placeholder="Họ và tên" value="'.$hovaten.'" required> <br>

                <div class="col2">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Email" value="'.$email.'" required> <br>
                </div>
                <div class="col2">
                    <label for="sdt">Số điện thoại</label><br>
                    <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại" value="'.$sodienthoai.'"" required><br>
                </div>

                <div class="select">
                            <label for="diachi">Địa chỉ:</label> <br>
                            <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ" value="'.$diachi.'" required> <br>
                            
                </div>';
}else {
                $html='<p>Bạn đã có tài khoản?<a href="index.php?pg=dangnhap"> <span>Đăng nhập</span></a> </p>';

                $html_input='<label for="hovaten">Họ và tên:</label> <br>
                <input type="text" id="hovaten" name="hovaten" placeholder="Họ và tên" required> <br>

                <div class="col2">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Email" required> <br>
                </div>
                <div class="col2">
                    <label for="sdt">Số điện thoại</label><br>
                    <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại" required><br>
                </div>

                <div class="select">
                            <label for="diachi">Địa chỉ:</label> <br>
                            <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ" required> <br>
                            
                </div>';
}

if (isset($_SESSION['voucher'])&&(count($_SESSION['voucher'])>0)) {
    extract($_SESSION['voucher']);
    $giagiam=number_format($giam,0,".",".");
    $html_voucher='<p >Tạm tính: '.$ttt.' đ</p>
                    <p >Giảm: '.$giagiam.' đ</p>
                    <p>Phí vận chuyển: <span>Freeship</span> </p>';
}else {
    $html_voucher='<p >Tạm tính: '.$ttt.' đ</p>
            <p>Phí vận chuyển: <span>Freeship</span> </p>';;
}



if (isset($_SESSION['voucher'])) {
    extract($_SESSION['voucher']);
    $giamvoucher=''.$giam.'';
    $thanhtoan=($html_tong - $giamvoucher) + $ship;
    }
else {
    $giamvoucher=0;
    $thanhtoan=($html_tong-$giamvoucher)+$ship;

}
$ttvoucher=number_format($thanhtoan,0,".",".");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="layout/style.css">
</head>
<style>
    input[type=email],input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
    }
    .col2{
    float: left;
    width: 45%;
    margin-right: 10px;
    margin-bottom: 10px;
    }
    #hovaten{
        width: 92%;
        margin-bottom: 10px;
    }
    #email{
        width: 100%;
    }
    #sdt{
        width:100%;
    }
    #diachi{
        width: 98%;
    }
    input[type=submit] {
    width: 20%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
    }

    .select {
        clear: both;
        width: 85%;
        border: 1px  solid #e4dcdc;
        padding: 20px;
        margin-top: 10px;
        border-radius: 4px;

    }
    select{
        width: 32%;
    }
    .logo{
        display: flex;
        flex-direction: row;
        /* margin-top: 20px; */
        margin-left: -30px;
    }
    .tensp{
        width: 70%;
    }
    .giasp{
        width:100% ;
    }
    .logo h2{
        margin-top:40px;
    }
    .footer-checkout{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 15px;
    }
    .footer-checkout input{
        margin-right: 48px;
    }


</style>
<body>

    <section class="containerfull">
        <div class="container">
            <div class="col thongtin ">
                <div class="logo">
                    <img src="layout/img/alibushop.png" width="150px" alt="">
                    <h2>ALIBU SHOP</h2> <br>
                </div>
                     <h2 style="margin-top: 0px;font-size: 20px;">Thông tin đơn hàng</h2>
                    <?=$html;?>
                <div>
                        <form action="index.php?pg=addbill" method="post">

                                <?=$html_input;?>
                                <input type="hidden" name="giathanhtoan" value="<?=$thanhtoan?>">
                                <input type="hidden" id="phuongthucthanhtoan" name="phuongthucthanhtoan" value="<?=$pttt?>">
                                <input type="hidden" name="matk" value="<?=$matk?>">

                                <input type="hidden" name="mk" value="<?=$matkhau?>">


                                <div class="footer-checkout">
                                    <a href="index.php?pg=viewcart">Quay lại</a>
                                    
                                    <input type="submit" name="thanhtoan" value="Thanh toán">
                                </div>
                        </form>     

                </div>
            </div>
            <div class="col tongthanhtoan">
                <h2>ĐƠN HÀNG</h2>
                <div class="total">
                    <table class="bill">
                    <?=$html_ttcart;?>
                    </table>
                    <div class="coupon">
                    <form action="index.php?pa=donhang&&voucher=1" method="post">
                        <input type="hidden" name="tongdonhang" value="<?=$html_tong?>">
                        <input type="text" name="mavoucher" placeholder="Mã giảm giá">
                        <button type="submit" class="sudung">Sử dụng</button>
                    </form>
                    <span style="font-size:15px">
                    <?php
                            if (isset($_SESSION['tb_voucher'])&&($_SESSION['tb_voucher']!="")) {
                                echo $_SESSION['tb_voucher'];
                                unset ($_SESSION['tb_voucher']);
                            }
                            ?>
                    </span>
                </div>
                    <div class="boxcart" >
                    <?=$html_voucher;?>
                    </div>
                </div>
                
            
                <div class="pttt">
                    <div class="boxcart">
                    <h3>Phương thức thanh toán: </h3>   
                    <form id="ptttbox">
                        <input type="radio" id="pttt1" name="pttt" class="pttt" value="0" >
                        <label for="cod">Tiền mặt</label><br>
                        <input type="radio" id="pttt2" name="pttt" class="pttt" value="1">
                        <label for="momo">Momo</label><br>
                        <input type="radio" id="pttt3" name="pttt" class="pttt" value="2">
                        <label for="chuyenkhoan">Chuyển khoản</label><br><br>
                    </form>
                    </div>

                </div>
                <div class="total">
                    <div class="boxcart bggray">
                        <h3>Tổng thanh toán: <?= $ttvoucher?> đ</h3>
                    </div>
                </div>
            </div>        
        </div>
    </section>

<script>
            
       

                function valueChange(event){
                let checkValue = fruitform.elements['pttt'].value;
                console.log(    checkValue);
                document.getElementById('phuongthucthanhtoan').value = checkValue;
                }

                let fruitform = document.getElementById('ptttbox');
                fruitform.elements[0].checked = true;
                fruitform.addEventListener('change', valueChange);
            
                
</script>


  

    <!-- <script>
        var ttnhanhang=document.getElementById("ttnhanhang");
        ttnhanhang.style.display="none";
        function showttnhanhang(){
            if(ttnhanhang.style.display=="none"){
                ttnhanhang.style.display="block";
            }else{
                ttnhanhang.style.display="none";
            }
        } -->
        

    <!-- </script> --> 


    

</body>

</html>