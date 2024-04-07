<!-- // Mã đơn hàng(order) Hình ảnh(product) Tên sản phẩm(product) Số lượng(order_detail) Giá sản phẩm(order_detail) Phương thức thanh toán -->
<?php
function getHistoryOrder($userID)
{
    $sql = "SELECT `o`.code_order, `o`.status_delivery ,`o`.create_at, `od`.quantity, `od`.price, `p`.name, `p`.`image`,`od`.order_id, `c`.name AS cate_name, `vr`.color_id, `vr`.size_id FROM `order_detail` AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`  AS `p` ON `vr`.`product_id`    = `p`.id  
    INNER JOIN `categories`  AS `c` ON `c`.`id`    = `p`.cate_id
    WHERE `o`.user_id = '$userID'
    ORDER BY `o`.id DESC";
    $listHistoryOrder = listRecord($sql);
    return  $listHistoryOrder;
}

function getProductByOrderId($order_id)
{
    $sql = "SELECT `o`.code_order,`o`.create_at, `o`.status_delivery, `od`.quantity, `od`.price, `p`.name, `p`.`image`,`od`.order_id, `c`.name AS cate_name, `vr`.color_id, `vr`.size_id FROM `order_detail` AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`  AS `p` ON `vr`.`product_id`    = `p`.id  
    INNER JOIN `categories`  AS `c` ON `c`.`id`    = `p`.cate_id
    WHERE `od`.order_id = '$order_id'";

    $listHistoryOrder = listRecord($sql);
    return  $listHistoryOrder;
}

// Lấy sản phẩm theo status
function getOrderByStatus($status, $userID)
{
    $sql = "SELECT `o`.code_order,`o`.create_at, `o`.status_delivery, `od`.quantity, `od`.price, `p`.name, `p`.`image`,`od`.order_id, `c`.name AS cate_name FROM `order_detail` AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`  AS `p` ON `vr`.`product_id`    = `p`.id  
    INNER JOIN `categories`  AS `c` ON `c`.`id`    = `p`.cate_id
    WHERE `o`.status_delivery = '$status'
    AND `o`.user_id = '$userID'
    ";

    $listOrderByStatus = listRecord($sql);
    return $listOrderByStatus;
}

function statusCancel($id)
{
    $sql = "UPDATE `order` SET status_delivery = '-1' WHERE id = '$id'";
    pdo_execute($sql);
}
// Lấy thông tin địa chỉ theo đơn hàng
function getInfoOrder($id)
{
    $sql = "SELECT * FROM `order` WHERE `order`.id = '$id'";
    $infoOrder = singleRecord($sql);
    return $infoOrder;
}

?>