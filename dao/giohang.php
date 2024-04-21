<?php

// function cart_insert( $tensp, $anhsp,  $giasp , $soluong, $diachi, $thanhtoan,$voucher, $pttt){
//     $sql = "INSERT INTO donhang(madh, hovaten ,email, sodienthoai, diachi, tongtien,voucher, pttt) VALUES (?, ?, ?, ?, ?, ?,?, ?)";
//     pdo_execute($sql, $madh, $hovaten, $email , $sdt, $diachi, $thanhtoan,$voucher, $pttt);
// }


function viewcart(){
    $html_cart='';
    $i=1;
foreach ($_SESSION["giohang"] as $value) {
    extract($value);
    $tt=(int)$giasp*(int)$soluong;
    $ttt=number_format($tt,0,".",".");
   
    $format_giasp = number_format($giasp,0,".",".");

    $html_cart.='<tr>
          
                    <td><a href="index.php?pg=sanphamchitiet&idpro='.$masp.'"><img src="layout/img/'.$anhsp.'" alt="" style="width:150px;"></a> </td>
                    <td><div class="tensp">'.$tensp.' <br>
                                            '.$format_giasp.' đ <br>
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
                       
                        <a  href="index.php?pg=viewcart&del='.$i.'">Xóa</a>           
                        </td>
                    <td><span>'.$ttt.' đ</span></td>
                </tr>' ;
            $i++;
            
}
return  $html_cart;
}
function get_tongdonhang(){
    $tong=0;
    $i=1;
    $ttt=0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt=(int)$giasp*(int)$soluong;
        $tong+=$tt;
        // $ttt=number_format($tong,0,".",".");

        // $format_giasp = number_format($giasp,0,".",".");
    
    }
    return $tong;
}


function ttcart(){
    $html_ttcart='';
    $i=1;
foreach ($_SESSION["giohang"] as $value) {
    extract($value);
    $tt=(int)$giasp*(int)$soluong;
    $ttt=number_format($tt,0,".",".");
   
    $format_giasp = number_format($giasp,0,".",".");

    $html_ttcart.='<tr>
                    <td><img src="layout/img/'.$anhsp.'" alt="" style="width:50px;"> 
                    </td>
                    <td class="tensp">'.$tensp.' <br> size: '.$size.'</td>
                    <td>'.$soluong.'</td>
                    <td class="giasp"><span>'.$ttt.' đ</span></td>
                    </tr>' ;
            $i++;
            
}
return  $html_ttcart;
}


?>
