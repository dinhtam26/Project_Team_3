<?php


function cartAdd($productID, $quantity = 0, $size, $color)
{
    // Kiểm tra xem có tồn tại product với id kia không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }



    $variationID = getVariationByColorIdAndSizeId($color, $size, $productID);
    // Kiểm tra trong bảng carts đã có bảng ghi nào của user đang đăng nhập chưa
    // Có rồi thì lấy ra cartID, nếu chưa thì tạo mới
    $cartID = getCartId($_SESSION['user']['id']);
    $_SESSION['cartID'] = $cartID;

    //Tạo một khóa duy nhất cho sản phẩm dựa trên productID, size, color
    $productKey = $productID . "-" . $size . "-" . $color;

    // Thêm sản phẩm vào session cart: $_SESSION['cart']['$productID'] = $product
    // Tiếp tục thêm sản phẩm vào cart_items 
    if (!isset($_SESSION['cart'][$productKey])) {
        $_SESSION['cart'][$productKey] = $product;
        $_SESSION['cart'][$productKey]['userID'] = $_SESSION['user']['id'];
        $_SESSION['cart'][$productKey]['quantity']   = $quantity;
        $_SESSION['cart'][$productKey]['variation']   = $variationID['id'];
        $_SESSION['cart'][$productKey]['size']   = $size;
        $_SESSION['cart'][$productKey]['color']   = $color;




        // $data = [
        //     'cart_id'       => $cartID,
        //     'product_id'    => $productID,
        //     'quantity'      => $quantity
        // ];
        // insert($data, 'cart-items');
        insertCartItems($cartID, $productID, $quantity);
    } else {
        $qtyTMP = $_SESSION['cart'][$productKey]['quantity']   += $quantity;

        updateQuantityByCartAndProductId($cartID, $productID, $qtyTMP);
    }

    // Chuyển hướng về trang list
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}

function cartList()
{

    $arrParams = [
        'view'      => "cart-list",
        'title'     => "Trang giỏ hàng",
        'script'    => "home_bootstrap"
    ];

    // debug($_SESSION['cart']);
    $cartID = getCartId($_SESSION['user']['id']);
    $listProductInCart = getAllProductForUserIdInCartItem($cartID);

    // $_SESSION['cart'] = [];
    // $_SESSION['cart'] = array_merge($_SESSION['cart'], $listProductInCart);

    require_once PATH_VIEW . "layout/master.php";
}


function cartInc($productID, $size, $color)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }

    $productKey = $productID . "-" . $size . "-" . $color;


    // Tăng số lượng lên 1
    if (isset($_SESSION['cart'][$productKey])) {
        $qtyTMP = $_SESSION['cart'][$productKey]['quantity']   += 1;

        updateQuantityByCartAndProductId($_SESSION['cartID'], $productKey, $qtyTMP);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}

function cartDec($productID, $size, $color)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }
    $productKey = $productID . "-" . $size . "-" . $color;
    // Giảm số lượng xuống 1
    if (isset($_SESSION['cart'][$productKey]) && $_SESSION['cart'][$productKey]['quantity'] > 1) {
        $qtyTMP = $_SESSION['cart'][$productKey]['quantity']   -= 1;

        updateQuantityByCartAndProductId($_SESSION['cartID'], $productKey, $qtyTMP);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}

function cartDel($productID, $size, $color)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }
    $productKey = $productID . "-" . $size . "-" . $color;
    // Xóa bản ghi trong session và cart-items
    if (isset($_SESSION['cart'][$productKey])) {
        unset($_SESSION['cart'][$productKey]);

        deleteCartItemsByCartIDAndProductID($_SESSION['cartID'], $productKey);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}
