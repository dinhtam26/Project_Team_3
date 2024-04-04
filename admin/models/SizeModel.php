<?php

function getListSize()
{
    $sql = "SELECT * FROM `size` ORDER BY `id` DESC";
    $listSize = listRecord($sql);
    return $listSize;
}

function getOneSize($id)
{
    $sql = "SELECT * FROM `size` WHERE `id` = '$id'";
    $itemSize = singleRecord($sql);
    return $itemSize;
}

function exitsSizeName($name)
{
    $flag = false;
    $sql = "SELECT `name` FROM `size` WHERE LOWER(`name`) = LOWER('$name')";
    $nameSize = singleRecord($sql);
    if (!empty($nameSize)) {
        $flag = true;
    }
    return $flag;
}

function insertSize()
{
    $errors = [];
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $nameExits = exitsSizeName($name);
        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên màu sắc";
        } else if ($nameExits == true) {
            $errors[] = "Size name này đã tồn tại";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
            header("Location: " . ROOT_URL_ADMIN . "?act=size-create");
            exit();
        } else {
            insert($_POST, 'size');
            setcookie("Success", "Thao tác thành công", time() + 3);
            header("Location: " . ROOT_URL_ADMIN . "?act=size");
            exit();
        }
    }
}

function update_Size($id)
{
    $errors = [];
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $nameExits = exitsSizeName($name);

        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên màu";
        } else  if ($nameExits == true) {
            $errors[] = "Size name này đã tồn tại";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
        } else {
            update($_POST, 'size', $id);
            setcookie("Success", "Thao tác thành công", time() + 3);
        }
        header("Location: " . ROOT_URL_ADMIN . "?act=size-update&id=" . $id);
        exit();
    }
}

function delete_Size($id)
{
    if (isset($id)) {
        delete('size', $id);
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=size");
        exit();
    }
}
