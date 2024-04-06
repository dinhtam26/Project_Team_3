<?php
session_start();
// Required tất cả các file có trong file Common
require_once "../common/env.php";
require_once "../common/helper.php";
require_once "../common/connect-db.php";
require_once "../common/model.php";
require_once "../common/validate.php";





// Required file trong controllers và models
require_file(PATH_MODEL_ADMIN);
require_file(PATH_CONTROLLER_ADMIN);


// Điều hướng 
$act = $_GET['act'] ?? "/";

$page = match ($act) {
    "/"            => loginAdmin(),
    "logout"       => logoutAdmin(),
    "dashboard"    => dashboard(),

    // CRUD USER
    "users"       => listUserAll(),
    "user-detail" => userShowOne($_GET['id']),
    "user-create" => createUser(),
    "user-update" => updateUser($_GET['id']),
    "user-delete" => deleteUser($_GET['id']),

    // CRUD CATEGORIES
    "categories"    => listAllCategories(),
    "cate-detail"   => cateShowOne($_GET['id']),
    "cate-create"   => createCategories(),
    "cate-update"   => updateCategories($_GET['id']),
    "cate-delete"   => deleteCategories($_GET['id']),

    // CRUD COLOR
    "color"          => listAllColor(),
    "color-create"   => createColor(),
    "color-update"   => updateColor($_GET['id']),
    "color-delete"   => deleteColor($_GET['id']),

    // CRUD SIZE
    "size"          => listAllSize(),
    "size-create"   => createSize(),
    "size-update"   => updateSize($_GET['id']),
    "size-delete"   => deleteSize($_GET['id']),

    // CRUD PRODUCT
    "products"       => listProductAll(),
    "product-detail" => productShowOne($_GET['id']),
    "product-create" => createProduct(),
    "product-update" => updateProduct($_GET['id']),
    "product-delete" => deleteProduct($_GET['id']),

    // CRUD Hình ảnh
    "images"       => listImageAll(),
    "image-create" => createImage(),
    "image-update" => updateImage($_GET['id']),
    "image-delete" => deleteImage($_GET['id']),

    // Comment
    "comment"        => listCommentAll(),
    "comment-delete" => deleteComment($_GET['id']),

    // Order
    "orders"            => listOrderAll(),
    "order-show"        => showOrder($_GET['id']),
    "order-update"      => updateOrder($_GET['id'])
};

echo $page;



require_once "../common/disconnect.php";
