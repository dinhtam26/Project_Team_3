<?php

define("DS", "/");
define("ROOT_PATH", dirname(__FILE__) . DS);
define("PATH_CONTROLLER", ROOT_PATH . "../controllers" . DS);
define("PATH_MODEL", ROOT_PATH . "../models" . DS);
define("PATH_VIEW", ROOT_PATH . "../views" . DS);
define("ROOT_PATH_ADMIN", ROOT_PATH . "../admin" . DS);
define("PATH_UPLOAD",  ROOT_PATH . "../uploads" . DS);

define("PATH_CONTROLLER_ADMIN", ROOT_PATH . "../admin/controllers" . DS);
define("PATH_MODEL_ADMIN", ROOT_PATH . "../admin/models" . DS);
define("PATH_VIEW_ADMIN", ROOT_PATH . "../admin/views" . DS);






define("ROOT_URL",  "/Project_one/");

define("ROOT_URL_ADMIN",  "/Project_one/admin/");
define("ROOT_URL_View",  "/Project_one/views/");

define("ROOT_ASSET_URL",  ROOT_URL . "asset" . DS);
define("ROOT_UPLOAD_URL",  ROOT_URL . "uploads" . DS);




// =============== Database ==================
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "du_an_1");



define('STATUS_DELIVERY_WFC',       0);     // WAITING FOR CONFIRMATION - chờ xác nhận
define('STATUS_DELIVERY_WFP',       1);     // WAITING FOR PICKUP - chờ lấy hàng
define('STATUS_DELIVERY_WFD',       2);     // WAITING FOR DELIVERY - chờ giao hàng
define('STATUS_DELIVERY_ED',        3);     // DELIVERED - đã giao
define('STATUS_DELIVERY_CED',       -1);    // CANCELED - đã hủy

// define('STATUS_PAYMENT_UNPAID',     0);     // chưa thanh toán
// define('STATUS_PAYMENT_PAID',       1);     // đã thanh toán
// define('STATUS_PAYMENT_CANCELED',   -1);    // đơn hàng đã hủy	