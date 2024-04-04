<?php



function authenShowFormLogin()
{
    if ($_POST) {
        sigIn();
    }
}

// Function Đăng nhập
function sigIn()
{

    $arrParams = [
        'view'  => "layout/sig_in",
        'title' => "Đăng nhập",
        'act'   => "login",
    ];
    if (isset($_POST) && !empty($_POST)) {
        $user = getUserClientByEmailAndPassword($_POST['email'], $_POST['password']);

        if (empty($user)) {
            $_SESSION['error'] = "Email hoặc Password chưa đúng !";
            header("Location: " . ROOT_URL . "?act=user-login");
            exit();
        }

        $_SESSION['user'] = $user;
        header("Location: " . ROOT_URL);
        exit();
    }


    require_once PATH_VIEW . "layout/master.php";
}

function logOut()
{
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
        // session_destroy();
    }
    header("Location: " . ROOT_URL);
}

// Function Đăng nhập
function sigUp()
{
    $arrParams = [
        'view' => "layout/sig_up",
        'title' => "Đăng ký",
        'act'   => "login"
    ];
    $error = [];
    if (!empty($_POST && isset($_POST))) {
        $infoSigUp = [
            "email"     => $_POST['email'],
            "password"  => $_POST['password'],
            // "type"      => "0",
        ];
        $passwordAgain = $_POST['password-again'];

        $listAllEmails = getAllEmailUser();
        // Chuyển mảng về kiểu mảng số nguyên
        foreach ($listAllEmails as $key => $value) {
            $listAllEmails[$key]  = $value['email'];
        }
        $listAllEmail = $listAllEmails;
        // Kiểm tra email đã tồn tại chưa
        // Kiểm tra password có giống passwordAgain không
        if (in_array($infoSigUp['email'], $listAllEmail)) {
            $error = "Email này đã được sử dụng";
        }
        if ($infoSigUp['password'] != $passwordAgain) {
            $error = "Password chưa trùng khớp";
        }

        $_SESSION['error'] = $error;

        if (empty($_SESSION['error'])) {
            insert($infoSigUp, "user");
            $_SESSION['success']    = "Bạn đã đăng kí thành công";
            unset($_SESSION['error']);
        }
    }

    require_once PATH_VIEW . "layout/master.php";
}
