<?php

function login_Admin()
{

    // $sql = "SELECT * FROM `user` WHERE `id` = $id";
    // $itemUser = singleRecord($sql);
    // return $itemUser;

    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];



        $sql = "SELECT * FROM `user`  WHERE `email` = '$email' AND `password` = '$password'";
        $user = singleRecord($sql);


        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Bạn phải nhập đầy đủ thông tin";
            header("Location: " . ROOT_URL_ADMIN);
            exit();
        } else {
            if (!empty($user)) {
                $_SESSION['userInfo'] = $user;
                if ($user['type'] != 1) {
                    $_SESSION['error'] = "Tài khoản hoặc mật khẩu của bạn không chính xác";
                    header("Location: " . ROOT_URL_ADMIN);
                    exit();
                }
                $_SESSION['flag'] = true;
                header("Location: " . ROOT_URL_ADMIN . "?act=dashboard");
                exit();
            } else {
                $_SESSION['error'] = "Tài khoản hoặc mật khẩu của bạn không chính xác. Vui lòng nhập lại";
                header("Location: " . ROOT_URL_ADMIN);
                exit();
            }
        }
    }
}

function getListUser()
{
    $sql = "SELECT * FROM `user` ORDER BY `id` DESC";
    $listUser = listRecord($sql);
    return $listUser;
}

function getOneUser($id)
{
    $sql = "SELECT * FROM `user` WHERE `id` = $id";
    $itemUser = singleRecord($sql);
    return $itemUser;
}


function insertUser()
{
    if (!empty($_POST)) {
        $data = [
            'username'  => $_POST['username'] ?? null,
            'fullname'  => $_POST['fullname'] ?? null,
            'password'  => $_POST['password'] ?? null,
            'email'     => $_POST['email'] ?? null,
            'phone'     => $_POST['phone'] ?? null,
            'address'   => $_POST['address'] ?? null,
            'create_at' => $_POST['create_at'] ?? null,
            'type'      => $_POST['type'] ?? null,
            'avatar'    => $_FILES['avatar'] ?? null,
        ];

        $errors = validateCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $data;
            header("Location: " . ROOT_URL_ADMIN . "?act=user-create");
            exit();
        } else {
            $avatar = $_FILES['avatar'] ?? null;
            if (!empty($avatar)) {
                $data['avatar']  = upload_file($avatar, "user");
            } else {
                $data['avatar'] = "user/avatar.png";
            }
            insert($data, "user");
            $_SESSION['success'] = "Thao tác thành công";
            header("Location: " . ROOT_URL_ADMIN . "?act=users");
            exit();
        }
    }
}

function exitEmailCreate($email)
{
    $flag = false;
    $sql = "SELECT `email` FROM `user` WHERE `email` = '$email'";
    $emailExits = singleRecord($sql);
    if (!empty($emailExits)) {
        $flag = true;
    }
    return $flag;
}

function validateCreate($data)
{
    // User không được rỗng, độ dài tối thiểu là 2 và tối đa là 50
    // Full Name không được rỗng, độ dài tối thiểu 2 độ dài tối đa 100
    // Password không được rỗng, kiểm tra password mạnh theo partent ^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$
    // Email không được rỗng, phải là email và email không được trùng
    // Phone không được rỗng, kiểm tra phone theo partent /^[0-9]{3}-[0-9]{4}-[0-9]{3}$/
    // Kiểm tra avatar không được rỗng, đuôi ảnh jpg, png, avif
    // Address không được rỗng, độ dài tối thiểu 2, tối đa 100
    // Ngày tạo không được rỗng
    // Type phải là 0 hoặc 1
    // Avatar size < 2MB
    // Chỉ chấp nhận png, jpg, jpeg
    $errors = [];

    if (empty($data['username'])) {
        $errors[] = "Username không được để trống";
    } else if (strlen($data['username']) <= 2 || strlen($data['username']) > 50) {
        $errors[] = "Username cần phải được nhập từ 2 kí tự trở lên";
    }
    // Kiểm tra Full name
    if (empty($data['fullname'])) {
        $errors[] = "Trường FullName không được để trống";
    } else if (strlen($data['fullname']) <= 2 || strlen($data['fullname']) > 50) {
        $errors[] = "Trường Full name cần phải được nhập từ 2 kí tự trở lên";
    }
    // Kiểm tra password
    if (empty($data['password'])) {
        $errors[] = "Trường password không được để trống";
    } else if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $data['password'])) {
        $errors[] = "Password yêu cầu phải lớn hơn 8 kí tự và phải chứa ít nhất 1 ký tự viết hoa và 1 số";
    }
    // Kiểm tra email
    if (empty($data['email'])) {
        $errors[] = "Trường email không được để trống";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email vừa nhập không đúng";
    } else if (exitEmailCreate($data['email']) == true) {
        $errors[] = "Email này đã tồn tại hãy dùng email khác";
    }
    // Kiểm tra Phone 
    if (empty($data['phone'])) {
        $errors[] = "Trường phone không được để trống";
    } else if (!is_numeric($data['phone'])) {
        $errors[] = "Phone is not number";
    }

    // Kiểm tra avatar
    // $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    // if ($data['avatar']['size'] == 0) {
    //     $errors[] = "Ảnh không được để trống";
    // } else if ($data['avatar']['size'] > 2 * 1024 * 1024) {
    //     $errors[] = "Ảnh avatar nhỏ hơn 2 MB";
    // } else if (!in_array($data['avatar']['type'], $typeImage)) {
    //     $errors[] = "Trường avatar chỉ chấp nhận định dạng file png, jpg, jpeg";
    // }



    // Kiểm tra address
    if (empty($data['address'])) {
        $errors[] = "Trường address không được để trống";
    }

    if (empty($data['create_at'])) {
        $errors[] = "Trường Create_at không được để trống";
    }

    if ($data['type'] != 1 && $data['type'] != 0) {
        $errors[] = "Trường Type cần phải được chọn";
    }
    return $errors;
}



