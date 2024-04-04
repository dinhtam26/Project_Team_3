<?php
function listAllSize()
{
    $arrParams = [
        'view' => "size/index",
        'title' => "List Size",
        'script' => "datatable"
    ];
    $listSize = getListSize();
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function createSize()
{
    $arrParams = [
        'view' => "size/create",
        'title' => "Create Size",
        'script' => "datatable"
    ];
    insertSize();
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function updateSize($id)
{
    $arrParams = [
        'view' => "size/update",
        'title' => "List Size",
        'script' => "datatable"
    ];
    $itemSize = getOneSize($id);
    update_Size($id);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteSize($id)
{
    if (isset($id)) {
        delete_Size($id);
    }
}
