<?php

function listAllProduct()
{
    $sql = "
        SELECT 
        `p`.id            as p_id,
        `p`.name          as p_name,
        `p`.description   as p_desc,
        `P`.create_at     as p_create_at,
        `p`.image         as p_image,
        `c`.name          as c_name
        FROM `products`          as `p`
        INNER JOIN categories as `c` ON `c`.id = `p`.cate_id ORDER BY `p`.id DESC";
    $listAllProduct = listRecord($sql);
    return $listAllProduct;
}

function getOneProduct($id)
{
    $sql = "SELECT * FROM `color` WHERE `id` = '$id'";
    $item = singleRecord($sql);
    return $item;
}

function showOneForProduct($id)
{
    $sql = "
        SELECT 
        `p`.id            as p_id,
        `p`.name          as p_name,
        `p`.description   as p_desc,
        `P`.create_at     as p_create_at,
        `p`.image         as p_image,
        `c`.name          as c_name
        FROM `products`          as `p`
        INNER JOIN categories as `c` ON `c`.id = `p`.cate_id 
        WHERE `p`.id = $id";
    return singleRecord($sql);
}

function getVariationForProduct($productID)
{
    $sql = "SELECT `c`.id as c_id, `c`.name as color, `s`.id as s_id, `s`.name as size, `vr`.quantity, `vr`.price, `vr`.sale
    FROM `variation` AS `vr` 
    INNER JOIN `color` AS `c` ON `c`.id = `vr`.color_id 
    INNER JOIN `size` AS `s` ON `s`.id = `vr`.size_id 
    WHERE `vr`.product_id = '$productID' 
    ORDER BY `s`.name DESC
    ";
    return listRecord($sql);
}

function getSizeForProduct($id)
{
    $sql = "SELECT `s`.id, `s`.name FROM `size` as `s` 
    INNER JOIN `variation` as `vr` ON `s`.id = `vr`.size_id
    WHERE `vr`.product_id = $id;";
    $size = listRecord($sql);
    return $size;
}

function getColorForProduct($id)
{
    $sql = "SELECT `c`.id, `c`.name FROM `color` as `c` 
    INNER JOIN `variation` as `vr` ON `c`.id = `vr`.color_id
    WHERE `vr`.product_id = $id;";
    $size = listRecord($sql);
    return $size;
}

function deleteVariaByProductID($productID)
{
    $sql = "DELETE FROM variation WHERE product_id = :product_id;";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_id', $productID);
    $stmt->execute();
    return $stmt->fetchAll();
}


function delete_product($id)
{
    $product = getOneProduct($id);

    deleteVariaByProductID($id);
    delete("products", $id);
    $_SESSION['success'] = 'Thao tác thành công!';
    header('Location: ' . ROOT_URL_ADMIN . '?act=products');

    if (!empty($product['image']) && file_exists(PATH_UPLOAD . $product['image'])) {
        unlink(PATH_UPLOAD . $product['image']);
    }
}


function productPanigation()
{
}
