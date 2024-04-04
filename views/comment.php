<?php

require_once '../common/connect-db.php';
require_once '../common/model.php';
require_once '../models/CommentModel.php';
require_once '../common/env.php';
require_once '../controllers/CommentController.php';
$id_product = $_REQUEST['id'];
$id_user    = $_REQUEST['id_user'];
$listComment = getAllCommentByProductId($id_product);

?>

<div>
    <h1 style="font-size: 24px; margin-top: 20px; font-weight: 600">Bình luận</h1>
    <hr>
    <div style="margin-top: 50px">

        <form action="" method="post">
            <!-- <input type="text" name="data" id=""> -->
            <div style="width:92%">
                <input name="content" id="textInput" style="border: 1px solid #ccc; width: 100%; border-top: none; border-right: none; border-left: none; font-size: 20px" type="text" placeholder="Nhập để bình luận ...">
            </div>
            <div style="display: flex; justify-content: flex-end; margin-top: 30px; margin-right: 110px">
                <button id="btn-comment" style="padding: 12px 32px; background: #77dae6; color: #fff;border-radius: 8px;font-size: 20px">Gửi</button>
            </div>

        </form>



        <h2 style="font-size: 22px; margin-top: 40px;">Danh sách Bình luận</h2>
        <?php foreach ($listComment as $key => $value) : ?>
            <div style="margin-top: 50px; display: flex; gap: 30px;">
                <!-- Chứa hình ảnh -->

                <div>
                    <!-- Kiểm tra: Nếu  value['avatar'] == null => thì ảnh mặc định là product/avatar -->
                    <!-- Nếu tồn tại thì lấy luôn ảnh đó -->
                    <?php if ($value['avatar'] == "user/") { ?>
                        <img style="border-radius: 50%" src="<?= ROOT_UPLOAD_URL ?>product/avatar.png" alt="" width="50px">
                    <?php } else { ?>
                        <img style="border-radius: 50%" src="<?= ROOT_UPLOAD_URL ?><?= $value['avatar'] ?>" alt="" width="50px">
                    <?php  } ?>
                </div>
                <!-- Chứa nội dung -->
                <div style="background: #f2f3f5; padding: 10px; border-radius: 8px; width: 1000px">
                    <div style="display: flex; justify-content: space-between">
                        <h3 style="font-size:16px; font-weight: 600"><?= $value['fullname'] ?></h3>
                        <p><?= $value['date_comment'] ?></p>
                    </div>
                    <p style="margin-top: 30px; line-height: 25px"><?= $value['content'] ?></p>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>
<?php

?>