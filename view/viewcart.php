
<?php
$html_tong=get_tongdonhang();

$tonggiohang=number_format($html_tong,0,".",".");

if (isset($_POST["donhang"])&&($_POST["donhang"])) {
  $donhang=$_POST["donhang"];
}
unset ($_SESSION['voucher']);

// $html_cart=viewcart();

$html_cart='';
$i=0;
foreach ($_SESSION["giohang"] as $value) {
extract($value);
$tt=(int)$giasp*(int) $soluong;
$ttt=number_format($tt,0,".",".");

$format_giasp = number_format($giasp,0,".",".");

$html_cart.='<tr>
      
                <td><a href="index.php?pg=sanphamchitiet&idpro='.$masp.'"><img src="layout/img/'.$anhsp.'" alt="" style="width:150px;"></a> </td>
                <td><div class="tensp">'.$tensp.' <br>
                                       <div id="gia">'.$giasp.'</div> đ <br>
                                        size: '.$size.'
                </div></td>
                <td class="xoa">    
                <div class="soluon">
                <input type="button" class="minus-btn" onclick="handleMinus()" value="-"></input>
                <div class="boxsoluong2">
                    <input type="text" name="soluong" id="soluong" min="1" value="'.$soluong.'" max="10" width="10px">
                </div>
                <input type="button" class="plus-btn" onclick="handlePlus()" value="+"></input>
                </div>
                <a  href="index.php?pg=viewcart&del='.$i.'" id="idsp">Xóa</a>           
                    </td>
                <td><span id="ttt">'.$ttt.'đ</span></td>
            </tr>' ;
        $i++;

}
?>


    <main>
        <div class="container">
        <div class="col viewcart">
                <h2>Giỏ hàng</h2>
            <table>
             
                
               <?=$html_cart;?>
            </table>    
            <?php
            if ($_SESSION["giohang"]==[]) {
                ?>
                <div class="no-item">
                <p>Giỏ hàng của bạn đang trống. Mời bạn mua thêm sản phẩm  <a href="index.php"><span>tại đây.</span></a> </p>
                </div>
                <?php
            }
                else{
            ?>
                <a href="index.php?pg=viewcart&delall">Xoá hết tất cả</a>
            <?php
            }
            ?>
        </div>

        <div class="col tt">
            <h2>Thông tin đơn hàng</h2>
            <div class="total">
                <hr>
                <h3>Tổng tiền: <span id> <?=$tonggiohang?>đ  </span></h3>
            </div>

            <?php
            if ($_SESSION["giohang"]==[]) {
                ?>
                <div class="total">
                    <hr>
                    <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                    <h3>Ghi chú đơn hàng: </h3>
                    <input type="text" name="ghichu" placeholder="Ghi chú (nếu có)">
                </div>
                <a href=""><button class="thanhtoan" name="donhang" type="submit">Thanh toán</button></a>
                <?php
            }
                else{
            ?>
              
            <form action="index.php?pa=donhang" method="post">
                    <input type="hidden" name="tongdonhang" value="<?=$html_tong?>">
                    <div class="total">
                        <hr>
                        <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                        <h3>Ghi chú đơn hàng: </h3>
                        <input type="text" name="ghichu" placeholder="Ghi chú (nếu có)">
                    </div>
                    <!-- <input type="text" id="aa" name= "aa" value=""> -->
                
                    <a href="view/donhang.php"><button class="thanhtoan" name="donhang" type="submit" style="cursor: pointer">Thanh toán</button></a>
            </form>

            <?php
            }
            ?>      
            <p><a href="index.php">Tiếp tục mua hàng</a></p>
        </div>
    

        </div>
        </main>
<!-- <script>

        let soluongElement = document.getElementById('soluong');
        let soluong = soluongElement.value;
            
        // console.log(amountElement);
        let render = (soluong) =>{
            soluongElement.value = soluong
        }
        //handle Plus
        let handlePlus = () =>{
            console.log(soluong);
            
            if (soluong < 10) {
                soluong++
            }
            render(soluong);
        }
        //handle minus
        let handleMinus = () =>{
            if (soluong > 1) {
                soluong--;
            }
            console.log(soluong);
            render(soluong);

        }

        soluongElement.addEventListener('input', () =>{
            soluong = soluongElement.value;
            soluong = parseInt(soluong);
            soluong = (isNaN(soluong)||soluong==0)?1:soluong;
            render(soluong);
            console.log(soluong);
        } );
</script>
 -->

<script>
    let soluongElement = document.getElementById('soluong');
    let soluong = soluongElement.value;
    let gia = document.getElementById("gia").innerText;
    let id = document.getElementById('idsp');

    

        const VND = new Intl.NumberFormat('vi-VN', {

        currency: 'VND',
        });

        let render = (soluong) =>{
            soluongElement.value = soluong
        }
        //handle Plus
        let handlePlus = () =>{
            console.log(soluong);
            
            if (soluong < 10) {
                soluong++  

            }
            render(soluong);
            var tt= gia*soluong;
            document.getElementById('ttt').innerText=VND.format(tt)+'đ'
            // document.getElementById('aa').value=VND.format(tt)+'đ'

        }
        //handle minus
        let handleMinus = () =>{
            if (soluong > 1) {
                soluong--;
            
            }
            console.log(soluong);
            render(soluong);
            var tt= gia*soluong;
            document.getElementById('ttt').innerText=VND.format(tt)+'đ'
            // document.getElementById('aa').value=VND.format(tt)+'đ'

        }

        soluongElement.addEventListener('input', () =>{
            soluong = soluongElement.value;
            soluong = parseInt(soluong);
            soluong = (isNaN(soluong)||soluong==0)?1:soluong;
            render(soluong);
            console.log(soluong);
        } );
 
</script>
    