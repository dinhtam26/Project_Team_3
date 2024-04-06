<?php
function getAllComment()
{
    $sql = "SELECT `c`.*, `p`.name, `u`.fullName FROM `comment` AS `c`
                INNER JOIN `user` AS `u` ON `u`.id = `c`.user_id
                INNER JOIN `products` AS `p` ON `p`.id = `c`.product_id";
    $listComment = listRecord($sql);
    return $listComment;
}


function delete_Comment($id)
{
    if (isset($id)) {
        delete('comment', $id);
        setcookie("Success", "Thao tác thành công", time() + 3);
        header("Location: " . ROOT_URL_ADMIN . "?act=comment");
        exit();
    }
}
