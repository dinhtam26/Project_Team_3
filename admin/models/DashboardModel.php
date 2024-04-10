<?php
// Hàm đếm tất cả các sản phẩm 
function countAllProduct()
{
    $sql = "SELECT COUNT(id) AS totalProduct FROM `products`";
    $totalProduct = singleRecord($sql);
    return $totalProduct;
}
// Hàm đếm tất cả đơn hàng trừ những đơn hàng đã hủy và đơn hàng đã thành công

function countOrder()
{
    $sql = "SELECT COUNT(id) AS totalOrder FROM `order`  WHERE `status_delivery` NOT IN(-1, 3)";
    $totalOrder = singleRecord($sql);
    return $totalOrder;
}
// Hàm đếm tất cả các khách hàng (bao gồm cả admin lẫn user)
function countUser()
{
    $sql = "SELECT COUNT(id) AS totalUser FROM `user`";
    $totalUser = singleRecord($sql);
    return $totalUser;
}
// Hàm tính tổng doanh số. Tính tổng doanh thu trong bảng order_detail 
function totalRevenue()
{
    $sql = "SELECT SUM(price * quantity) AS totalRevenue FROM `order_detail` AS `od` 
    INNER JOIN `order` AS `o` ON `od`.order_id = `o`.id 
    WHERE `o`.status_delivery = '3'";
    $totalRevenue = singleRecord($sql);
    return $totalRevenue;
}

// Hàm đếm sản phẩm theo categories
function select_statistical()
{
    $sql = "SELECT  `c`.name, COUNT(`p`.id) AS total
            FROM `products` AS `p` 
            INNER JOIN `categories` AS `c` ON `p`.cate_id = `c`.id
            GROUP BY `c`.id";
    $list = listRecord($sql);
    return $list;
}

// Lấy tên sản phẩm và tổng tất cả số lượng đã bắn theo sản phẩm 
function totalProductOrdered()
{
    $sql = "SELECT SUM(`od`.quantity) AS `total`, `p`.name 
    FROM `order_detail`     AS `od` 
    INNER JOIN `order`      AS `o`  ON `o`.id               = `od`.order_id
    INNER JOIN `variation`  AS `vr` ON `od`.variation_id    = `vr`.id
    INNER JOIN `products`   AS `p`  ON `p`.id    = `vr`.product_id
    WHERE `o`.status_delivery = '3'
    GROUP BY `p`.id";
    $list = listRecord($sql);
    return $list;
}
