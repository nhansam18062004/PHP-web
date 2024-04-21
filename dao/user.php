<?php
// require_once 'pdo.php';

//đăng ký
function user_insert($tendangnhap, $matkhau, $email){
    $sql = "INSERT INTO taikhoan(tendangnhap, matkhau, email) VALUES (?, ?, ?)";
    pdo_execute($sql, $tendangnhap, $matkhau, $email);
}

function userthanhtoan_insert($hovaten, $tendangnhap, $email, $matkhau, $sdt, $diachi){
    $sql = "INSERT INTO taikhoan(hovaten, tendangnhap, email, matkhau, sodienthoai, diachi) VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute_returnid($sql, $hovaten, $tendangnhap,  $email, $matkhau, $sdt, $diachi);
}

// cập nhật lên database
function user_update($hovaten, $matkhau, $email, $sodienthoai, $diachi, $matk){
    $sql = "UPDATE taikhoan SET hovaten=?,matkhau=?,email=?,sodienthoai=?,diachi=? WHERE matk=? ";
    pdo_execute($sql,$hovaten, $matkhau, $email, $sodienthoai, $diachi, $matk);
}
function user_update2($hovaten, $email, $sodienthoai, $diachi, $matk){
    $sql = "UPDATE taikhoan SET hovaten=?,email=?,sodienthoai=?,diachi=? WHERE matk=? ";
    pdo_execute($sql,$hovaten, $email, $sodienthoai, $diachi, $matk);
}
//kiểm tra đăng nhập
function checkuser($tendangnhap,$matkhau){
    $sql = "Select * from taikhoan where tendangnhap=? and matkhau=? and quyen='user'";
    return pdo_query_one($sql, $tendangnhap,$matkhau);
    // if (is_array($kq)&&(count($kq))) {
    //     return $kq["id"];
    // }else {
    //     return 0;
    // }
}
function get_user($matk){
    $sql = "Select * from taikhoan where matk=?";
    return pdo_query_one($sql,$matk);
}


// function user_delete($ma_kh){
//     $sql = "DELETE FROM user  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function user_select_all(){
//     $sql = "SELECT * FROM user";
//     return pdo_query($sql);
// }

// function user_select_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }