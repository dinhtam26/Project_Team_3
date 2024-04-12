<?php
function listOrderAll()
{
    $arrParams = [
        'view' => "order/index",
        'title' => "List Order",
    ];

    $listOrder = getAllOrder();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function showOrder($id)
{
    $arrParams = [
        'view' => "order/show",
        'title' => "List Comment",
    ];

    $listProductByOrderID =  getProductByOrderId($id);
    $statusDelivery = getStatusDelivery($id);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function updateOrder($id)
{
    $arrParams = [
        'view' => "order/update",
        'title' => "List Comment",
    ];
    // $statusDelivery = getStatusDelivery($id);
    if (!empty($_POST)) {
        $status_delivery = $_POST['status_delivery'];
        updateStatusDelivery($status_delivery, $id);
        setcookie("successOrder", "Cập nhật trạng thái thành công", time() + 3);
    }

    $statusDelivery = getStatusDelivery($id);

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
