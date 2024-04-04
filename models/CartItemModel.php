<?php
function updateQuantityByCartAndProductId($cartID, $productID, $quantity)
{
    $sql = "UPDATE `cart-items` 
    SET `quantity`      ='$quantity'
    WHERE  `cart_id`    ='$cartID'
    AND `product_id`    = '$productID'";
    pdo_execute($sql);
}

function insertCartItems($cartID, $productID, $quantity)
{
    $sql = "INSERT INTO `cart-items`(`cart_id`, `product_id`, `quantity`) VALUE('$cartID',$productID,$quantity )";
    pdo_execute($sql);
}

function deleteCartItemsByCartIDAndProductID($cartID, $productID)
{
    $sql = "DELETE FROM `cart-items` WHERE `cart_id` = '$cartID' AND `product_id` = $productID";
    pdo_execute($sql);
}

// Hàm lấy tất cả sản phẩm trong cart-items theo user_id
function getAllProductForUserIdInCartItem($cartID)
{
    // $cartID = $_SESSION['cartID'];
    $sql = "SELECT `p`.id, `p`.*, `vr`.price, `ci`.quantity, `vr`.sale
            FROM `products` AS `p` 
            INNER JOIN `cart-items` AS `ci` ON `ci`.product_id = `p`.id
            LEFT JOIN `variation` AS `vr` ON `vr`.product_id = `p`.id
            WHERE `ci`.cart_id =$cartID
            GROUP BY `p`.id";
    $list = listRecord($sql);
    return $list;
}


function deleteCartItemByCartID($cart_id)
{
    $sql = "DELETE FROM `cart-items` WHERE cart_id = $cart_id";
    pdo_execute($sql);
}
