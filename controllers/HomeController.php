<?php
function homeIndex()
{
    $arrParams = [
        'view'      => "home",
        'title'     => "Trang chủ",
        'script'    => "home_bootstrap"
    ];
    $products       = getAllProducts();
    $cate           = getCate();
    require_once PATH_VIEW . "layout/master.php";
}

function categoriesHome($id, $cate_son)
{
    $arrParams = [
        'view' => "categories",
        'title' => "Trang chủ"
    ];
    $script = "home_bootstrap.php";
    $products           = getAllProducts();
    $cate               = getCate();
    $productByCate      = getProductByCate($id);
    $listCateByParentId =  getCateByParentId($id);
    $listCateParent     = getParentCate();

    // Lấy sản phẩm theo parent_id
    $productByParentID = getProductByParentID($id);

    $productBySonCate  = getProductBySonCate($id, $cate_son);


    require_once PATH_VIEW . "layout/master.php";
}


function profile()
{
    $arrParams = [
        'view' => "profile/profile",
        'title' => "Profile"
    ];

    if (!empty($_POST)) {
        $id     = $_POST['id'];
        $data   = [
            'fullname' => $_POST['fullname'],
            'email'    => $_POST['email'],
            'phone'    => $_POST['phone'],
            'address'  => $_POST['address'],
            'create_at' => date('Y-m-d '),
            'avatar'    => $_FILES['avatar'] ?? $_POST['avatar']
        ];



        // Xử lí ảnh
        $target_dir = "user/";
        $target_file = $target_dir . strtolower(basename($_FILES["avatar"]["name"]));

        $data['avatar']  = $target_file;
        if ($_FILES['avatar']['size'] > 0) {
            move_uploaded_file($_FILES["avatar"]["tmp_name"],  PATH_UPLOAD . $target_file);
            // Update 
        }

        $data = update($data, 'user', $id);
        $userInfo = getUserByID($id);
        setcookie("success", "Cập nhập thành công", time() + 3);
        header("Location: " . ROOT_URL . "?act=profile");
        exit();
    }

    require_once PATH_VIEW . "layout/master.php";
}

function searchProduct()
{
    $arrParams = [
        'view' => "search",
        'title' => "Trang chủ"
    ];
    $listCateParent     = getParentCate();
    if (!empty($_POST)) {
        $keyword = $_POST['keyword'];

        $seacherProduct = searchProductInCatalogue($keyword);
    }

    require_once PATH_VIEW . 'layout/master.php';
}
