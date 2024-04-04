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
