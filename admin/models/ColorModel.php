<?php

function getListColor()
{
    $sql = "SELECT * FROM `color` ORDER BY `id` DESC";
    $listCate = listRecord($sql);
    return $listCate;
}

function getOneColor($id)
{
    $sql = "SELECT * FROM `color` WHERE `id` = '$id'";
    $itemColor = singleRecord($sql);
    return $itemColor;
}

function exitsColorName($name)
{
    $flag = false;
    $sql = "SELECT `name` FROM `color` WHERE LOWER(`name`) = LOWER('$name')";
    $nameColor = singleRecord($sql);
    if (!empty($nameColor)) {
        $flag = true;
    }
    return $flag;
}

function insertColor()
{
    $errors = [];
    if (!empty($_POST)) {
        echo "<pre/>";
        print_r($_POST);
        echo "<pre/>";
        $name = $_POST['name'];
        $nameExits = exitsColorName($name);
        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên màu sắc";
        } else if ($nameExits == true) {
            $errors[] = "Color name này đã tồn tại";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
            header("Location: " . ROOT_URL_ADMIN . "?act=color-create");
            exit();
        } else {
            insert($_POST, 'color');
            setcookie("Success", "Thao tác thành công", time() + 3);
            header("Location: " . ROOT_URL_ADMIN . "?act=color");
            exit();
        }
    }
}

function update_Color($id)
{
    $errors = [];
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $nameExits = exitsColorName($name);

        if (empty($name)) {
            $errors[] = "Vui lòng nhập tên màu";
        } else  if ($nameExits == true) {
            $errors[] = "Color name này đã tồn tại";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $name;
        } else {
            update($_POST, 'color', $id);
            setcookie("Success", "Thao tác thành công", time() + 3);
        }
        header("Location: " . ROOT_URL_ADMIN . "?act=color-update&id=" . $id);
        exit();
    }
}

function delete_Color($id)
{
    if (isset($id)) {
        delete('color', $id);
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=color");
        exit();
    }
}
