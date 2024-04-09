<?php
function getCartId($userID)
{
    // Lấy dữ liệu  trong Db
    $cart = getCartByUserID($userID);

    if (empty($cart)) {
        return insert_lastID(['user_id' => $userID], 'carts');
    }
    return $cart['id'];
}

function getCartByUserID($userID)
{
    $sql = "SELECT * FROM `carts` AS `c` WHERE `c`.user_id = '$userID'";
    $cartByUserID = singleRecord($sql);
    return $cartByUserID;
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

function getVariationByColorIdAndSizeId($color, $size, $productID)
{
    $sql = "SELECT `vr`.id  FROM `variation` AS `vr` WHERE  `vr`.color_id = '$color' AND `vr`.size_id = '$size' AND `vr`.product_id = '$productID'";
    $sizeName = singleRecord($sql);
    return $sizeName;
}
