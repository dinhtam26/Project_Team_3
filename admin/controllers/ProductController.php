<?php

function  listProductAll()
{
    $arrParams = [
        'view' => "product/index",
        'title' => "List Products",

        "script" => "pagination"
    ];
    $style = "datatable";

    $listAllProduct =  listAllProduct();
    $totalProduct   = countAllProduct();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function  productShowOne($id)
{
    $arrParams = [
        'view' => "product/show",
        'title' => "Show One Products",
        'script' => "datatable"
    ];
    $style = "datatable";

    $itemProduct = showOneForProduct($id);
    $variation  = getVariationForProduct($id);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function  createProduct()
{
    $arrParams = [
        'view' => "product/create",
        'title' => "Create Products",
        'script' => "datatable"
    ];
    $style = "datatable";

    $color      = getListColor();
    $size       = getListSize();
    $categories = getListCate();

    if (!empty($_POST)) {
        $data = [
            "name"          => $_POST['name'] ?? null,
            "cate_id"       => $_POST['cate_id'] ?? null,
            "description"   => $_POST['description'] ?? null,
            "create_at"     => $_POST['create_at'] ?? null,
            "image"         => get_file_upload("image"),
        ];


        // Validate
        $img    = $data['image'];
        if (is_array($img)) {
            $data['image']    = upload_file($img, "product");
        }

        try {
            // $GLOBALS['conn']->beginTransaction();
            $productId =  insert_lastID($data, 'products');

            // Xử lí lư Variation

            if (!empty($_POST['color']) && !empty($_POST['size'])) {
                foreach ($_POST['size'] as $sizeID) {
                    foreach ($_POST['color'] as $colorID) {
                        $dataVariation = [
                            'product_id' => $productId,
                            'price'     => $_POST['price'] ?? null,
                            'quantity'  => $_POST['quantity'] ?? null,
                            'color_id'  => $colorID,
                            'size_id'   => $sizeID,
                        ];

                        insert($dataVariation, 'variation');
                    }
                }
                // die("Call ");
            }

            // $GLOBALS['conn']->commit();
        } catch (\Throwable $th) {
            // $GLOBALS['conn']->rollBack();
            if (is_array($img) && !empty($data['image']) && file_exists(PATH_UPLOAD . $data['img'])) {
                unlink(PATH_UPLOAD . $data['img']);
            }
        }
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=products");
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}


function validateCreateProduct($data)
{
    $errors = [];
}

function  updateProduct($id)
{
    $product = showOneForProduct($id);
    if (empty($product)) {
        echo "e404";
    }
    $arrParams = [
        'view' => "product/update",
        'title' => "Update Products",
        'script' => "datatable"
    ];

    $listColor      = getListColor();


    $listSize       = getListSize();
    $sizeId         = getSizeForProduct($id);
    $sizeId         = array_column($sizeId, 'id');
    $colorId        = getColorForProduct($id);
    $colorId        = array_column($colorId, 'id');
    $categories  = getListCate();
    $variation  = getVariationForProduct($id);

    if (!empty($_POST)) {
        $data = [
            "name"          => $_POST['name'] ?? $product['p_name'],
            "cate_id"       => $_POST['cate_id'] ?? null,
            "description"   => $_POST['description'] ?? $product['p_desc'],
            "create_at"     => date('Y-m-d H:i:s'),
            "image"         => get_file_upload("image", $product['p_image']),
        ];
        //Validate
        $img    = $data['image'];
        if (is_array($img)) {
            if ($img['size'] > 0) {
                $data['image']    = upload_file($img, "product");
            }
        }
        try {
            update($data, 'products', $id);
            // deleteVariaByProductID($id);

            if (!empty($_POST['color']) && !empty($_POST['size'])) {
                foreach ($_POST['size'] as $sizeID) {
                    foreach ($_POST['color'] as $colorID) {
                        $dataVariation = [
                            'product_id' => $id,
                            'price'     => $_POST['price'] ?? $variation['0']['price'],
                            'quantity'  => $_POST['quantity'] ?? $variation['0']['quantity'],
                            'color_id'  => $colorID,
                            'size_id'   => $sizeID,
                        ];

                        insert($dataVariation, 'variation');
                    }
                }
            }
        } catch (\Throwable $th) {
            if (is_array($img) && !empty($data['image']) && file_exists(PATH_UPLOAD . $data['img'])) {
                unlink(PATH_UPLOAD . $data['img']);
            }
        }
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=products");
        exit();
    }
    // 





    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteProduct($id)
{
    if (isset($id)) {
        delete_product($id);
    }
}
