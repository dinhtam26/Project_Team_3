<?php

function getListCate()
{
    $sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
    $listCate = listRecord($sql);
    return $listCate;
}

function getOneCate($id)
{
    $sql = "SELECT * FROM `categories` WHERE `id` = '$id'";
    $itemCate = singleRecord($sql);
    return $itemCate;
}

function insertCate()
{
    $errors = [];
    if (!empty($_POST)) {
        $name = $_POST['name'];
        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên danh mục bạn muốn thêm";
        } else if (!is_string($name)) {
            $errors[] = "Tên danh mục phải được ghi bằng chữ";
        } else if (strlen($name) < 2) {
            $errors[] = "Tên danh mục yêu cầu 2 kí tự trở lên";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
            header("Location: " . ROOT_URL_ADMIN . "?act=cate-create");
            exit();
        } else {
            insert($_POST, 'categories');
            setcookie("Success", "Thao tác thành công", time() + 3);
            header("Location: " . ROOT_URL_ADMIN . "?act=categories");
            exit();
        }
    }
}

function update_Cate($id)
{

    $errors = [];
    if (!empty($_POST)) {
        $name = $_POST['name'];
        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên danh mục bạn muốn thêm";
        } else if (!is_string($name)) {
            $errors[] = "Tên danh mục phải được ghi bằng chữ";
        } else if (strlen($name) < 2) {
            $errors[] = "Tên danh mục yêu cầu 2 kí tự trở lên";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
        } else {
            update($_POST, 'categories', $id);
            setcookie("Success", "Thao tác thành công", time() + 3);
        }
        header("Location: " . ROOT_URL_ADMIN . "?act=cate-update&id=" . $id);
        exit();
    }
}

function delete_cate($id)
{
    if (isset($id)) {
        delete('categories', $id);
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=categories");
        exit();
    }
}
