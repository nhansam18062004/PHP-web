<?php
 if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
    extract($_SESSION['s_user']);
    $userinfo=get_user($matk);
    $_SESSION['s_user']=$userinfo;
    extract($userinfo);
}
?>
  <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DÀNH CHO BẠN</h1><br><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=lichsu">Lịch sử mua hàng</a>
                
            </div>
            <div class="boxright">
                <h1> Thông tin cá nhân</h1><br>
                <div class="containerfull mr30">
                <form action="index.php?pg=updateuser" method="post">
                    <div class="row-capnhat">
                        <div class="col-25">
                        <label for="hovaten">Họ và tên</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="hovaten" value="<?=$hovaten?>" name="hovaten" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="row-capnhat">
                        <div class="col-25">
                        <label for="password">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                        <input type="password" id="password" value="<?=$matkhau?>" name="matkhau" placeholder="Mật khẩu">
                        </div>
                    </div>
                    
                    <div class="row-capnhat">
                        <div class="col-25">
                        <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="email" value="<?=$email?>" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row-capnhat">
                        <div class="col-25">
                        <label for="email">Địa chỉ</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="diachi" value="<?=$diachi?>" name="diachi" placeholder="Địa chỉ">
                        </div>
                    </div><div class="row-capnhat">
                        <div class="col-25">
                        <label for="email">Điện thoại</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="sodienthoai" value="<?=$sodienthoai?>" name="sodienthoai" placeholder="Điện thoại">
                        </div>
                    <H3><span> Cập nhật thành công</span></H3>
                    <br>
                    <div class="row1-capnhat">
                    
                    </div>
                    </form>
                </div>
            </div>

          
        </div>
    </section>
