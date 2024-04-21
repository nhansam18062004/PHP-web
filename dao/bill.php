<?php
function bill_insert( $madh, $ngaydathang, $hovaten,  $email , $sdt, $diachi, $thanhtoan ,$pttt, $voucher, $ship, $trangthai ,$iduser){
    $sql = "INSERT INTO donhang(madh, ngaydathang, hovaten ,email, sodienthoai, diachi, tongtien, pttt, voucher, ship, trangthai ,idtaikhoan) VALUES (?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_returnid($sql, $madh, $ngaydathang, $hovaten, $email , $sdt, $diachi, $thanhtoan ,  $pttt, $voucher,  $ship, $trangthai, $iduser);
}

function chitietdonhang_insert($idbill,$masp ,$tensp, $anhsp,  $giasp , $soluong,$size, $thanhtien){
    $sql = "INSERT INTO chitietdonhang( idbill, idpro , tensp, anhsp,  giasp , soluong, size, thanhtien) VALUES (?, ?, ?, ?, ?, ?,?, ?)";
    pdo_execute($sql, $idbill,$masp ,$tensp, $anhsp,  $giasp , $soluong,$size, $thanhtien);
}

?>