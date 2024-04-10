<?php


function dashboard()
{
    $arrParams = [
        "view"  => "dashboard",
        "title" => "Dashboard",
        "script" => "dashboard",
    ];
    login_Admin();
    if (empty($_SESSION['userInfo'])) {
        header("Location: " . ROOT_URL_ADMIN);
        exit();
    }

    $totalProduct   = countAllProduct();
    $totalOrder     = countOrder();
    $totalUser      = countUser();
    $totalRevenue   = totalRevenue();


    $dataDashboardTwo  = select_statistical();
    $dataDashboardOne  = totalProductOrdered();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
