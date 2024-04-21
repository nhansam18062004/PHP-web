<?php
?>
<div class="containerfull">
    </div>

    <section class="containerfull">
        <div class="container">
        <div class="bgbanner">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="box-dangky">
                    <form action="index.php?pg=adduser" name="dangky" method="post" onsubmit="return validateform()">
                        <div class="row">
                            <div class="col-75">
                            <input type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên đăng nhập" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-75">
                            <input type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu" required> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-75">
                            <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required> <span id="remk"></span>
            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-75">
                            <input type="email" id="email" name="email" placeholder="Email" required> 
                            </div>
                        </div>
                        <br>
                        <div class="row1">
                            <input type="submit" name="dangky" value="Đăng ký">
                        </div>
                    </form>
                    <p style="text-align: center;"><a href="index.php?pg=dangnhap" >Quay lại</a></p>
            </div>


        </div>
    </section>
    <script>
    function validateform() {
        var tendangnhap = document.dangky.tendangnhap.value;
        var matkhau = document.dangky.matkhau.value;
        var repassword = document.dangky.repassword.value;
        var email = document.dangky.email.value;
 
    
        if (repassword != matkhau) {
            document.getElementById("remk").innerHTML = "Mật khẩu không trùng";
            return false;
        }
    }
</script>