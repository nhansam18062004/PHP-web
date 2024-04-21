<?php


session_start();
ob_start(); //khởi tạo đối tượng header
if (!isset($_SESSION["giohang"])) {
    $_SESSION["giohang"]=[]; 
}

include 'dao/pdo.php';
include 'dao/danhmuc.php';
include 'dao/sanpham.php';
include 'dao/giohang.php';
include 'dao/user.php';
include 'dao/voucher.php';
include 'dao/bill.php';
include 'dao/lichsudonhang.php';


$danhmuc=danhmuc_select_all();  
$sale=sale(4);

$newsp=newsp(8);

if (isset($_GET['pa'])) {
  
    switch ($_GET['pa']) {
        case 'donhang':
            $giatrivoucher=0;
            //nhập voucher và tính tổng lại
            if (isset($_GET['voucher'])&&($_GET['voucher']==1)) {
                // lấy dữ liệu từ form chứ kh phải ở trên
                $tongdonhang=$_POST['tongdonhang'];
                $mavoucher=$_POST['mavoucher'];
                //so sánh với db để lấy giá trị
                $kq_voucher=checkvoucher($mavoucher);
                $html_tong=get_tongdonhang();
                if (is_array($kq_voucher)&&(count($kq_voucher))) {
                    $_SESSION['voucher']=$kq_voucher;
                    $tb_voucher="Áp mã thành công";
                    $_SESSION['tb_voucher']=$tb_voucher;
                
                    // $giamvoucher=giatrivoucher();
                }else {
                    $tb_voucher="Mã khuyễn mãi không tồn tại";
                    $_SESSION['tb_voucher']=$tb_voucher;
                    unset ($_SESSION['voucher']);
                    
                }
            }
                
            include 'view/donhang.php';
          
            break;

   
}
}
else {

include 'view/header.php';
if (!isset($_GET['pg'])) {
    include 'view/home.php';
    }else {
    switch ($_GET['pg']) {
        case 'sanpham':
            $kyw="";
            $titlepage="";
            $page=1; 
            //lọc sản phẩm theo dmuc
            if (!isset($_GET['iddm'])) {
                $iddm=0;
                if (isset($_POST["timkiem"])) {
                    $kyw=$_POST["kyw"];
                    $titlepage="Kết quả tìm kiếm với từ khoá: ".$kyw;
                } else {
                    $kyw="";
                }
                $soluongsp=count_sanpham($iddm,$kyw)['soluong'];
                $sotrang= ceil($soluongsp/12);
            }else {
                $iddm=$_GET['iddm'];
                $titlepage=get_name_dm($iddm);
                //phân trang
                //page 1 --- start 0
                // page 2 -- start 12
                // page i --- (i-1)*12
                $soluongsp=count_sanpham($iddm,$kyw)['soluong'];
                $sotrang= ceil($soluongsp/12);
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                    if ($page > $sotrang){
                        $page = $sotrang;
                    }
                    else if ($page < 1){
                        $page = 1;
                    }
                    }
            }

            //kiểm tra có form search kh
          
            $dssp=get_dssp($kyw,$iddm,12,($page-1)*12);
            

            include 'view/sanpham.php';
            break;
        case 'sanphamchitiet':
            if (isset($_GET['idpro'])) {
               $id=$_GET['idpro'];
               $spchitiet=sanpham_by_id($id);
               $iddm=$spchitiet['madm'];
               $splienquan=splienquan($iddm,$id,4);
            }
            
            include 'view/sanphamchitiet.php';
            break;
        case 'addcart':
            if (isset($_POST['addcart'])) {
                $masp=$_POST["masp"];
                $tensp=$_POST["tensp"];
                $anhsp=$_POST["anhsp"];
                $giasp=$_POST["giasp"];
                $soluong=$_POST["soluong"];
                $size=$_POST["size"];
                $fg=0;
                $i=0;
                foreach ($_SESSION["giohang"] as $sp) {
                    if ($sp['tensp']=== $tensp && $sp['size']=== $size ) {
                        $slnew=$soluong+$sp['soluong'];
                        $_SESSION["giohang"][$i]['soluong']=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                if ($fg==0) {
                    $sp=array("masp"=>$masp,"tensp"=>$tensp,"anhsp"=>$anhsp,"giasp"=>$giasp,"soluong"=>$soluong,"size"=>$size);
                    $_SESSION['giohang'][]=$sp;
                }
                
                header('location: index.php?pg=viewcart');
            }
            break;
        case 'viewcart':
           
            
            if (isset($_GET['delall'])) {
                unset ($_SESSION["giohang"] );
                header('location: index.php');
                    //tổng đơn hàng
                    if (isset($_SESSION["giohang"])) {
                        $tongdonhang=get_tongdonhang();
                    }
            }
            if (isset($_GET['del']) && ($_GET['del']=1) ) {
                array_splice ($_SESSION["giohang"],$sp,1);
                // unset($_SESSION["giohang"],$_GET['del']);
                header('location: index.php?pg=viewcart');
            }
           
            include 'view/viewcart.php';
            break;
        case 'chinhsachdoitra':
            include 'view/chinhsachdoitra.php';
            break;
        case 'bangsize':
            include 'view/bangsize.php';
            break;
        case 'dangky':
            include "view/dangky.php";
            break;
        case 'dangnhap':
            include "view/dangnhap.php";
            break;
        case 'adduser':
            // Xác định giá trị input
            if (isset($_POST["dangky"])&&($_POST["dangky"])) {
                $tendangnhap=$_POST["tendangnhap"];
                $matkhau=$_POST["matkhau"];
                $email=$_POST["email"];
                //xử lý
                 user_insert($tendangnhap, $matkhau, $email);


            }
            include "view/dangnhap.php";
            break;
        case 'updateuser':
                // Xác định giá trị input
                if (isset($_POST["capnhat"])&&($_POST["capnhat"])) {
                    $hovaten=$_POST["hovaten"];
                    $matkhau=$_POST["matkhau"];
                    $email=$_POST["email"];
                    $diachi=$_POST["diachi"];
                    $sodienthoai=$_POST["sodienthoai"];
                    $matk=$_POST["matk"];
                    //xử lý
                    user_update($hovaten, $matkhau, $email, $sodienthoai , $diachi, $matk);
                    header('location: index.php?pg=myaccount_confirm');
                }
                // include "view/myaccount_confirm.php";
                break;
        case 'myaccount_confirm':
            include "view/myaccount_confirm.php";
            break;
        case 'login':
            //input
            if (isset($_POST["dangnhap"])&&($_POST["dangnhap"])) {
                $tendangnhap=$_POST["tendangnhap"];
                $matkhau=$_POST["matkhau"];
            //xử lí
            $kq=checkuser($tendangnhap,$matkhau);
            if (is_array($kq)&&(count($kq))) {
                $_SESSION['s_user']=$kq;
                header('location: index.php');
            }
            else {
                $tb="Tài khoản không tồn tại";
                $_SESSION['tb_dangnhap']=$tb;

                header('location: index.php?pg=dangnhap');
            }
            }
            break;
      
        case 'myaccount':
            if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
                
            }
            include "view/myaccount.php";
            break;
        case 'logout':
            if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            break;
        case 'blogtong':
            include 'view/blogtong.php';
            break;
        case 'blog':
            include 'view/blog.php';
            break;
        case 'blog2':
            include 'view/blog2.php';
            break;
        case 'blog3':
            include 'view/blog3.php';
            break;
        
        case 'addbill':
                if (isset($_POST['thanhtoan'])&&($_POST["thanhtoan"])) {
                    $hovaten=$_POST["hovaten"];
                    $email=$_POST["email"];
                    $diachi=$_POST["diachi"];
                    $thanhtoan=$_POST["giathanhtoan"];
                    $sdt=$_POST["sdt"];
                    $ship=0;
                    $pttt=$_POST["phuongthucthanhtoan"];
                    $matk=$_POST["matk"];

                    $trangthai=4;
                    $ngaydathang= date("Y/m/d");
                    if ($pttt="") {
                        $pttt=0;
                    }else {
                        $pttt=$_POST["phuongthucthanhtoan"];
                    }
                    if (isset($_SESSION['voucher'])) {
                        $voucher=$_SESSION['voucher']['giam'];
                        unset ($_SESSION['voucher']);
                    }else {
                        $voucher=0;
                    }

                    // $ghichu=$_POST["ghichu"];
                    $madh="Alibu".date("His-dmY");
                    user_update2($hovaten, $email, $sodienthoai, $diachi, $matk);

                    if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
                        $iduser=$_SESSION['s_user']['matk'];
                    }
                    else {
                        $tendangnhap="Mặc định";
                        $matkhau="123";
                        $iduser=userthanhtoan_insert($hovaten, $tendangnhap, $email, $matkhau, $sdt, $diachi);
                    }
                    $idbill=bill_insert($madh, $ngaydathang, $hovaten, $email , $sdt, $diachi, $thanhtoan , $pttt, $voucher, $ship, $trangthai ,$iduser);

                }
             
                foreach ($_SESSION['giohang'] as  $value) {
                    extract($value);
                    $thanhtien=(int)$giasp*(int)$soluong;
                    chitietdonhang_insert($idbill,$masp ,$tensp, $anhsp,  $giasp , $soluong,$size, $thanhtien);
                   
                }
                $_SESSION['giohang']=null;
                include 'view/bill.php';
                break;
        case 'lichsu':
            if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
                extract($_SESSION['s_user']);
                $donhang=lsdh($matk);
                $_SESSION['lsdh']=$donhang;
                }
                include 'view/lichsu.php';
            break; 
        default:
            include 'view/home.php';
            break;
    }
}
include 'view/footer.php';
    # code...
}




?>