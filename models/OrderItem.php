<!-- // Mã đơn hàng(order) Hình ảnh(product) Tên sản phẩm(product) Số lượng(order_detail) Giá sản phẩm(order_detail) Phương thức thanh toán -->
<?php
function getHistoryOrder($userID)
{
    $sql = "SELECT `o`.code_order, `o`.status_payment, `od`.quantity, `od`.price, `p`.name, `p`.`image` FROM `order_detail` AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`  AS `p` ON `vr`.`product_id`    = `p`.id  
    WHERE `o`.user_id = '$userID'";
    $listHistoryOrder = listRecord($sql);
    return  $listHistoryOrder;
}
?>