<?php
extract($spchitiet);
$html_lienquan=show_sp($splienquan);
$format_giasp = number_format((int)$giasp,0,",",".");
$format_giacu = number_format((int)$giacu,0,".",".");
if ($format_giacu!=0) {
    $format_giacu= $format_giacu;

}else {
    $format_giacu="";
}
?>
<div class="product">
    
        <div class="chitiet">
            <img src="layout/img/<?=$anhsp?>" alt="">
        </div>
        <div class="chitiet">
            <h1><?=$tensp?></h1>
            <hr>
            <div class="gia">
                <h3><div class="price mt15"> <span><?=$format_giasp?> đ</span> </div></h3>       
                <div class="priceold mt15"> <?=$format_giacu?> </div>
            </div><br>
           <p><?=$motangan?></p>
           <p><h4>Chọn size: </h4></p>
           <div class="kichthuoc">
                <div class="boder2" >S</div>
                <div class="boder2" >M</div>
                <div class="boder2" >L</div>
            </div><br>
            <span id="sz"></span>
        <p><a class="sz" href="index.php?pg=bangsize">+ Hướng dẫn chọn size</a> </p>
        
        <p><h4>Số lượng: </h4></p>
        <div class="button">
         <form action="index.php?pg=addcart" name="addcart" method="post" onsubmit="return checksize()">
             <input type="hidden" name="masp" value="<?=$masp?>">
             <input type="hidden" name="tensp" value="<?=$tensp?>">
             <input type="hidden" name="anhsp" value="<?=$anhsp?>">
             <input type="hidden" name="giasp" value="<?=$giasp?>">
             
             <input type="hidden" name="giasp" value="<?=$giasp?>">
       
             <input type="hidden" id="size" name="size" value="">
            

             <div class="soluon">
                <input type="button" class="minus-btn" onclick="handleMinus()" value="-"></input>
                <div class="boxsoluong2">
                    <input type="text" name="soluong" id="soluong" min="1" value="1" max="10" width="10px">
                </div>
                <input type="button" class="plus-btn" onclick="handlePlus()" value="+"></input>
            </div>
             <button  class="addcart"  id="mt15" name="addcart">Thêm vào giỏ</button>

        </form>
        </div>
        
    </div>
</div>
<div class="containerfull">
<div class="mota">
    <h2>Mô tả</h2>
        <div >
          <?=$motachitiet?>
        </div>
</div>

    
    <div class="product-seen">
        <div class="top"> 
            <h2>SẢN PHẨM TƯƠNG TỰ</h2>
        <div class="ke"></div></div>
        <div class="container">
       <div class="product-show1">
        <div class="produc-show2">
            <?=$html_lienquan;?>
        </div>
        </div>
    </div>
    <div class="xt">
                <a href="index.php?pg=sanpham&iddm=<?=$iddm?>">Xem thêm</a>
        </div>
<script>
    //chọn số lượng

        let soluongElement = document.getElementById('soluong');
        let soluong = soluongElement.value;
        // console.log(amountElement);
        let render = (soluong) =>{
            soluongElement.value = soluong
        }
        //handle Plus
        let handlePlus = () =>{
            console.log(soluong);
            
            if (soluong < 10) {
                soluong++
            }
            render(soluong);
        }
        //handle minus
        let handleMinus = () =>{
            if (soluong > 1) {
                soluong--;
            }
            console.log(soluong);
            render(soluong);

        }

        soluongElement.addEventListener('input', () =>{
            soluong = soluongElement.value;
            soluong = parseInt(soluong);
            soluong = (isNaN(soluong)||soluong==0)?1:soluong;
            render(soluong);
            console.log(soluong);
        } );

    //chọn size
            const sizeButtons = document.querySelectorAll('.boder2');
            let selectedSize = '';

            for (let i = 0; i < sizeButtons.length; i++) {
            sizeButtons[i].addEventListener('click', () => {
                selectedSize = sizeButtons[i].textContent;

                // Update the selected size visually
                for (const button of sizeButtons) {
                button.classList.remove('active2');
                }
                sizeButtons[i].classList.add('active2');

                // If you have any additional actions to perform based on the selected size, you can do it here
                console.log('Selected size:', selectedSize);
                document.getElementById('size').value = selectedSize;
            });
            }
    function checksize(){
    var chonsize = document.addcart.size.value;
        if (chonsize == null || chonsize==[] ) {
            document.getElementById("sz").innerHTML = "Vui lòng chọn size";
            return false;
        }
    }

    </script>