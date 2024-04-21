<?php
$html_dssp=show_sp($dssp);

if ($titlepage!="") {
    $title=$titlepage;
}else {
    $title="Tất cả sản phẩm";
}




$var=(int)$page;
$laquo=$var-1;
$raquo=$var+1;
?>

    <br>
    
    <section class="containerfull"> 
    <div class="container ">
        <div class="return">
            <a href="index.php"><img src="layout/img/home-outline.svg" width="20px" alt="">/</a>
            <h1><?=$title?></h1>
        </div>
    </div> <br>
    <div class="container">
            <div class="box">
                <?=$html_dssp;?>
            </div>
            <br>

            <!-- phân trang -->
            <div class="page" >
                            
                    <a href="index.php?pg=sanpham&iddm=<?=$iddm?>&page=<?=$laquo?>">  &laquo; </a>
                <?php
                for ($i=1; $i<=$sotrang; $i++) { 
                if ($i == $page){
                ?>
                <a class="active" href="index.php?pg=sanpham&iddm=<?=$iddm?>&page=<?=$i?>"><?=$i?></a>
                <?php   
                }
                else{
                ?>    
                <a  href="index.php?pg=sanpham&iddm=<?=$iddm?>&page=<?=$i?>"><?=$i?></a>
                <?php 
                           }
                }
                ?>
                    <a href="index.php?pg=sanpham&iddm=<?=$iddm?>&page=<?=$raquo?>">  &raquo; </a>

            </div>
            
    </div>
    </section>