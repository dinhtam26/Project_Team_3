<?php



function listAllCategories()
{
    $arrParams = [
        'view' => "categories/index",
        'title' => "List Categories",
        'script' => "datatable"
    ];

    $listCate = getListCate();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function cateShowOne($id)
{
    $arrParams = [
        'view' => "categories/show",
        'title' => "Show One Categories",
        'script' => "datatable"
    ];

    $itemCate = getOneCate($id);

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function createCategories()
{
    $arrParams = [
        'view' => "categories/create",
        'title' => "Create Categories",
        'script' => "datatable"
    ];

    if (function_exists('insertCate')) {
        insertCate();
    }

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function updateCategories($id)
{
    $arrParams = [
        'view' => "categories/update",
        'title' => "Update Categories",
        'script' => "datatable"
    ];

    $itemCate = getOneCate($id);
    update_Cate($id);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function deleteCategories($id)
{
    if (function_exists('insertCate')) {
        delete_cate($id);
    }
}
