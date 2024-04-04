<?php
function listImageAll()
{
    $arrParams = [
        'view' => "image/index",
        'title' => "List Products",
        'script' => "datatable"
    ];


    $listAllImage = getListHinhAnh();


    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function createImage()
{
    $product = getProduct();

    $arrParams = [
        'view' => "image/create",
        'title' => "Create Image",
        'script' => "datatable"
    ];


    if (!empty($_POST)) {

        $data = [
            "pro_id"    => $_POST['pro_id'],
            "image"     => $_FILES['image']
        ];


        $fileUpload = $_FILES['image'];
        if (isset($fileUpload)) {
            $targetDir = PATH_UPLOAD . "product/";
            foreach ($fileUpload['tmp_name'] as $key => $tmp_name) {
                $targetFile = $targetDir . time() . basename($fileUpload['name'][$key]);
                $uploadOk = 1;
                if ($fileUpload['size'][$key] == 0) {
                    echo "Xin lỗi, không được để trống.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($tmp_name, $targetFile)) {
                        $data['image']  = "product/" . time() . basename($fileUpload['name'][$key]);
                        echo "The file " . basename($fileUpload['name'][$key]) . " has been uploaded.<br>";
                        insert($data, "hinh_anh");
                    } else {
                        echo "Xin lỗi, lỗi không upload file lên được";
                    }
                }
            }
        }


        header("Location: " . ROOT_URL_ADMIN . "?act=images");
        exit();
    }





    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function updateImage($id)
{

    $arrParams = [
        'view' => "image/update",
        'title' => "Update Image Products",
        'script' => "datatable"
    ];
    $product = getProduct();
    $image = getOneImage($id);

    if (!empty($_POST)) {
        $data = [
            "pro_id"    => $_POST['pro_id'],
            "image"     => $_FILES['image'] ?? $image['image'],
        ];

        if (isset($_FILES['image'])) {
            $targetDir = PATH_UPLOAD . "product/";
            $targetFile = $targetDir . time() . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            echo $data['image']  = "product/" . time() . basename($_FILES['image']['name']);
            // die("Call");
            update($data, "hinh_anh", $id);
            header("Location:" . ROOT_URL_ADMIN . "?act=image-update&id=$id");
            if (!empty($image['image']) && file_exists(PATH_UPLOAD . $image['image'])) {
                unlink(PATH_UPLOAD . $image['image']);
            }
        }
    }

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function deleteImage($id)
{

    $image = getOneImage($id);
    echo "<pre/>";
    print_r($image);
    echo "<pre/>";
    if (isset($id)) {
        delete('hinh_anh', $id);

        setcookie("success", "Xóa thành công");
        header("Location: " . ROOT_URL_ADMIN . "?act=images");
        if (!empty($image['image']) && file_exists(PATH_UPLOAD . $image['image'])) {
            unlink(PATH_UPLOAD . $image['image']);
        }
    }
}
