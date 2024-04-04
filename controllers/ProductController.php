<?php

function products()
{
    $arrParams = [
        'view' => "products",
        'title' => "Sản phẩm"
    ];
    $productAll    = getAllProducts();
    $listCate      = getCate();
    $listCateParent = getParentCate();
    require_once PATH_VIEW . "layout/master.php";
}


function productDetail($id, $sizeId)
{
    $arrParams = [
        'view' => "product_detail",
        'title' => "Chi tiết sản phẩm"
    ];
    $productAll         = getAllProducts();
    $getOneProduct      = getOneProduct($id);
    $productByCate      = getProductByCate($getOneProduct['cate_id']);
    $listImage          = getImageForOneProduct($id);

    // $listComment = getAllCommentByProductId($getOneProduct['id']);

    // Lấy variation
    $variation  = getVariationForProduct($id);
    $color      = getColorForProduct($id);
    $size       = getSizeForProduct($id);
    $colorBySize = getColorByIdSize($id, $sizeId);

    $breadcrumbs = getBreadcrumbs($id);
    // Comment
    $listComment = getAllCommentByProductId($id);
    if (isset($_SESSION['user'])) {
        insertComment($getOneProduct['id'], $_SESSION['user']['id']);
    }

    require_once PATH_VIEW . "layout/master.php";
}
