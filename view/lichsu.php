<?php

// if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {
//     extract($_SESSION['s_user']);
    
// }

$html_lsdh=donhang();
?>
    <div class="containerfull">
        <div class="container" style="margin-top: 50px">
            <div class="boxleft mr2pt menutrai" style="margin-bottom: 50px">
                <h1>DÀNH CHO BẠN</h1><br><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=lichsu">Lịch sử mua hàng</a>
                
            </div>
            <div class="boxright">
                <h1> Đơn hàng</h1><br>
           
                <?=$html_lsdh?>


            </div> 

        </div>
</div>