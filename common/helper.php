<?php
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = scandir($pathFolder);
        unset($files[0], $files[1]);
        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre/>";
        print_r($data);
        echo "<pre/>";
    }
}

if (!function_exists('exits')) {
    function exits404()
    {
        echo "E404";
    }
}


if (!function_exists('upload_file')) {
    function upload_file($file, $folderPath)
    {
        $imagePath   = $folderPath . "/" . time() . basename($file['name']);
        if (move_uploaded_file($file["tmp_name"], PATH_UPLOAD . $imagePath)) {
            return $imagePath;
        }
        return null;
    }
}

if (!function_exists('get_file_upload')) {
    function get_file_upload($field, $default = null)
    {

        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {

            return $_FILES[$field];
        }

        return $default ?? null;
    }
}


if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act, $arrRouteNeedAuth)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . ROOT_URL);
                exit();
            }
        } elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . ROOT_URL . '?act=user-login');
            exit();
        }
    }
}

// Hàm tính tổng giá 
if (!function_exists('total_price')) {
    function total_price($flag = true)
    {

        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $price = $value['price'];
                $total += $price * $value['quantity'];
            }
            return $flag ? number_format($total) : $total;
        }

        return "0";
    }
}

// Hàm tính tổng giá 
if (!function_exists('total_quantity')) {
    function total_quantity()
    {
        $totalQuantity = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $totalQuantity += $value['quantity'];
            }
            return $totalQuantity;
        }

        return "0";
    }
}


function randomStr()
{
    $arrChar = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    $arrChar = implode("", $arrChar);
    $arrChar = str_shuffle($arrChar);

    $result = substr($arrChar, 0, 5);
    return $result;
}
