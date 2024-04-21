<?php
$html_sale=show_sp($sale);
$html_new=show_sp($newsp);
$iddm=1;
?>
<div class="containerfull">
        <div class="banner">
            <img src="layout/img/banner.png"   alt="">
        </div>
    <div class="container">
        <div class="sale" >
            <h2>THỜI TRANG SIÊU SALE!!</h2>
            <?=$html_sale;?>
        </div>
        <div class="xt">
                <a href="index.php?pg=sanpham&iddm=<?=1?>">Xem thêm</a>
        </div>
        <div class="outfit">
            <h2>Outfit Of The Day</h2>
            <div class="hinh">
            <img src="layout/img/outfit1.jpg"  width="290px" alt="">
            <img src="layout/img/outfit2.jpg"  width="290px"  alt="">
            <img src="layout/img/outfit3.jpg"  width="290px" alt="">
            <img src="layout/img/outfit4.jpg"  width="290px" alt="">
            </div>
        </div>
        <div class="new">
            <h2>THỜI TRANG MỚI NHẤT</h2>
            <?=$html_new;?> 
        </div>
        <div class="xt">
                <a href="index.php?pg=sanpham&iddm=<?=1?>">Xem thêm</a>
        </div>
            <h2>Tin tức</h2>
            <div class="blog">
                <div class="blog-tin">
                    <a href="index.php?pg=blog">
                        <div class="anh">
                            <img src="layout/img/bi-kip-san-black-friday-2023-thong-minh-va-tiet-kiem.jpg" width="350px">
                        </div>
                        <div class="">
                        <h3 >Bí kíp săn sale Black Friday</h3>
                        <h5 style="color: gray">Bí kíp săn Black Friday thông minh và tiết kiệm luôn là một trong những vấn đề được hầu hết người tiêu dùng quan tâm trước ...</h5>
                        </div>
                    </a>
                    </div>
                <div class="blog-tin">
                    <a href="index.php?pg=blog2">
                    <div class="anh">
                        <img src="layout/img/phoi-do-mua-dong-am-ap-trendy.jpg" width="350px">
                    </div>
                    <div class="">
                        <h3>Tips phối đồ mùa đông ấm áp, trendy</h3> 
                        <h5 style="color: gray">Cách phối đồ mùa đông sao cho vừa giữ được sự ấm áp, vừa thể hiện được vẻ đẹp trendy... </h5> 
                    </div>
                    </a>
                </div>
                <div class="blog-tin">
                    <a href="index.php?pg=blog3">
                    <div class="anh">
                        <img src="layout/img/item-nen-co-trong-thoi-trang-mua.jpg" width="350px">
                    </div>
                    <div class="">
                        <h3>Những item không thể thiếu trong thời trang mùa đông 2023</h3>
                        <h5 style="color: gray" >Những items không thể thiếu trong thời trang mùa đông 2023 là sổ tay cần thiết cho...</h5>  
                    </div>
                    </a>  
                </div>
            </div>
    </div>
</div>