<?php

function getAllProducts()
{
    $sql = "SELECT `p`.id, `p`.name, `p`.image, `p`.description, `p`.status , `vr`.quantity, `vr`.price,  `c`.name AS cate_name
    FROM `products` AS `p`  
    INNER JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
    INNER JOIN `categories` AS `c` ON `p`.cate_id  = `c`.id
    GROUP BY `vr`.product_id";
    $product = listRecord($sql);
    return $product;
}

function getCate()
{
    $sql = "SELECT `c`.id,  MIN(`vr`.price) AS min, MAX(`vr`.price) max,  `c`.name AS cate_name
    FROM `variation` AS `vr`  
    INNER JOIN `products` AS `p` ON `p`.id = `vr`.product_id
    INNER JOIN `categories` AS `c` ON `p`.cate_id  = `c`.id
    GROUP BY `c`.id";
    $cate = listRecord($sql);
    return $cate;
}

function getProductByCate($id)
{
    $sql = "SELECT `p`.id, `p`.name, `p`.image, `p`.description, `p`.status ,  `vr`.price,  `c`.name AS cate_name
    FROM `products` AS `p`  
    INNER JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
    INNER JOIN `categories` AS `c` ON `p`.cate_id  = `c`.id
    WHERE `p`.cate_id = '$id'
    GROUP BY `vr`.product_id  ";
    $productByCate = listRecord($sql);
    return $productByCate;
}

function getOneProduct($id)
{
    // Láy tất cả giá trị trong bảng products và lấy thêm price, quantity, sale bên bảng variation
    $sql = "SELECT `p`.*,  `vr`.price, `vr`.quantity, `vr`.sale 
    FROM `products` AS `p`
    LEFT JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
    WHERE `p`.id = '$id'";

    $product = singleRecord($sql);
    return $product;
}

function getVariationForProduct($productID)
{
    $sql = "SELECT `c`.id as c_id, `c`.name as color, `s`.id as s_id, `s`.name as size, `vr`.quantity
    FROM `variation` AS `vr` 
    INNER JOIN `color` AS `c` ON `c`.id = `vr`.color_id 
    INNER JOIN `size` AS `s` ON `s`.id = `vr`.size_id 
    WHERE `vr`.product_id = '$productID' 
    ORDER BY `s`.name DESC";
    return listRecord($sql);
}

function getSizeForProduct($id)
{
    $sql = "SELECT `s`.id, `s`.name FROM `size` as `s` 
    INNER JOIN `variation` as `vr` ON `s`.id = `vr`.size_id
    WHERE `vr`.product_id = $id
    GROUP BY `vr`.size_id;";
    $size = listRecord($sql);
    return $size;
}

function getColorForProduct($id)
{
    $sql = "SELECT `c`.id, `c`.name FROM `color` as `c` 
    INNER JOIN `variation` as `vr` ON `c`.id = `vr`.color_id
    WHERE `vr`.product_id = $id
    GROUP BY `vr`.color_id;";
    $color = listRecord($sql);
    return $color;
}


// Khi bấm vào size m thì hiển id của size m lên url 
// Kiểm tra nếu tồn tại biến param trên url đấy 
// Thì lấy color theo id của size
function getColorByIdSize($id, $idSize)
{
    $sql = "SELECT `c`.id, `c`.name FROM `color` as `c` 
    INNER JOIN `variation` as `vr` ON `c`.id = `vr`.color_id
    WHERE `vr`.product_id = '$id'
    AND `vr`.size_id   = '$idSize'
    GROUP BY `vr`.color_id;";
    $colorBySize = listRecord($sql);
    return  $colorBySize;
}
// End funtion product-detail






// Hàm để tìm kiếm sản phẩm theo tên
function searchProductInCatalogue($keyword)
{
    $sql = "SELECT `p`.id AS p_id, `p`.image, `p`.name as p_name, `c`.*, `vr`.price FROM `products` AS `p`
            LEFT JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
            INNER JOIN `categories` AS `c` ON `p`.cate_id = `c`.id
            WHERE  `p`.name  LIKE '%$keyword%'
            GROUP BY `vr`.product_id";
    $list = listRecord($sql);
    return $list;
}






function getImageForOneProduct($id)
{
    $sql = "SELECT * FROM `hinh_anh` AS `h` WHERE `h`.pro_id = $id ";
    $listImage = listRecord($sql);
    return $listImage;
}

// Lấy danh mục với điều kiện parent danh mục bằng 0
function getParentCate()
{
    $sql = "SELECT * FROM `categories` AS `c` WHERE `c`.parent_id = 0";
    $listCateParent = listRecord($sql);
    return $listCateParent;
}


// Categories với id là id là 1 thì sẽ lấy tất sản phẩm của các cate thuộc cate_parent là 1
function getProductByParentID($id)
{
    $sql  = "SELECT `p`.id AS p_id, `p`.image, `p`.name as p_name, `p`.description,`p`.create_at, `c`.*, `vr`.price FROM `products` AS `p`
    LEFT JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
    INNER JOIN `categories` AS `c` ON `p`.cate_id = `c`.id  WHERE `c`.parent_id = $id
    GROUP BY `vr`.product_id";
    $productByParentID = listRecord($sql);
    return $productByParentID;
}

function getOneCateParentByID($id)
{
    $sql = "SELECT * FROM `categories` WHERE `parent_id` = $id";
    $oneCateParentById = singleRecord($sql);
    return $oneCateParentById;
}

// Hàm lấy sẩn phẩm theo danh mục con
function getProductBySonCate($parent_cate, $son_cate)
{
    $sql = "SELECT * FROM `products` AS `p`
            LEFT JOIN `variation` AS `vr` ON `p`.id = `vr`.product_id
            INNER JOIN `categories` AS `c` ON `p`.cate_id = `c`.id
            WHERE `c`.parent_id = '$parent_cate' AND `c`.id = '$son_cate' 
            GROUP BY `vr`.product_id";

    $productBySonCate = listRecord($sql);
    return $productBySonCate;
}

// Lấy tên cate cha cate (categroies) con name của sản phẩm (product)
function getBreadcrumbs($id)
{
    // Láy tất cả giá trị trong bảng products và lấy thêm price, quantity, sale bên bảng variation
    $sql = "SELECT `p`.name, `c`.id, `c`.name AS cate_name, (SELECT name FROM `categories` WHERE id = `c`.parent_id) AS cate_parent
    FROM `products` AS `p`
    LEFT JOIN `categories` AS `c` ON `p`.cate_id = `c`.id
    WHERE `p`.id = '$id'";
    $product = singleRecord($sql);
    return $product;
}

// Lấy tên theo id cate
