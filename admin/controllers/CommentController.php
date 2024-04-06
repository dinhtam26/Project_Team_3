<?php

function listCommentAll()
{
    $arrParams = [
        'view' => "comment/index",
        'title' => "List Comment",
    ];

    $listComment = getAllComment();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteComment($id)
{

    if (isset($id)) {
        delete_Comment($id);
    }
}
