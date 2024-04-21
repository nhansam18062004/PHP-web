<?php
function checkvoucher($mavoucher){
    $sql = "Select * from voucher where mavoucher=? ";
    return pdo_query_one($sql, $mavoucher);

}


?>