<?php
function cartAdd($productID, $quantity = 0)
{
    // Kiểm tra xem có tồn tại product với id kia không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }

    // Kiểm tra trong bảng carts đã có bảng ghi nào của user đang đăng nhập chưa
    // Có rồi thì lấy ra cartID, nếu chưa thì tạo mới
    $cartID = getCartId($_SESSION['user']['id']);
    $_SESSION['cartID'] = $cartID;
    // Thêm sản phẩm vào session cart: $_SESSION['cart']['$productID'] = $product
    // Tiếp tục thêm sản phẩm vào cart_items 
    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = $product;
        $_SESSION['cart'][$productID]['userID'] = $_SESSION['user']['id'];
        $_SESSION['cart'][$productID]['quantity']   = $quantity;

        // $data = [
        //     'cart_id'       => $cartID,
        //     'product_id'    => $productID,
        //     'quantity'      => $quantity
        // ];
        // insert($data, 'cart-items');
        insertCartItems($cartID, $productID, $quantity);
    } else {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity']   += $quantity;

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


function cartInc($productID)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }
    // Tăng số lượng lên 1
    if (isset($_SESSION['cart'][$productID])) {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity']   += 1;

        updateQuantityByCartAndProductId($_SESSION['cartID'], $productID, $qtyTMP);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}

function cartDec($productID)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }
    // Giảm số lượng xuống 1
    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['quantity'] > 1) {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity']   -= 1;

        updateQuantityByCartAndProductId($_SESSION['cartID'], $productID, $qtyTMP);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}

function cartDel($productID)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = getOneProduct($productID);
    if (empty($product)) {
        debug("404 not found");
    }

    // Xóa bản ghi trong session và cart-items
    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);

        deleteCartItemsByCartIDAndProductID($_SESSION['cartID'], $productID);
    }
    header("Location: " . ROOT_URL . "?act=cart-list");
    exit();
}
