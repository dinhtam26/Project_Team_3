<?php

// Lấy danh mục con với điều parent_id = id trên url
function getCateByParentId($id)
{
    $sql = "SELECT * FROM `categories` AS `c` WHERE `c`.parent_id = $id";
    $listCateByParentId = listRecord($sql);
    return $listCateByParentId;
}
