<?php
function getProduct()
{
    $sql = "SELECT `id`, `name` FROM `products`";
    $listProduct = listRecord($sql);
    return  $listProduct;
}

function getListHinhAnh()
{
    $sql = "SELECT `h`.id, `h`.image, `h`.pro_id, `p`.name 
    FROM `hinh_anh` as `h` INNER JOIN `products` as `p`
    WHERE `p`.id = `h`.pro_id ORDER BY `h`.id DESC";
    $listImage = listRecord($sql);
    return $listImage;
}

function getOneImage($id)
{
    $sql = "SELECT * FROM `hinh_anh` WHERE id = '$id'";
    $imageItem = singleRecord($sql);
    return $imageItem;
}