function editUser($id)
{
    if (!empty($_POST)) {
        $user = getOneUser($id);

        $data = [
            'id'        => $id,
            'username'  => $_POST['username'] ?? null,
            'fullname'  => $_POST['fullname'] ?? null,
            'password'  => $_POST['password'] ?? null,
            'email'     => $_POST['email'] ?? null,
            'phone'     => $_POST['phone'] ?? null,
            'avatar'    => $_POST['avatar'] ?? null,
            'address'   => $_POST['address'] ?? null,
            'create_at' => $_POST['create_at'] ?? null,
            'type'      => $_POST['type'] ?? null,
            'avatar'    => $_FILES['avatar'] ?? null
        ];

        $errors = validateUpdate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data']   = $data;
        } else {
            $avatar = $_FILES['avatar'] ?? null;
            if (!empty($avatar)) {
                $data['avatar']  = upload_file($avatar, "user");
            } else {
                $data['avatar'] = "user/avatar.png";
            }

            update($data, 'user', $id);


            if (!empty($avatar) && !empty($user['avatar']) && !empty($user['avatar']) && file_exists(PATH_UPLOAD . $user['avatar'])) {
                unlink(PATH_UPLOAD . $user['avatar']);
            }

            $_SESSION['success'] = "Thao tác thành công";
        }
        header("Location: " . ROOT_URL_ADMIN . "?act=user-update&id=$id");
        exit();
    }
}

function exitEmailUpdate($email, $id)
{
    $flag = false;
    $sql = "SELECT `email` FROM `user` WHERE `email` = '$email' AND `id` <> '$id'";
    $emailExits = singleRecord($sql);
    if (!empty($emailExits)) {
        $flag = true;
    }
    return $flag;
}

function validateUpdate($data)
{
    $errors = [];
    if (empty($data['username'])) {
        $errors[] = "Username không được để trống";
    } else if (strlen($data['username']) <= 2 || strlen($data['username']) > 50) {
        $errors[] = "Username cần phải được nhập từ 2 kí tự trở lên";
    }
    // Kiểm tra Full name
    if (empty($data['fullname'])) {
        $errors[] = "Trường FullName không được để trống";
    } else if (strlen($data['fullname']) <= 2 || strlen($data['fullname']) > 50) {
        $errors[] = "Trường Full name cần phải được nhập từ 2 kí tự trở lên";
    }
    // Kiểm tra password
    if (empty($data['password'])) {
        $errors[] = "Trường password  không được để trống";
    }
    // Kiểm tra email
    $exitEmail = exitEmailUpdate($data['email'], $data['id']);
    if (empty($data['email'])) {
        $errors[] = "Trường email không được để trống";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email vừa nhập không đúng";
    } else if ($exitEmail) {
        $errors[] = "Email này đã tồn tại hãy dùng email khác";
    }
    // Kiểm tra Phone 
    if (empty($data['phone'])) {
        $errors[] = "Trường phone không được để trống";
    } else if (!is_numeric($data['phone'])) {
        $errors[] = "Phone is not number";
    }


    // Kiểm tra avatar
    // $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
    // if ($data['avatar']['size'] > 2 * 1024 * 1024) {
    //     $errors[] = "Ảnh avatar nhỏ hơn 2 MB";
    // } else if (!in_array($data['avatar']['type'], $typeImage)) {
    //     $errors[] = "Trường avatar chỉ chấp nhận định dạng file png, jpg, jpeg";
    // }





    // Kiểm tra address
    if (empty($data['address'])) {
        $errors[] = "Trường address không được để trống";
    }

    if (empty($data['create_at'])) {
        $errors[] = "Trường Create_at không được để trống";
    }


    return $errors;
}


function delete_user($id)
{
    if (isset($id)) {
        $user = getOneUser($id);
        delete('user', $id);
        if (!empty($user['avatar']) && file_exists(PATH_UPLOAD . $user['avatar'])) {
            unlink(PATH_UPLOAD . $user['avatar']);
        }
        $_SESSION['success'] = "Thao tác thành công";
        header("Location: " . ROOT_URL_ADMIN . "?act=users");
        exit();
    }
}
