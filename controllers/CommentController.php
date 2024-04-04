<?php

function comment($id)
{
    $arrParams = [
        'view'      => "product_detail",
        'title'     => "Trang chủ",
    ];

    $listComment = getAllCommentByProductId($id);
    require_once PATH_VIEW . "layout/master.php";
}
