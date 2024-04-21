<?php

?>
    <section class="containerfull">
        <div class="container">
            <div class="box-dangnhap">
                <div class="bgbanner">ĐĂNG NHẬP</div>
                        
                        <form action="index.php?pg=login" method="post">
                        <div class="row">
                            
                            <div class="col-75">
                            <input type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên đăng nhập">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-75">
                            <input type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <p style="color:red; text-align:center">
                            <?php
                            if (isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")) {
                                echo $_SESSION['tb_dangnhap'];
                                unset ($_SESSION['tb_dangnhap']);
                            }
                            ?>
                        </p>
                        <br>
                        <div class="row1">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                        </div>
                        </form>
                    
                    <p style="font-size: 15px; text-align: center;"><a href="" >Quên mật khẩu?</a></p>
                    <p style="font-size: 15px;text-align: center;">hoặc <a href="index.php?pg=dangky"> <span>Đăng ký</span></a></p>
                </div>

            </div>        
        </div>
    </section>