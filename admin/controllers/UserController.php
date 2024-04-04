<?php


function loginAdmin()
{
    $arrParams = [
        'view' => "layout/login",
        'title' => "Login",
    ];
    $script = "user/script";
    $style = "datatable";
    login_Admin();

    require_once PATH_VIEW_ADMIN . "layout/login.php";
}

function logoutAdmin()
{
    $arrParams = [
        'view' => "layout/logout",
        'title' => "Login",
    ];
    $script = "user/script";
    $style = "datatable";
    login_Admin();
    require_once PATH_VIEW_ADMIN . "layout/logout.php";
}

function listUserAll()
{
    $arrParams = [
        'view' => "user/index",
        'title' => "List User",
        'script' => "datatable"
    ];
    $script = "user/script";
    $style = "datatable";

    $listUser = getListUser();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function userShowOne($id)
{
    if (is_numeric($id)) {
        $arrParams = [
            'view' => "user/show",
            'title' => "Show User"
        ];
        $itemUser = getOneUser($id);

        if (empty($itemUser)) {
            $style = "404";
            require_once PATH_VIEW_ADMIN . "e404.php";
        } else {
            require_once PATH_VIEW_ADMIN . "layout/master.php";
        }
    } else {
        $style = "404";
        require_once PATH_VIEW_ADMIN . "e404.php";
    }
}

function createUser()
{
    $arrParams = [
        'view' => "user/create",
        'title' => "Create User"
    ];
    if (function_exists('insertUser')) {
        insertUser();
    }

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}



function updateUser($id)
{
    $arrParams = [
        'view' => "user/update",
        'title' => "Update User"
    ];
    $itemUser = getOneUser($id);

    editUser($id);

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteUser($id)
{
    $arrParams = [
        'view' => "user/delete",
        'title' => "List User"
    ];
    delete_user($id);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
