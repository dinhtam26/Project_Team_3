<?php

function listAllColor()
{
    $arrParams = [
        'view' => "color/index",
        'title' => "List Color",
        'script' => "datatable"
    ];
    $listColor = getListColor();
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function createColor()
{
    $arrParams = [
        'view' => "color/create",
        'title' => "Create Color",
        'script' => "datatable"
    ];
    if (function_exists('insertCate')) {
        insertColor();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function updateColor($id)
{

    $arrParams = [
        'view' => "color/update",
        'title' => "Update Color",
        'script' => "datatable"
    ];
    $itemColor = getOneColor($id);
    update_Color($id);

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteColor($id)
{
    if (isset($id)) {
        delete_Color($id);
    }
}
