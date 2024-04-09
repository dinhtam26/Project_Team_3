<?php
function orderCheckout()
{
    $arrParams = [
        'view'      => "order",
        'title'     => "Thanh toán",
    ];

    require_once PATH_VIEW . "layout/master.php";
}

function orderPurchase()
{

    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        debug($_POST);
        // $data = array_pop($_POST);
        $data['status_payment'] = $_POST['status_payment'];
        $data['fullname']       = $_POST['fullname'];
        $data['email']          = $_POST['email'];
        $data['phone']          = $_POST['phone'];
        $data['address']        = $_POST['address'];
        $data['user_id']            = $_SESSION['user']['id'];
        $data['total_price']        = total_price(false);
        $data['status_delivery']    = STATUS_DELIVERY_WFC;
        $data['code_order']         = randomStr();
        $data['create_at']          = date("H:i d-m-Y");


        if ($_POST['status_payment'] == 0) {
            $orderID = insert_lastID($data, 'order');
            foreach ($_SESSION['cart'] as $item) {

                $orderDetail = [
                    'order_id'     =>  $orderID,
                    "variation_id" =>  $item['variation'],
                    "price"        => $item['price'],
                    "quantity"     => $item['quantity'],
                ];

                insert($orderDetail, 'order_detail');
            }
            deleteCartItemByCartID($_SESSION['cartID']);
            delete('carts', $_SESSION['cartID']);

            // Xóa session
            unset($_SESSION['cart']);
            unset($_SESSION['cartID']);
            header("Location: " . ROOT_URL . "?act=order-success");
        } else if ($_POST['status_payment'] == 1) {

            $_SESSION['information'] = $data;
            $orderID = insert_lastID($data, 'order');
            foreach ($_SESSION['cart'] as $item) {
                $orderDetail = [
                    'order_id'     =>  $orderID,
                    "variation_id" =>  $item['variation'],
                    "price"        => $item['price'],
                    "quantity"     => $item['quantity'],
                ];

                insert($orderDetail, 'order_detail');
            }
            deleteCartItemByCartID($_SESSION['cartID']);
            delete('carts', $_SESSION['cartID']);

            // Xóa session
            unset($_SESSION['cart']);
            unset($_SESSION['cartID']);
            header("Location: " . ROOT_URL . "?act=orderMomo");

            exit();
        }
    }
    // header("Location: " . ROOT_URL);
}

function orderSuccess()
{
    $arrParams = [
        'view'      => "order_success",
        'title'     => "Thanh toán",
    ];

    require_once PATH_VIEW . "layout/master.php";
}

function orderMomo()
{
    require_once PATH_VIEW . "momo/handle.php";
}

function orderDetail($id)
{
    $arrParams = [
        'view'      => "order_detail",
        'title'     => "Chi tiết đơn hàng",
    ];
    $listProductByOrderID   = getProductByOrderId($id);
    $infoOrder              = getInfoOrder($id);
    // $listHistoryOrder = getHistoryOrder($_SESSION['user']['id']);

    require_once PATH_VIEW . "layout/master.php";
}


function orderHistory($status)
{
    $arrParams = [
        'view'      => "order_history",
        'title'     => "Lịch sử đơn hàng",
    ];

    $listHistoryOrder = getHistoryOrder($_SESSION['user']['id']);
    $listOrderByStatus = getOrderByStatus($status, $_SESSION['user']['id']);
    require_once PATH_VIEW . "layout/master.php";
}


function OrderCanceled($id_order)
{
    $arrParams = [
        'view'      => "order_history",
        'title'     => "Lịch sử đơn hàng",
    ];

    if (isset($_GET['id'])) {
        statusCancel($id_order);
        header("Location: " . ROOT_URL . "?act=order-history&status=-1");
    }
    require_once PATH_VIEW . "layout/master.php";
}
