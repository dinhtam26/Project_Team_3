<?php
// Lấy danh sách content bình luận của bảng comment, và lấy tên, hình ảnh của người bình luận đó

function getAllCommentByProductId($id_product)
{
    $sql = "SELECT `c`.date_comment, `c`.content, `c`.user_id, `c`.product_id, `u`.fullname, `u`.avatar FROM `comment` AS `c` 
    LEFT JOIN `user` AS `u` ON `c`.user_id  = `u`.id
    WHERE `c`.product_id  = '$id_product'";
    $listAllCommentByProductId = listRecord($sql);
    return $listAllCommentByProductId;
}

function insertComment($product_id, $user_id)
{
    // Thêm ngày tháng bình luận
    // content
    // user id 
    if (!empty($_POST)) {
        echo "<pre/>";
        print_r($_POST);
        echo "<pre/>";
        $data = [
            "date_comment"  => date('d-m-Y'),
            "content"       => $_POST['content'],
            "user_id"       => $user_id,
            "product_id"    => $product_id
        ];

        insert($data, 'comment');
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
