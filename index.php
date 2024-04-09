<?php
session_start();
// Required tất cả các file có trong file Common
require_once "common/env.php";
require_once "common/helper.php";
require_once "common/connect-db.php";
require_once "common/model.php";
require_once "common/validate.php";



// Required file trong controllers và models
require_file(PATH_MODEL);
require_file(PATH_CONTROLLER);


// Điều hướng 
$act = $_GET['act'] ?? "/";


$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-inc',
    'cart-dec',
    'cart-del',
    'order-checkout',
    'order-purchase',
    'order-success',
    "comment",
    "order-detail",
    "orders-canceled"
];
middleware_auth_check($act, $arrRouteNeedAuth);
// Kiểm tra xem user đã đăng nhập chưa


$page = match ($act) {
    "/" => homeIndex(),
    "user-login"    => sigIn(),
    "user-sigUp"    => sigUp(),
    "user-logout"   => logOut(),
    "forget-password" => forgetPassword(),
    "search"        => searchProduct(),

    // Trang sản phẩm
    "products"       => products(),

    // Chi tiết sản phẩm
    "product-detail"    => productDetail($_GET['id'],  $_GET['size_id'] ?? "", $_GET['color_id'] ?? ""),
    // Lọc sản phẩm theo danh mục
    "categories"        => categoriesHome($_GET['id'], $_GET['cate_son'] ?? ""),
    "profile"           => profile(),
    "comment"           => comment($_GET['id']),

    // Xử lí thêm sản phẩm
    "cart-add"          => cartAdd($_GET['productID'], $_GET['quantity'], $_GET['size'], $_GET['color']),
    "cart-list"         => cartList(),
    "cart-inc"          => cartInc($_GET['productID'], $_GET['size'], $_GET['color']),
    "cart-dec"          => cartDec($_GET['productID'], $_GET['size'], $_GET['color']),
    "cart-del"          => cartDel($_GET['productID'], $_GET['size'], $_GET['color']),

    // Order
    "order-checkout"    => orderCheckout(),
    "order-purchase"    => orderPurchase(),
    "order-success"     => orderSuccess(),
    "order-detail"      => orderDetail($_GET['id'] ?? ""),
    "order-history"     => orderHistory($_GET['status'] ?? ""),
    "orders-canceled"   => OrderCanceled($_GET['id'] ?? ""),
    "orderMomo"         => orderMomo(),
};

echo $page;



require_once "common/disconnect.php";
