<?php
if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {

$html_bill='Quý khách có thể theo dõi đơn hàng <a href="index.php?pg=lichsu"><span>tại đây</span></a>';
}
else {
$html_bill='';
}
?>
<div class="containerful">
    <div class="container" style="height:200px; margin-top:100px">
        <h3>Cảm ơn quý khách đã đặt hàng tại website của chúng tôi <br></h3>
            <?=$html_bill?>
            <p>Mã đơn hàng là <span><?=(isset($madh))?$madh:" "?></span></p>
    </div>
</div>