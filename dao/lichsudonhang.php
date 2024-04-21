<?php
function lsdh($matk){
    $sql = "SELECT * FROM chitietdonhang, donhang where id=idbill and idtaikhoan=? ";
    // $sql = " SELECT *FROM donhang  INNER JOIN chitietdonhang ON chitietdonhang.idbill = donhang.id
    //         INNER JOIN taikhoan ON donhang.idtaikhoan = taikhoan.matk WHERE chitietdonhang.idbill = donhang.id and donhang.idtaikhoan = taikhoan.matk";
   
    return pdo_query($sql,$matk);
}



function donhang(){
    $html_lsdh='';
    // $i=1;
    
// extract($_SESSION["lsdh"]);
foreach ($_SESSION["lsdh"] as $value){
    extract($value);

    $format_thanhtien = number_format($thanhtien,0,".",".");
    $format_giasp = number_format($giasp,0,".",".");
    $format_tongtien = number_format($tongtien,0,".",".");
    $format_voucher = number_format($voucher,0,".",".");
    $html_lsdh.='<table style="border:1px dotted black; margin-bottom:100px">

                    <tr>
                    Mã đơn hàng: '.$madh.'
                    </tr>';
    if ($idbill=$id) {
            $html_lsdh.=' <tr>
                            <td><img src="layout/img/'.$anhsp.'" alt="" style="width:50px;"></td>
                            <td class="tensp">'.$tensp.' <br> size: '.$size.'</td>
                            <td >'.$format_giasp.' đ</td>
                            <td>'.$soluong.'</td>
                            <td >'.$format_thanhtien.' đ</td>
                            </tr>';
                    
    }else {
        foreach ($_SESSION["lsdh"] as $value){
            extract($value);
                    $html_lsdh.=' <tr>
                            <td><img src="layout/img/'.$anhsp.'" alt="" style="width:50px;"></td>
                            <td class="tensp">'.$tensp.' <br> size: '.$size.'</td>
                            <td >'.$format_giasp.' đ</td>
                            <td>'.$soluong.'</td>
                            <td >'.$format_thanhtien.' đ</td>
                            </tr>';
                       }
                    }

   
             
    $html_lsdh.='   <tr>
                    <td>Ship:</td>
                    <td>'.$ship.'</td>
                    </tr>

                    <tr>
                    <td>Voucher:</td>
                    <td>-'.$format_voucher.'đ</td>
                    </tr> 
                    <hr style="display:none">
                    <tr>
                    
                    <td>Tổng:</td>
                    <td >'.$format_tongtien.'đ</td>
                    </tr>
                </table>    ' ;
                // $i++;
            }


return  $html_lsdh;
}
?>