<?php
function getAllOrder()
{
    $sql = "SELECT * FROM `order` ORDER BY `order`.id DESC";
    $listOrder = listRecord($sql);
    return $listOrder;
}

function getStatusDelivery($id)
{
    $sql = "SELECT `order`.status_delivery FROM `order` WHERE `id` = '$id'";
    $statusDelivery = singleRecord($sql);
    return $statusDelivery;
}

function updateStatusDelivery($value, $id)
{
    $sql = "UPDATE `order`
    SET `status_delivery` = '$value'
    WHERE `id` = '$id';";
    pdo_execute($sql);
}

function getProductByOrderId($order_id)
{
    $sql = "SELECT `o`.code_order, `od`.quantity, `od`.price, `p`.name, `p`.`image`,`od`.order_id, `c`.name AS cate_name, `vr`.color_id, `vr`.size_id FROM `order_detail` AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`  AS `p` ON `vr`.`product_id`    = `p`.id  
    INNER JOIN `categories`  AS `c` ON `c`.`id`    = `p`.cate_id
    WHERE `od`.order_id = '$order_id'";

    $listHistoryOrder = listRecord($sql);
    return  $listHistoryOrder;
}

function getColorName($colorID)
{
    $sql = "SELECT name FROM `color` WHERE  `color`.id = '$colorID'";
    $colorName = singleRecord($sql);
    return $colorName;
}

function getSizeName($sizeID)
{
    $sql = "SELECT name FROM `size` WHERE  `size`.id = '$sizeID'";
    $sizeName = singleRecord($sql);
    return $sizeName;
}
